<?php
//Author : Soong Wen Xin
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Session;

class CartController extends Controller {

    public function index() {
        $sessionCustId = Session::get('custId');

        $carts = DB::table('carts')
                        ->join('products', 'carts.productId', '=', 'products.id')
                        ->where('custId', '=', $sessionCustId)->get();

        return view('/Order/Cart', ['carts' => $carts]);
    }

    public function store(Request $request) {
        $custId = Session::get('custId');
        $productId = $request->get('productId');
        $unitPrice = 0;
        $products = DB::table('products')
                        ->where('id', '=', $productId)->first();

        $cartExist = DB::table('carts')
                        ->where('productId', '=', $productId)
                        ->where('custId', '=', $custId)->first();
        if ($products->promotionPrice == null) {
            $unitPrice = $products->productPrice;
        } else {
            $unitPrice = $products->promotionPrice;
        }

        if ($cartExist) {
            $quantity = 0;
            $subTotal = 0;
            $quantity = $cartExist->cartQuantity + 1;
            $subTotal = $quantity * $unitPrice;
            DB::table('carts')
                    ->where('cartId', '=', $cartExist->cartId)
                    ->update(['cartQuantity' => $quantity]);
            DB::table('carts')
                    ->where('cartId', '=', $cartExist->cartId)
                    ->update(['subTotal' => $subTotal]);
        } else {
            $carts = new Cart();
            $carts->productId = $productId;
            $carts->custId = $custId;
            $carts->cartQuantity = 1;
            $carts->unitPrice = $unitPrice;
            $carts->subTotal = $unitPrice;
            $carts->save();
        }
        Alert::success('Cart Item Added', 'Thanks');
        return redirect('/Order/Cart');
    }

    public function destroy($id) {
        $cartItem = DB::table('carts')->where('cartId', '=', $id)->delete();
        return redirect()->route('displayCartItem');
    }

    public function indexII() {
        $sessionCustId = Session::get('custId');

        $carts = DB::table('carts')
                        ->join('products', 'carts.productId', '=', 'products.id')
                        ->where('custId', '=', $sessionCustId)->get();

        return view('/Order/checkOut', ['carts' => $carts]);
    }

}
