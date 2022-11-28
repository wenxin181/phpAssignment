<?php
/**
 * @author Soong Wen Xin
 */
?>
@extends('layouts.masterPageCust')

@section('content2')
<style>
    .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%; /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%; /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
        font-size: 17px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 28px;
    }

    .btn {
        background-color: #04AA6D;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: grey;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }
        .col-25 {
            margin-bottom: 20px;
        }
    }
    table {
        text-align: center;
        width: 100%;
    }

    td, th { 
        color: black;
        padding: 10px;
    }
    label {
        display: block;
        color: black;
    }

    .floatBlock {
        margin: 0 1.81em 0 0;
        color: black;
        font-size:17px;
    }

    .labelish {
        color:black;
        margin: 0;
        font-size:17px;
    }

    .paymentOptions {
        border: none;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        break-before: always;
        margin-left: 40%;
    }

    #purchaseOrder {
        margin: 0 0 2em 0;
    }
    input[type=radio] {
        border: 0px;
        width: 20px;
        height: 20px;
    }
</style>
<head>
    <title>Check Out</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7145330698.js" crossorigin="anonymous"></script>
</head>
<body>
    <form action="{{route('checkOut')}}" method="POST"> 
        @csrf
        <h2 style="text-align:center">Check Out</h2>
        <div class="row">
            <div class="col-75">
                <div class="container" >
                    <div class="row"style="border-bottom:2px solid grey">
                        <div class="col-50">
                            <h3>Shipping Information</h3>
                            <label for="fname"><i class="fa fa-user"></i>Full Name</label>
                            <input type="text" id="shipName" name="shipName" placeholder="John M. Doe">
                            <label for="phone"><i class="fa fa-institution"></i> Phone Number</label>
                            <input type="text" id="shipPhone" name="shipPhone" placeholder="019-1234567">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="shipAddress" name="shipAddress" placeholder="542 W. 15th Street">  
                        </div>                     
                    </div>   
                    </br>
                    <div class="row">
                        <div class="col-50">
                            <label for="adr">Date Order</label>

                            <input type="text" style="color:black" name="orderDate" id="orderDate" disabled/>  
                            <script>
var today = new Date();
var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
document.getElementById("orderDate").value = date;
                            </script>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-50">
                            <div class="container">
                                <h4 style="text-align:center">Cart                                  
                                    <i class="fa fa-shopping-cart"></i>
                                </h4>
                                @if(count($carts) > 0)
                                <table>
                                    <tr style="font-weight: bold;">
                                        <th>Product</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Sub Total</th>
                                    </tr>
                                    @foreach ($carts as $cartItem)
                                    <tr>
                                        <td>{{ $cartItem->productName }}</td>
                                        <td>{{ $cartItem->productPrice}}</td>
                                        <td>{{ $cartItem->cartQuantity }}</td>
                                        <td>{{ $cartItem->subTotal }}</td>
                                    </tr> 
                                    @endforeach

                                    <tr>
                                    <hr>
                                    <td><b>Total</b></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>{{$carts->sum('subTotal')}}</b></td>
                                    </tr> 
                                </table>
                                @else
                                <h4 style="text-align:center">No result found!</h4>                               
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <div class="container" style="text-align:center">

                                </br>
                                <h4>Please select your payment method: </h4>
                                </br></br>

                                <div id="paymentContainer" name="paymentContainer" class="paymentOptions">
                                    <div class="floatBlock">
                                        <label for="paymentCC"> <input id="paymentType" value="CreditCard" name="paymentType" type="radio" checked/>  Credit Card  </label>
                                    </div>

                                    <div class="floatBlock">
                                        <label for="paymentPP"> <input id="paymentType" value="Paypal" name="paymentType" type="radio" /> PayPal </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" style="font-size:20px" value="Continue to Check Out" id="continue" class="btn">
                </div>
            </div>
        </div> 
    </form>

</body>
@endsection
@include('sweetalert::alert')