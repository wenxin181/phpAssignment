<?php
/**
 * @author Soong Wen Xin
 */
?>
<!DOCTYPE html>
<html> 
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            min-height: 100vh;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            font-family: 'Raleway';
        }

        .payment-title {
            width: 100%;
            text-align: center;
        }

        .form-container .field-container:first-of-type {
            grid-area: name;
        }

        .form-container .field-container:nth-of-type(2) {
            grid-area: number;
        }

        .form-container .field-container:nth-of-type(3) {
            grid-area: expiration;
        }

        .form-container .field-container:nth-of-type(4) {
            grid-area: security;
        }

        .field-container input {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .field-container {
            position: relative;
        }

        .form-container {
            display: grid;
            grid-column-gap: 10px;
            grid-template-columns: auto auto;
            grid-template-rows: 90px 90px 90px;
            grid-template-areas: "name name""number number""expiration security";
            max-width: 400px;
            padding: 20px;
            color: #707070;
        }

        label {
            padding-bottom: 5px;
            font-size: 13px;
        }

        input {
            margin-top: 3px;
            padding: 15px;
            font-size: 16px;
            width: 100%;
            border-radius: 3px;
            border: 1px solid #dcdcdc;
        }

        .container {
            width: 100%;
            max-width: 400px;
            max-height: 251px;
            height: 54vw;
            padding: 20px;
        }

        .container {
            perspective: 1000px;
        }

        .btn{
            background-color: rgb(224, 224, 235);
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            color: black;
            font-family: 'Abel', sans-serif;
            font-size: 14px;
            font-weight: 500;
            line-height: 20px;
            padding: 6px 16px;
            text-align: center;
        }
        .btn:hover{
            background-color:rgb(208, 208, 225);
        }
    </style>
    <body>
        <form action="{{route('payPaypal')}}" method="POST"> 
            @csrf
            <div class="payment-title">
                <h1>PayPal Information</h1>
            </div>
            <div class="form-container">
                <div class="field-container">
                    <label for="name">Email</label>
                    <input id="payEmail" name="payEmail" maxlength="30" type="text">
                </div>
                <div class="field-container">
                    <label for="cardnumber">Password</label>
                    <input type="password" name="password" id="password"/></br>              
                </div>
                <div>
                    <button type="submit" name="confirmPay" class="btn">Pay</button>
                </div>
            </div> 
        </form>
    </body>
</html>

@include('sweetalert::alert')