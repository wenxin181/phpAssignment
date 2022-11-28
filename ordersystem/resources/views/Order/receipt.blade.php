<?php
/**
 * @author Soong Wen Xin
 */
?>
@extends('layouts.masterPageCust')

@section('content2')
    <style>
        #invoice-POS{
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding:2mm;
            margin: 0 auto;
            width: 75%;
            background: #FFF;
        }
        ::selection {background: #f31544; color: rgb(242, 242, 242);}
        ::moz-selection {background: #f31544; color: rgb(242, 242, 242);}
        h1{
            font-size: 25px;
            color: #222;
        }
        h2{
            text-align:center;
            font-size: 20px;
        }
        h3{
            font-size: 18px;
            font-weight: 300;
            line-height: 2em;
        }
        p{
            font-size: 20px;
            color: #666;
            line-height: 1.2em;
            text-align:center;
        }

        #top, #mid,#bot{ 
            border-bottom: 1px solid #EEE;
            text-align:center;
        }

        #top{min-height: 100px;}
        #mid{min-height: 80px;} 
        #bot{ min-height: 50px;}

        .info{
            display: block;
            margin-left: 0;
        }
        .title{
            float: right;
        }
        .title p{text-align: right;} 
        table{
            width: 80%;
            border-collapse: collapse;
            text-align:center;
            margin-left:10%;
        }
        td{
            border: 1px solid rgb(242, 242, 242);
            font-size:18px;
        }
        .tabletitle{
            font-size: .5em;
            background: rgb(242, 242, 242);
        }
        .service{border-bottom: 1px solid #EEE;}
        .item{width: 20%;}
        .itemtext{font-size: 20px;}

        #tq{
            margin-top: 5mm;
            text-align: center;
        }   
        .btn{
            background-color: rgb(196, 245, 245);
            border: 1px solid rgba(27, 31, 35, .15);
            border-radius: 6px;
            color: black;
            font-family: 'Abel', sans-serif;
            font-size: 14px;
            font-weight: 500;
            line-height: 20px;
            padding: 6px 16px;
            text-align: center;
            margin-left: 45%;
        }

        .btn:hover {
            background-color: rgb(213, 237, 240);
        }
    </style>


    <head>
        <title>Order Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/7145330698.js" crossorigin="anonymous"></script>

    </head>

    <body>

        @foreach ($orders as $order)
        <div id="invoice-POS">
            <div id="mid">
                <div class="info">
                    <table>
                        <tr>
                            <td></td>
                            <td>
                        <center id="top">
                            <div class="info"> 
                                <h1>MuMu</h1>
                                </br>
                                <h1>Order Details</h1></br>
                            </div>
                        </center>
                        </td>
                        <td></td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Shipping Details</h3>
                                <p> 
                                    Name : {{$order->shipName}}</br>
                                    Phone : {{$order->shipPhone}}</br>
                                    Address : {{$order->shipAddress}}</br>                    
                                </p>
                            </td>
                            <td></td>
                            <td>
                                <h3>Payment Details</h3>
                                <p> 
                                    Payment Date : {{$order->paymentDate}}</br>
                                    <?php echo $pay; ?></br>
                                    <?php echo $fromAccount; ?> : {{$order->fromAccount}}</br>                    
                                </p>
                            </td>
                        </tr>
                    </table>


                </div>
            </div>
            </br></br>
            <div id="bot">

                <div id="table">
                    <table>
                        <tr class="tabletitle">
                            <td class="item"><h2>Product Name</h2></td>
                            <td ><h3>Quantity</h3></td>
                            <td ><h3>Unit Price</h3></td>
                            <td ><h3>Sub Total</h3></td>
                        </tr>

                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->productName}}</td>
                            <td>{{ $item->orderQuantity }}</td>
                            <td>{{ $item->unitPrice }}</td>
                            <td>{{ $item->subTotal}}</td>
                        </tr> 
                        @endforeach
                        <tr class="tabletitle">
                            <td></td>
                            <td></td>
                            <td class="Rate"><h3>Total</h3></td>
                            <td class="payment"><h3>{{$order->totalAmount}}</h3></td>
                        </tr>

                    </table>
                </div><!--End Table-->

                <div id="tq">
                    <strong style="font-size:20px">Thank you for your order!Hope you have a nice day!</strong>
                </div>
            </div>
        </div>
        @endforeach
        </form>
    </body>
@endsection
@include('sweetalert::alert')
