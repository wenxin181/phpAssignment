<?php
/**
 * @author Sim Hui Ming
 */
?>
@extends('layouts.masterPageProfileCust')

@section('content2')
<script>
    function currentpassword_reset() {
        var x = document.getElementById("custCurrPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function newpassword_reset() {
        var x = document.getElementById("custNewPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function confpassword_reset() {
        var x = document.getElementById("custConfPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<!--        <div class="text-center mt-4 pt-4 mb-4 "></div>
-->        <div class="text-center mt-3 pt-3 mb-5 ">
    <h2>Change My Password</h2>
</div>

<div class="container">
    <div class="row py-3">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form method="GET" action="{{route('changePasswordCust')}}">

                <p><label for="custCurrPassword">Current Password:</label>
                    <input type="password" name="custCurrPassword" id="custCurrPassword" size="30" /></br>
                    <input type="checkbox" onclick="currentpassword_reset()"><small>Show Password</small></p>

                <p><label for="custNewPassword">New Password:</label>&nbsp; &nbsp;&nbsp;&nbsp;
                    <input type="password" name="custNewPassword" id="custNewPassword" size="30" /></br>
                    <input type="checkbox" onclick="newpassword_reset()"><small>Show Password</small></p>

                <p><label for="custConfPassword">Confirm Password:</label> 
                    <input type="password" name="custConfPassword" id="custConfPassword" size="30" /></br>
                    <input type="checkbox" onclick="confpassword_reset()"><small>Show Password</small></p>


                <div class="text-center pt-3 pb-5">
                    <button type="submit" name="changePasswordCust" class="btn btn-warning mx-2">CHANGE PASSWORD</button>
                </div>
            </form>

        </div>
        <div class="col-sm-4">
        </div>
    </div>
    <div class="text-center mt-3 pt-4  "></div>
</div>
@endsection
