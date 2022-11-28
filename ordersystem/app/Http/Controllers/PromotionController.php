<?php
//Author : Lee Jun Jie
namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;

class PromotionController extends Controller {

    //Display all of the promotion
    public function index() {
        $promotions = Promotion::all();
        return view('/Promotion/displayPromotion', compact('promotions'));
    }

    //Store user input into database
    public function store(Request $request) {
        
        // Use InputValid Security Class Method for input validation
        include(app_path() . '\securityClass\InputValid.php'); 
        $val = new \InputValid();
        $val->fieldName('promotion_id')->fieldValue($request->get('promotion_id'))->required();
        $val->fieldName('promotionRate')->fieldValue($request->get('promotionRate'))->minValue(0)->maxValue(100);
        $val->fieldName('promotionDescription')->fieldValue($request->get('promotionDescription'))->required();

        // Check whether the validation is successful   
        if ($val->isSuccess()) {


            // Check whether the user input promotions categories exists in database
            // If exists does not allow user to add another promotions for the same categories
            $promotionCategories = DB::table('promotions')->where('promotionCategory', '=', $request->get('promotionCategory'))->value('promotionCategory');
            if ($request->get('promotionCategory') == $promotionCategories) {
                echo '<script>alert("This promotion Category already exist.")</script>';
                return redirect('/Promotion/insertPromotion');
            } else {
                // If the categories does not exists
                // Insert into the database
                $promotions = new Promotion();
                $promotions->promotion_id = $request->get('promotion_id');
                $promotions->promotionRate = $request->get('promotionRate');
                $promotions->promotionDescription = $request->get('promotionDescription');
                $promotions->promotionCategory = $request->get('promotionCategory');
                $promotions->save();
                return redirect('/Promotion/displayPromotion');
                // Return to displayPromotion Page
            }
        } else {
            Alert::error('Invalid Input', 'Please Try Again');
            return redirect('/Promotion/insertPromotion');
        }
    }

    // Get the selected promotions rows value
    // return to editPromotionPage to display the selected row
    public function edit($id) {
        include(app_path() . '\securityClass\SessionManagement.php');
        $val = new \SessionManagement();
        $promotions = Promotion::find($id);
        $val->write('id', $promotions->id); // Write the id into session to display the id on another web page
        $number = $val->read('id'); // read the session value 
        // Return to the editPromotionPage 
        return view('/Promotion/editPromotionPage', compact('promotions', 'id'))->with('val', $number);
    }

    // Update the data value for the selected promotion row
    public function update(Request $request, $id) {
        // Use InputValid Security Class Method for input validation
        include(app_path() . '\securityClass\InputValid.php');
        $val = new \InputValid();
        $val->fieldName('promotion_id')->fieldValue($request->get('promotion_id'))->required();
        $val->fieldName('promotionRate')->fieldValue($request->get('promotionRate'))->minValue(0)->maxValue(100);
        $val->fieldName('promotionDescription')->fieldValue($request->get('promotionDescription'))->required();

        // Check whether the validation is successful   
        // If is success store the new value into the row of the promotion id
        if ($val->isSuccess()) {
            $promotions = Promotion::find($id);
            $promotions->promotion_id = $request->get('promotion_id');
            $promotions->promotionRate = $request->get('promotionRate');
            $promotions->promotionDescription = $request->get('promotionDescription');
            $promotions->promotionCategory = $request->get('promotionCategory');
            $promotions->save();
            return redirect('/Promotion/displayPromotion');
        } else {
            Alert::error('Invalid Input', 'Please Try Again');
            return redirect('/Promotion/editPromotionPage');
        }
    }
    
    //Remove the selected promotion row 
    public function destroy($id) {
        $promotions = Promotion::find($id);
        $promotions->delete();
        return redirect('/Promotion/displayPromotion');
    }

    function api() {
        header("Content-Type:application/json");
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $id = $_GET['id'];
            $promotions = DB::table('promotions')->where('id', '=', $id)->get();
            foreach ($promotions as $p) {
                $id = $p->id;
                $promotion_id = $p->promotion_id;
                $promotionRate = $p->promotionRate;
                $promotionDescription = $p->promotionDescription;
                $promotionCategory = $p->promotionCategory;
                $this->response($id, $promotion_id, $promotionRate, $promotionDescription, $promotionCategory);
            }
        } else {
            response(NULL, NULL, 400, "Invalid Request");
        }
    }

    function response($id, $promotion_id, $promotionRate, $promotionDescription, $promotionCategory) {
        $response['id'] = $id;
        $response['promotion_id'] = $promotion_id;
        $response['promotionRate'] = $promotionRate;
        $response['promotionDescription'] = $promotionDescription;
        $response['promotionCategory'] = $promotionCategory;

        $json_response = json_encode($response);
        echo $json_response;
    }

}
