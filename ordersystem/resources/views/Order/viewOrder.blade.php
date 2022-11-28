<?php
/**
 * @author Soong Wen Xin
 */
?>
@extends('layouts.masterPageCust')

@section('content2')
    <style>

        #minus , #plus{
            height:25px;
            width:25px;
            border:none;
            border-radius:50%;
            font-size:10px;
            text-align: center;
        }
        #minus:hover{
            background-color:rgb(213, 237, 240);    
            border:none;
        }
        #plus:hover{
            background-color:rgb(213, 237, 240);
            border:none;
        }
        body {
            background-color: white;
            * { box-sizing: border-box; }
        }

        .header {
            color: white;
            font-size: 1.5em;
            padding: 1rem;
            text-align: center;
            text-transform: uppercase;
        }

        img {
            border-radius: 50%;
            height: 60px;
            width: 60px;
        }

        .table-users {
            border: rgb(242, 252, 252);
            border-radius: 10px;
            box-shadow: 3px 3px 0 rgba(0,0,0,0.1);
            max-width: calc(100% - 2em);
            margin: 1em auto;
            overflow: hidden;
            width: 800px;
        }

        table {
            text-align: center;
            width: 100%;
        }

        td, th { 
            color: black;
            padding: 20px; 
        }

        td {
            text-align: center;
            vertical-align: middle;

            &:last-child {
                font-size: 0.95em;
                line-height: 1.4;
                text-align: left;
            }
        }

        th { 
            background-color: rgb(213, 237, 240);
            font-weight: bold;
            font-size:20px;
        }

        tr {     
            background-color: white;
        }

        .btn{
            background-color: rgb(213, 237, 240);
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

        .btn:hover {
            background-color: rgb(196, 245, 245);
        }

        .h2{
            text-align: center;
        }
    </style>
    <head>
        <title>Order List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/7145330698.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="table-users">
            @if(count($orders) > 0)
            <table cellspacing="0">
                <tr style="font-weight: bold;">
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Total Amount</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->orderDate }}</td>
                    <td>{{ $order->totalAmount }}</td>

                <form action="{{route('showOrderDetails')}}" method="POST">
                    @csrf
                    <td>
                        <div class="text-center py-3"> 
                            <input type="hidden" name="orderId" id="orderId" value="{{$order->id}}">
                            <button type="submit" class="btn">VIEW</button> 
                        </div>
                    </td>                       
                </form>
                </tr> 
                @endforeach               
            </table>

            @else
            <h2>No result found!</h2>
            @endif
        </div>
    </div>
</body>

@endsection
@include('sweetalert::alert')
