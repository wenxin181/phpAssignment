<?php

/**
 * @author Sim Hui Ming
 */

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Factory\AuthAndPswdFactory;
use Session;

class CustomerController extends Controller {

    public $roleCust = "cust";

    public function index() {
        $customers = Customer::all();
        return view('/Customer/custProfile', compact('customers'));
    }

    public function create() {
        return view('/Customer/signUpCust');
    }

    public function store(Request $request) {
        $pswd = $request->get('custPassword');
        $cpswd = $request->get('custConfirmPassword');

        $errMsg = "";
        $custFactory = new AuthAndPswdFactory();

        include(app_path() . '\securityClass\InputValid.php');
        $val = new \InputValid();

        $val->fieldName('custName')->fieldValue($request->get('custName'))->InputPattern('words')->required();
        $val->fieldName('custEmail')->fieldValue($request->get('custEmail'))->required()->emailValidate($request->get('custEmail'));
        $val->fieldName('custPhone')->fieldValue($request->get('custPhone'))->InputPattern('tel')->required();
        $val->fieldName('custAddress')->fieldValue($request->get('custAddress'))->required();

        if ($val->isSuccess()) {
            if ($custFactory->validatePassword($pswd)) {
                if ($custFactory->validatePassword($cpswd)) {
                    if (!$custFactory->passwordMatching($pswd, $cpswd)) {
                        $customer = new Customer();
                        $customer->custName = $request->get('custName');
                        $customer->custEmail = $request->get('custEmail');
                        $customer->custPhone = $request->get('custPhone');
                        $customer->custAddress = $request->get('custAddress');
                        $customer->custPassword = $pswd;
                        $customer->save();
                        return redirect('/Customer/loginCust');
                    } else {
                        $errMsg .= "Password and Confirm password does not matched.";
                    }
                } else {
                    $errMsg .= "Confirm password must between 8-16 character and contain at least 1 digit, 1 uppercase, 1 lowercase and 1 special character.";
                }
            } else {
                $errMsg .= "Password must between 8-16 character and contain at least 1 digit, 1 uppercase, 1 lowercase and 1 special character. ";
            }
        } else {
            echo '<script>alert("Please ensure all fields are entered and in correct format.")</script>';
            return view('Customer.signUpCust');
        }

        if (strcmp($errMsg, "") != 0) {
            echo "<script>alert('$errMsg');</script>";
            return view('Customer.signUpCust');
        }
    }

    public function show() {
        $id = Session::get('custId');
        $customers = DB::table('customers')->where('id', '=', $id)->get();
        return view('Customer.profileCust', ['customers' => $customers]);
    }

    public function edit() {
        $id = Session::get('custId');
        $customers = Customer::find($id);
        return view('/Customer/editProfileCust', compact('customers', 'id'));
    }

    public function update(Request $request) {
        $id = Session::get('custId');

        $customer = Customer::find($id);

        $customer->custName = $request->get('custName');
        $customer->custEmail = $request->get('custEmail');
        $customer->custPhone = $request->get('custPhone');
        $customer->custAddress = $request->get('custAddress');
        $customer->save();
        return redirect('/Customer/profileCust');
    }

    public function destroy($id) {
        $customers = Customer::find($id);
        $customers->delete();
        return redirect('/Customer/loginCust');
    }

    function authnLoginDetails(Request $request) {
        session::flush('custId');
        if (isset($_GET['custLogEmail']) && isset($_GET['custLogPassword'])) {
            $search_email = $_GET['custLogEmail'];
            $search_pswd = $_GET['custLogPassword'];

            $custFactory = new AuthAndPswdFactory();
            if ($custFactory->authenticateUser($search_email, $search_pswd, $this->roleCust)) {

                $customers = DB::table('customers')->where('custEmail', '=', $search_email)
                        ->where('custPassword', '=', $search_pswd)
                        ->get();
                foreach ($customers as $c) {
                    $custId = $c->id;
                    Session::put('custId', $custId);

                    return view('/homeCust', compact('customers'));
                }
            } else {
                echo '<script>alert("Incorrect email or password. Please try again.")</script>';
                return view('Customer.loginCust');
            }
        } else {
            return view('/Customer/loginCust');
        }
    }

    function checkForgetPswd(Request $request) {
        if (isset($_GET['email']) || isset($_GET['custPassword'])) {
            $email = $_GET['email'];
            $pswd = $_GET['custPassword'];

            $custFactory = new AuthAndPswdFactory();
            if ($custFactory->verifyEmail($email, $this->roleCust)) {
                if ($custFactory->validatePassword($pswd)) {
                    DB::table('customers')
                            ->where("custEmail", '=', $email)
                            ->update(['custPassword' => $pswd]);
                    echo '<script>alert("Password reset successfully!")</script>';
                    return view('Customer.loginCust');
                } else {
                    echo '<script>alert("Password must between 8-16 character and contain at least 1 digit, 1 uppercase, 1 lowercase and 1 special character.")</script>';
                    return view('Customer.forgetpasswordCust');
                }
            } else {
                echo '<script>alert("Oops! Your email entered does not exist. Please try again.")</script>';
                return view('Customer.forgetpasswordCust');
            }
        } else {
            return view('/Customer/forgetpasswordCust');
        }
    }

    function changePassword(Request $request) {
        $errMsg = "";

        if (isset($_GET['custCurrPassword']) || isset($_GET['custNewPassword']) || isset($_GET['custConfPassword'])) {
            $currpswd = $_GET['custCurrPassword'];
            $newpswd = $_GET['custNewPassword'];
            $confpswd = $_GET['custConfPassword'];

            $id = Session::get('custId');

            $custFactory = new AuthAndPswdFactory();
            if ($custFactory->checkExistPassword($id, $currpswd, $this->roleCust)) {
                if ($currpswd != $newpswd) {
                    if ($custFactory->validatePassword($newpswd)) {
                        if (!$custFactory->passwordMatching($newpswd, $confpswd)) {
                            DB::table('customers')
                                    ->where("id", '=', $id)
                                    ->update(['custPassword' => $newpswd]);
                            return redirect('/Customer/profileCust');
                        } else {
                            $errMsg .= "New Password and confirm password does not matched.";
                        }
                    } else {
                        $errMsg .= "Password must between 8-16 character and contain at least 1 digit, 1 uppercase, 1 lowercase and 1 special character.";
                    }
                } else {
                    $errMsg .= "New password cannot be the same as current password.";
                }
            } else {
                $errMsg .= "Current password not matched!";
            }
        } else {
            return view('/Customer/changePasswordCust');
        }

        if (strcmp($errMsg, "") != 0) {
            echo "<script>alert('$errMsg');</script>";
            return view('Customer.changePasswordCust');
        }
    }

    function api() {
        header("Content-Type:application/json");
        if (isset($_GET['id']) && $_GET['id'] != "") {
            $id = $_GET['id'];
            $customers = DB::table('customers')->where('id', '=', $id)->get();
            foreach ($customers as $c) {
                $id = $c->id;
                $custName = $c->custName;
                $custEmail = $c->custEmail;
                $custPhone = $c->custPhone;
                $custAddress = $c->custAddress;
                $this->response($id, $custName, $custEmail, $custPhone, $custAddress);
            }
        } else {
            response(NULL, NULL, 400, "Invalid Request");
        }
    }

     function response($id, $custName, $custEmail, $custPhone, $custAddress) {
        $response['id'] = $id;
        $response['custName'] = $custName;
        $response['custEmail'] = $custEmail;
        $response['custPhone'] = $custPhone;
        $response['custAddress'] = $custAddress;

        $json_response = json_encode($response);
        echo $json_response;
    }

}
