<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
//Route::resource('products','ProductController');

Route::get('/', function () {
return view('homeCust');
});

Route::get('/Product/menu', function () {
return view('Product.menu');
});

Route::get('/layouts/masterPageCust', function () {
return view('/layouts/masterPageCust');
});

Route::get('/layouts/masterPageProfileCust', function () {
return view('/layouts/masterPageProfileCust');
});

Route::get('/layouts/masterPageStaff', function () {
return view('/layouts/masterPageStaff');
});

Route::get('/layouts/masterPageProfileStaff', function () {
return view('/layouts/masterPageProfileStaff');
});

Route::get('/homeCust', function () {
return view('/homeCust');
});

Route::get('/homeStaff', function () {
return view('/homeStaff');
});

Route::get('/Promotion/displayPromotion', function () {
return view('/Promotion/displayPromotion');
});

Route::get('/Promotion/editPromotionPage', function () {
return view('/Promotion/editPromotionPage');
});

Route::get('/Promotion/PromotionXML', function () {
    return view('/Promotion/PromotionXML');
})->name('displayXML');

Route::get('/Promotion/insertPromotion', function () {
return view('/Promotion/insertPromotion');
})->name('insertPromotionPage');

Route::get('Product/addProduct', function () {
return view('Product.addProduct');
});

Route::get('/Product/searchProduct', function () {
return view('Product.searchProduct');
});

Route::get('Product/displayProduct', function () {
return view('Product.displayProduct');
});

Route::get('/Product/ProductXML', function () {
    return view('/Product/ProductXML');
})->name('displayProductXML');


Route::get('/Product/modifyProduct', function () {
return view('Product.modifyProduct');
});


Route::get('/Product/deleteUpdateProduct', function () {
return view('Product.deleteUpdateProduct');
});

Route::get('/Customer/signUpCust', function () {
return view('Customer.signUpCust');
});

Route::get('/Customer/loginCust', function () {
return view('Customer.loginCust');
});

Route::get('/Customer/forgetpasswordCust', function () {
return view('Customer.forgetpasswordCust');
});

Route::get('/Customer/changePasswordCust', function () {
return view('Customer.changePasswordCust');
});

Route::get('/Customer/profileCust', function () {
return view('Customer.profileCust');
});

Route::get('/Customer/editProfileCust', function () {
return view('Customer.editProfileCust');
});

Route::get('/Staff/signUpStaff', function () {
return view('Staff.signUpStaff');
});

Route::get('/Staff/loginStaff', function () {
return view('Staff.loginStaff');
});

Route::get('/Staff/forgetpasswordStaff', function () {
return view('Staff.forgetpasswordStaff');
});

Route::get('/Staff/changePasswordStaff', function () {
return view('Staff.changePasswordStaff');
});

Route::get('/Staff/profileStaff', function () {
return view('Staff.profileStaff');
});

Route::get('/Staff/editProfileStaff', function () {
return view('Staff.editProfileStaff');
});

Route::get('/Staff/StaffXML', function () {
    return view('/Staff/StaffXML');
});

Route::get('/Order/Cart', function () {
return view('Order.Cart');
});

Route::get('/Order/checkOut', function () {
return view('Order.checkOut');
});

Route::get('/Order/payByCard', function () {
return view('Order.payByCard');
});

Route::get('/Order/payByPaypal', function () {
return view('Order.payByPaypal');
});

Route::get('/Order/receipt', function () {
return view('Order.receipt');
});

Route::get('/Order/OrderXML', function () {
    return view('/Order/OrderXML');
});

Route::get('/Order/viewOrder', function () {
return view('Order.viewOrder');
});

Route::get('/Customer/custAPI', function () {
return view('Customer.custAPI');
});

Route::get('/Product/productAPI', function () {
return view('Product.productAPI');
});

Route::get('/Promotion/promotionAPI', function () {
return view('Promotion.promotionAPI');
});

Route::get('/Order/orderAPI', function () {
return view('Order.orderAPI');
});

//Promotion Route
// insert-promotion - Route for inserting Promotion
// index - Route for displaying Promotion
// edit-promotion - Route for Editing Promotion
// update-promotion - Route for Updating Promotion
// delete-promotion - Route for Deleting Promotion
// promotionAPI - For testing web services
Route::post('/Promotion/insertPromotion', [PromotionController::class, 'store'])->name('insert-promotion');  
Route::get('/Promotion/displayPromotion', [PromotionController::class, 'index']);
Route::get('/Promotion/editPromotionPage/{id}', [PromotionController::class, 'edit'])->name('edit-promotion');
Route::post('/Promotion/editPromotionPage/{id}', [PromotionController::class, 'update'])->name('update-promotion');
Route::post('/Promotion/displayPromotion/{id}', [PromotionController::class, 'destroy'])->name('delete-promotion');
Route::get('/Promotion/promotionAPI', [PromotionController::class, 'api'])->name('promotionAPI');

