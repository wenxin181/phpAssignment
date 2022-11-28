<?php
//Author : Soong Wen Xin
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderDetails;
use App\Strategy\payPaypalStrategy;
use App\Strategy\payCreditCardStrategy;
use App\Strategy\paymentStrategy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Session;

class OrderController extends Controller {

    public function index() {

        $orders = DB::table('orders')->where('custId', '=', Session::get('custId'))->get();
        return view('/Order/viewOrder', compact('orders'));
    }

    public function store(Request $request) {
        $totalAmount = 0;

        include(app_path() . '\securityClass\InputValid.php');
        $val = new \InputValid();

        $val->fieldName('shipName')->fieldValue($request->get('shipName'))->required();
        $val->fieldName('shipPhone')->fieldValue($request->get('shipPhone'))->InputPattern('tel')->required();
        $val->fieldName('shipAddress')->fieldValue($request->get('shipAddress'))->required();
        $custId = Session::get('custId');

        $cartItems = DB::table('carts')
                        ->where('custId', '=', $custId)->get();

        foreach ($cartItems as $cartItem) {
            $totalAmount += $cartItem->subTotal;
        }

        $orderDate = date("Y-m-d");
        if ($val->isSuccess()) {
            $orderDetails = new Order();
            $orderDetails->custId = $custId;
            $orderDetails->orderDate = $orderDate;
            $orderDetails->totalAmount = $totalAmount;
            $orderDetails->shipName = $request->get('shipName');
            $orderDetails->shipPhone = $request->get('shipPhone');
            $orderDetails->shipAddress = $request->get('shipAddress');
            $orderDetails->save();
            Session::put('orderId', $orderDetails->id);
            $paymentMethod = $request->get('paymentType');
            Session::put('paymentMethod', $paymentMethod);
            if ($paymentMethod == "CreditCard") {
                return view("/Order/payByCard");
            } else {
                return view("/Order/payByPaypal");
            }
        } else {
            Alert::error('Please enter correct details.', 'Please Try Again');
            return redirect()->route('displayItem');
        }
    }

    public function storeCard(Request $request) {
        $orderId = Session::get('orderId');
        $numberCard = $request->get('numberCard');
        $custId = Session::get('custId');
        $date = date("Y-m-d");
        $method = Session::get('paymentMethod');
        $totalAmount = 0;
        include(app_path() . '\securityClass\InputValid.php');
        $val = new \InputValid();
        $val->fieldName('numberCard')->fieldValue($numberCard)->required();


        $cardtype = array(
            "visa" => "/^4[0-9]{12}(?:[0-9]{3})?$/",
            "mastercard" => "/^5[1-5][0-9]{14}$/",
        );

        $cartItems = DB::table('carts')
                        ->where('custId', '=', $custId)->get()->toArray();

        foreach ($cartItems as $cartItem) {
            $totalAmount += $cartItem->subTotal;
        }

        if (preg_match($cardtype['visa'], $numberCard) || preg_match($cardtype['mastercard'], $numberCard)) {
            $payment = new Payment();
            $payment->orderId = $orderId;
            $payment->custId = $custId;
            $payment->paymentDate = $date;
            $payment->payMethod = $method;
            $payment->fromAccount = $numberCard;
            $payment->totalAmount = $totalAmount;
            $payment->save();

            $this->moveToOrderDetails();
            return redirect()->route('showReceipt');
        } else {
            Alert::error('Please enter correct information.', 'Please Try Again');
            return redirect('/Order/payByCard');
        }
    }

