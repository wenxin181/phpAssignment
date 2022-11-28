<?php

/**
 * @author Sim Hui Ming
 */

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Factory\AuthAndPswdFactory;
use DB;
use Session;

class StaffController extends Controller {

    public $roleStaff = "staff";

    public function index() {
        $staff = Staff::all();
        return view('/Staff/staffProfile', compact('staff'));
    }

    public function create() {
        return view('/Staff/signUpStaff');
    }

    public function store(Request $request) {

        $pswd = $request->get('staffPassword');
        $cpswd = $request->get('staffConfirmPassword');

        $errMsg = "";
        $staffFactory = new AuthAndPswdFactory();

        include(app_path() . '\securityClass\InputValid.php');
        $val = new \InputValid();

        $val->fieldName('staffName')->fieldValue($request->get('staffName'))->InputPattern('words')->required();
        $val->fieldName('staffEmail')->fieldValue($request->get('staffEmail'))->required()->emailValidate($request->get('custEmail'));

        if ($val->isSuccess()) {
            if ($staffFactory->validatePassword($pswd)) {
                if ($staffFactory->validatePassword($cpswd)) {
                    if (!$staffFactory->passwordMatching($pswd, $cpswd)) {
                        $staff = new Staff();
                        $staff->staffName = $request->get('staffName');
                        $staff->staffEmail = $request->get('staffEmail');
                        $staff->staffPosition = $request->get('staffPosition');
                        $staff->staffPassword = $pswd;
                        $staff->save();
                        return redirect('/Staff/loginStaff');
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
            echo '<script>alert("Incomplete.")</script>';
            return view('Staff.signUpStaff');
        }


        if (strcmp($errMsg, "") != 0) {
            echo "<script>alert('$errMsg');</script>";
            return view('Staff.signUpStaff');
        }
    }

    public function show() {
        $id = Session::get('staffId');
        $staff = DB::table('staff')->where('id', '=', $id)->get();
        return view('Staff.profileStaff', ['staff' => $staff]);
    }

    public function edit() {
        $id = Session::get('staffId');
        $staff = Staff::find($id);
        return view('/Staff/editProfileStaff', compact('staff', 'id'));
    }

    public function update(Request $request) {
        $id = Session::get('staffId');
        $staff = Staff::find($id);
        $staff->staffName = $request->get('staffName');
        $staff->staffEmail = $request->get('staffEmail');
        $staff->staffPosition = $request->get('staffPosition');

        $staff->save();
        return redirect('/Staff/profileStaff');
    }

    public function destroy($id) {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect('/Staff/loginStaff');
    }

    function authnLoginDetails(Request $request) {
        session::flush('staffId');
        session::flush('staffPosition');
        if (isset($_GET['staffLogEmail']) && isset($_GET['staffLogPassword'])) {
            $search_email = $_GET['staffLogEmail'];
            $search_pswd = $_GET['staffLogPassword'];

            $staffFactory = new AuthAndPswdFactory();
            if ($staffFactory->authenticateUser($search_email, $search_pswd, $this->roleStaff)) {
                $staff = DB::table('staff')->where('staffEmail', '=', $search_email)
                        ->where('staffPassword', '=', $search_pswd)
                        ->get();
                foreach ($staff as $s) {
                    $staffId = $s->id;
                    $staffPosition = $s->staffPosition;

                    Session::put('staffId', $staffId);
                    Session::put('staffPosition', $staffPosition);
                    return view('/homeStaff', compact('staff'));
                }
            } else {
                echo '<script>alert("Incorrect email or password. Please try again.")</script>';
                return view('Staff.loginStaff');
            }
        } else {
            return view('/Staff/loginStaff');
        }
    }

    function checkForgetPswd(Request $request) {
        if (isset($_GET['email']) || isset($_GET['staffPassword'])) {
            $email = $_GET['email'];
            $pswd = $_GET['staffPassword'];

            $staffFactory = new AuthAndPswdFactory();
            if ($staffFactory->verifyEmail($email, $this->roleStaff)) {
                if ($staffFactory->validatePassword($pswd)) {
                    DB::table('staff')
                            ->where("staffEmail", '=', $email)
                            ->update(['staffPassword' => $pswd]);
                    echo '<script>alert("Password reset successfully!")</script>';
                    return view('Staff.loginStaff');
                } else {
                    echo '<script>alert("Password must between 8-16 character and contain at least 1 digit, 1 uppercase, 1 lowercase and 1 special character.")</script>';
                    return view('Staff.forgetpasswordStaff');
                }
            } else {
                echo '<script>alert("Oops! Your email entered does not exist. Please try again.")</script>';
                return view('Staff.forgetpasswordStaff');
            }
        } else {
            return view('/Staff/forgetpasswordStaff');
        }
    }

    function changePassword(Request $request) {
        $errMsg = "";

        if (isset($_GET['staffCurrPassword']) || isset($_GET['staffNewPassword']) || isset($_GET['staffConfPassword'])) {
            $currpswd = $_GET['staffCurrPassword'];
            $newpswd = $_GET['staffNewPassword'];
            $confpswd = $_GET['staffConfPassword'];
            $id = Session::get('staffId');

            $custFactory = new AuthAndPswdFactory();
            if ($custFactory->checkExistPassword($id, $currpswd, $this->roleStaff)) {
                if ($currpswd != $newpswd) {
                    if ($custFactory->validatePassword($newpswd)) {
                        if (!$custFactory->passwordMatching($newpswd, $confpswd)) {
                            DB::table('staff')
                                    ->where("id", '=', $id)
                                    ->update(['staffPassword' => $newpswd]);
                            return redirect('/Staff/profileStaff');
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
            return view('/Staff/changePasswordStaff');
        }

        if (strcmp($errMsg, "") != 0) {
            echo "<script>alert('$errMsg');</script>";
            return view('Staff.changePasswordStaff');
        }
    }

}
