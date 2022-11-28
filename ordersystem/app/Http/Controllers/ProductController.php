<?php
//Author : Wai Hau Guan
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use DB;
use App\Repository\InterfaceProductRepository;
use RealRashid\SweetAlert\Facades\Alert;

//use App\products;

class ProductController extends Controller {

    public $product;

    function __construct(InterfaceProductRepository $product) {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = $this->product->getAllProducts();
        return view('/Product/displayProduct', compact('products'));
    }

    public function indexII() {
        $products = $this->product->getAllProducts();
        return view('/Product/deleteUpdateProduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('/Product/addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        include(app_path() . '\securityClass\InputValid.php');


        $val = new \InputValid();

        $val->fieldName('productName')->fieldValue($request->get('productName'))->required();
        $val->fieldName('productDetail')->fieldValue($request->get('productDetail'))->required();
        $val->fieldName('productPrice')->fieldValue($request->get('productPrice'))->required()->validatePrice($request->get('productPrice'));
        $val->fieldName('quantity')->fieldValue($request->get('quantity'))->required()->validateNumber($request->get('quantity'));
        $val->fieldName('colour')->fieldValue($request->get('colour'))->InputPattern('words')->required();

        $data = $request->all();

        if ($val->isSuccess()) {
            if ($image = $request->file('productImage')) {
                $name = time() . '.' . $image->getClientOriginalExtension();
                $image->move('imageProduct/', $name);
                $data['productImage'] = "$name";
            }
            $this->product->createProduct($data);
            Alert::success('Product Added', 'Thank You');
            return redirect('/Product/addProduct');
        } else {
            Alert::error('Something went wrong', 'Please Try Again');
            return redirect('/Product/addProduct');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $products = Product::find($id);
        return view('/Product/modifyProduct', compact('products', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $productss = Product::find($id);


        include(app_path() . '\securityClass\InputValid.php');


        $val = new \InputValid();

        $val->fieldName('productName')->fieldValue($request->get('productName'))->required();
        $val->fieldName('productDetail')->fieldValue($request->get('productDetail'))->required();
        $val->fieldName('productPrice')->fieldValue($request->get('productPrice'))->required()->validatePrice($request->get('productPrice'));
        $val->fieldName('quantity')->fieldValue($request->get('quantity'))->required()->validateNumber($request->get('quantity'));
        $val->fieldName('colour')->fieldValue($request->get('colour'))->InputPattern('words')->required();

        if ($val->isSuccess()) {
            $productss->productName = $request->get('productName');
            $productss->productPrice = $request->get('productPrice');
            $productss->productDetail = $request->get('productDetail');
            $productss->quantity = $request->get('quantity');
            $productss->colour = $request->get('colour');
            $productss->categoryName = $request->get('categoryName');
            $productss->save();
            Alert::success('Product Updated', 'Thank You');
            return redirect('/Product/deleteUpdateProduct');
        } else {
            Alert::error('Something went wrong', 'Please Try Again');
            return redirect('/Product/deleteUpdateProduct');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        $product->delete();
        Alert::success('Product Deleted', 'Thank You');
        return redirect('/Product/deleteUpdateProduct');
    }

    function search(Request $request) {
        if (isset($_GET['productID'])) {
            $search_id = $_GET['productID'];
            $products = DB::table('products')->where('id', '=', $search_id)->get();
            return view('Product.searchProduct', ['products' => $products]);
        } else {
            return view('/Product/searchProduct');
        }
    }

    function api() {
        header("Content-Type:application/json");
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $id = $_GET['id'];
            $products = DB::table('products')->where('id', '=', $id)->get();
            foreach ($products as $product) {
                $id = $product->id;
                $productName = $product->productName;
                $productPrice = $product->productPrice;
                $productDetail = $product->productDetail;
                $quantity = $product->quantity;
                $colour = $product->colour;
                $this->response($id, $productName, $productPrice, $productDetail, $quantity, $colour);
            }
        } else {
            response(NULL, NULL, 400, "Invalid Request");
        }
    }

    function response($id, $productName, $productPrice, $productDetail, $quantity, $colour) {
        $response['id'] = $id;
        $response['productName'] = $productName;
        $response['productPrice'] = $productPrice;
        $response['productDetail'] = $productDetail;
        $response['quantity'] = $quantity;
        $response['colour'] = $colour;

        $json_response = json_encode($response);
        echo $json_response;
    }

}