    public function storePaypal(Request $request) {
        $orderId = Session::get('orderId');
        $payEmail = $request->get('payEmail');
        $custId = Session::get('custId');
        $date = date("Y-m-d");
        $method = Session::get('paymentMethod');
        $totalAmount = 0;
        $cartItems = DB::table('carts')
                        ->where('custId', '=', $custId)->get();

        foreach ($cartItems as $cartItem) {
            $totalAmount += $cartItem->subTotal;
        }

        include(app_path() . '\securityClass\InputValid.php');
        $val = new \InputValid();
        $val->fieldName('payEmail')->fieldValue($payEmail)->required()->emailValidate($payEmail);

        if ($val->isSuccess()) {
            $payment = new Payment();
            $payment->orderId = $orderId;
            $payment->custId = $custId;
            $payment->paymentDate = $date;
            $payment->payMethod = $method;
            $payment->fromAccount = $payEmail;
            $payment->totalAmount = $totalAmount;
            $payment->save();
            $this->moveToOrderDetails();
            return redirect()->route('showReceipt');
        } else {
            Alert::error('Please enter correct information.', 'Please Try Again');
            return redirect('/Order/payByPaypal');
        }
    }

    public function moveToOrderDetails() {
        $orderId = Session::get('orderId');
        $custId = Session::get('custId');
        $cartItems = DB::table('carts')
                        ->where('custId', '=', $custId)->get();
        foreach ($cartItems as $cartItem) {
            $orderDetail = new OrderDetails();
            $orderDetail->orderId = $orderId;
            $orderDetail->productId = $cartItem->productId;
            $orderDetail->orderQuantity = $cartItem->cartQuantity;
            $orderDetail->unitPrice = $cartItem->unitPrice;
            $orderDetail->subTotal = $cartItem->subTotal;
            $orderDetail->save();
            DB::table('carts')->where('custId', '=', $custId)->delete();
        }
    }

    public function show() {
        $orderId = Session::get('orderId');
        $orders = DB::table('orders')
                        ->join('payments', 'orders.id', '=', 'payments.orderId')
                        ->where('id', '=', $orderId)->get();
        $items = DB::table('order_details')
                        ->join('products', 'order_details.productId', '=', 'products.id')
                        ->where('orderId', '=', $orderId)->get();
        $payments = DB::table('payments')
                        ->where('orderId', '=', $orderId)->get()->first();

        if ($payments->payMethod == "CreditCard") {
            $payMethod = new payCreditCardStrategy();
        } else {
            $payMethod = new payPaypalStrategy();
        }
        $pay = $payMethod->pay($payments->totalAmount);
        $fromAccount = $payMethod->fromAccount();
        return view('/Order/receipt', compact('orders', 'items', 'pay', 'fromAccount'));
    }

    public function showFromList(Request $request) {
        $orderId = $request->get('orderId');
        $orders = DB::table('orders')
                        ->join('payments', 'orders.id', '=', 'payments.orderId')
                        ->where('id', '=', $orderId)->get();
        $items = DB::table('order_details')
                        ->join('products', 'order_details.productId', '=', 'products.id')
                        ->where('orderId', '=', $orderId)->get();
        $payments = DB::table('payments')
                        ->where('orderId', '=', $orderId)->get()->first();

        if ($payments->payMethod == "CreditCard") {
            $payMethod = new payCreditCardStrategy();
        } else {
            $payMethod = new payPaypalStrategy();
        }
        $pay = $payMethod->pay($payments->totalAmount);
        $fromAccount = $payMethod->fromAccount();

        return view('/Order/receipt', compact('orders', 'items', 'pay', 'fromAccount'));
    }

    function api() {
        header("Content-Type:application/json");
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $id = $_GET['id'];
            $orders = DB::table('orders')->where('id', '=', $id)->get();
            foreach ($orders as $order) {
                $id = $order->id;
                $shipName = $order->shipName;
                $shipPhone = $order->shipPhone;
                $shipAddress = $order->shipAddress;
                $this->response($id, $shipName, $shipPhone, $shipAddress);
            }
        } else {
            response(NULL, NULL, 400, "Invalid Request");
        }
    }

    function response($id, $shipName, $shipPhone, $shipAddress) {
        $response['id'] = $id;
        $response['shipName'] = $shipName;
        $response['shipPhone'] = $shipPhone;
        $response['shipAddress'] = $shipAddress;

        $json_response = json_encode($response);
        echo $json_response;
    }

}