//Product Route
Route::post('/Product/addProduct', [ProductController::class, 'store'])->name('addData');
Route::get('/Product/searchProduct', [ProductController::class, 'search'])->name('searchData');
Route::get('/Product/displayProduct', [ProductController::class, 'index'])->name('displayData');
Route::get('/Product/deleteUpdateProduct', [ProductController::class, 'indexII'])->name('delUpData');
Route::get('/Product/modifyProduct/{id}', [ProductController::class, 'edit'])->name('editProduct');
Route::post('/Product/modifyProduct/{id}', [ProductController::class, 'update'])->name('modifyProduct');
Route::post('/Product/deleteUpdateProduct/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
Route::get('/Product/productAPI', [ProductController::class, 'api'])->name('productAPI');

//Customer Route
Route::post('/Customer/signUpCust', [CustomerController::class, 'store'])->name('signUpCust');
Route::get('/Customer/loginCust', [CustomerController::class, 'authnLoginDetails'])->name('loginCust');
Route::get('/Customer/forgetpasswordCust', [CustomerController::class, 'checkForgetPswd'])->name('forgetpasswordCust');
Route::get('/Customer/changePasswordCust', [CustomerController::class, 'changePassword'])->name('changePasswordCust');
Route::get('/Customer/profileCust', [CustomerController::class, 'show'])->name('profileCust');
Route::post('/Customer/editProfileCust', [CustomerController::class, 'update'])->name('editProfileCust');
Route::get('/Customer/editProfileCust', [CustomerController::class, 'edit'])->name('editProfileCustupdate');
Route::get('/Customer/custAPI', [CustomerController::class, 'api'])->name('custAPI');

//Staff Route
Route::post('/Staff/signUpStaff', [StaffController::class, 'store'])->name('signUpStaff');
Route::get('/Staff/loginStaff', [StaffController::class, 'authnLoginDetails'])->name('loginStaff');
Route::get('/Staff/forgetpasswordStaff', [StaffController::class, 'checkForgetPswd'])->name('forgetpasswordStaff');
Route::get('/Staff/changePasswordStaff', [StaffController::class, 'changePassword'])->name('changePasswordStaff');
Route::get('/Staff/profileStaff', [StaffController::class, 'show'])->name('profileStaff');
Route::post('/Staff/editProfileStaff', [StaffController::class, 'update'])->name('editProfileStaff');
Route::get('/Staff/editProfileStaff', [StaffController::class, 'edit'])->name('editProfileCustStaff');

//Order Route
Route::post('/Product/displayProduct', [CartController::class, 'store'])->name('addToCart');
Route::get('/Order/Cart', [CartController::class, 'index'])->name('displayCartItem');
Route::post('/Order/Cart/{id}', [CartController::class, 'destroy'])->name('removeFromCart');
Route::get('/Order/checkOut', [CartController::class, 'indexII'])->name('displayItem');
Route::post('/Order/checkOut', [OrderController::class, 'store'])->name('checkOut');
Route::post('/Order/payByCard', [OrderController::class, 'storeCard'])->name('payCard');
Route::post('/Order/payByPaypal', [OrderController::class, 'storePaypal'])->name('payPaypal');
Route::get('/Order/receipt', [OrderController::class, 'show'])->name('showReceipt');
Route::post('/Order/viewOrder', [OrderController::class, 'showFromList'])->name('showOrderDetails');
Route::get('/Order/viewOrder', [OrderController::class, 'index'])->name('showOrderList');
Route::get('/Order/orderAPI', [OrderController::class, 'api'])->name('orderAPI');
//PDF Report
// PromotionPDF - Route for generating Promotion Report
// ProductPDF - Route for generating Produuct Report
// OrderPDF - Route for generating Order Report
// displayOrder - Route for displaying Order Details
Route::get('/Promotion-Report', [PDFController::class, 'promotionPDF'])->name('PromotionPDF');
Route::get('/Product-Report', [PDFController::class, 'productPDF'])->name('ProductPDF');
Route::get('/Order-Report', [PDFController::class, 'orderPDF'])->name('OrderPDF');
Route::get('/PDF/displayOrderDetails', [PDFController::class, 'displayOrder'])->name('displayOrder');