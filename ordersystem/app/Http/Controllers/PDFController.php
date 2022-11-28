<?php
//Author : Lee Jun Jie
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\OrderDetails;
class PDFController extends Controller {

    //Promotion PDF Generator
    public function promotionPDF() {
        //Select all row from Promotion Database
        $promotions = Promotion::all();
        $data = [
            'title' => 'Promotion Report',
            'date' => date('m/d/Y'),
            'promotions' => $promotions
        ];
        // Use laravel PDF to load the data
        $pdf = PDF::loadView('PDF/PromotionPDF', $data);
        // Automatically Download the PDF as Promotion.pdf
        return $pdf->download('Promotion.pdf');
    }

    //Product PDF Generator
    public function productPDF() {
        //Select all row from Product Database
        $products = Product::all();
        $data = [
            'title' => 'Product Report',
            'date' => date('m/d/Y'),
            'products' => $products
        ];
        // Use laravel PDF to load the data
        $pdf = PDF::loadView('PDF/ProductPDF', $data);
        // Automatically Download the PDF as Promotion.pdf
        return $pdf->download('Product.pdf');
    }

    //Order PDF Generator
    public function orderPDF() {
        //Select all row from Order Details Database
        $orders = OrderDetails::all();
        $data = [
            'title' => 'Order Details Report',
            'date' => date('m/d/Y'),
            'orders' => $orders
        ];
        // Use laravel PDF to load the data
        $pdf = PDF::loadView('PDF/OrderDetailPDF', $data);
        // Automatically Download the PDF as Promotion.pdf
        return $pdf->download('OrderDetail.pdf');
    }
    
    // Display the details of the order Details
    public function displayOrder() {    
        $orders = OrderDetails::all();
        return view('/PDF/displayOrderDetails', compact('orders'));
    }
}
