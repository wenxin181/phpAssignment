<?php
namespace App\Factory;
use DB;
/**
 * @author Sim Hui Ming
 */
class AuthAndPswdFactory {

    function authenticateUser($email, $pswd, $userRole) {

        if ($userRole == "cust") {
            $customers = DB::table('customers')->where('custEmail', '=', $email)
                    ->where('custPassword', '=', $pswd)
                    ->get();

            if (isset($customers)) {
                if (count($customers) > 0) {
                    foreach ($customers as $c) {
                        return true;//cust exist
                    }
                } else {
                    return false;
                }
            }
        } else if ($userRole == "staff") {
            $staff = DB::table('staff')->where('staffEmail', '=', $email)
                    ->where('staffPassword', '=', $pswd)
                    ->get();

            if (isset($staff)) {
                if (count($staff) > 0) {
                    foreach ($staff as $s) {
                        return true; //staff exist
                    }
                } else {
                    return false;
                }
            }
        }
    }

    function verifyEmail($email, $userRole) {
        if ($userRole == "cust") {
            $customers = DB::table('customers')->where('custEmail', '=', $email)->get();

            if (isset($customers)) {
                if (count($customers) > 0) {
                    foreach ($customers as $c) {
                        return true;
                    }
                } else {
                    return false;
                }
            }
        } else if ($userRole == "staff") {
            $staff = DB::table('staff')->where('staffEmail', '=', $email)->get();

            if (isset($staff)) {
                if (count($staff) > 0) {
                    foreach ($staff as $s) {
                        return true;
                    }
                } else {
                    return false;
                }
            }
        }
    }

    function checkExistPassword($id, $pswd, $userRole) {

        if ($userRole == "cust") {
            $customers = DB::table('customers')->where('id', '=', $id)->get();

            if (isset($customers)) {
                if (count($customers) > 0) {
                    foreach ($customers as $c) {
                        $oriPswd = $c->custPassword;
                        if ($oriPswd != $pswd) {
                            return false;
                        } else {
                            return true;
                        }
                    }
                } else {
                    return false;
                }
            }
        } else if ($userRole == "staff") {
            $staff = DB::table('staff')->where('id', '=', $id)->get();

            if (isset($staff)) {
                if (count($staff) > 0) {
                    foreach ($staff as $s) {
                        $oriPswd = $s->staffPassword;
                        if ($oriPswd != $pswd) {
                            return false;
                        } else {
                            return true;
                        }
                    }
                } else {
                    return false;
                }
            }
        }
    }

    function validatePassword($pswd) {
        if (strlen($pswd) < 8 && strlen($pswd) > 16) {
            return false;
        } elseif (!preg_match("#[0-9]+#", $pswd)) {
            return false;
        } elseif (!preg_match("#[A-Z]+#", $pswd)) {
            return false;
        } elseif (!preg_match("#[a-z]+#", $pswd)) {
            return false;
        } elseif (!preg_match("#[^\w]+#", $pswd)) {
            return false;
        } else {
            return true;
        }
    }

    function passwordMatching($pswd, $confirmPswd) {
        if ($pswd == $confirmPswd) {
            return false;
        } else {
            return true;
        }
    }

}
