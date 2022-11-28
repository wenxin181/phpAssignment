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

    .btnRemove{
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

    .btnRemove:hover {
        background-color: rgb(196, 245, 245);
    }

    .h2{
        text-align: center;
    }
</style>
<head>
    <title>Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7145330698.js" crossorigin="anonymous"></script>
</head>
<div class="table-users">
    @if(count($carts) > 0)

    <table cellspacing="0">
        <tr style="font-weight: bold;">
            <th>Product</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
            <th></th>
        </tr>
        @foreach ($carts as $cartItem)
        <tr>
            <td><img src="{{asset('imageProduct/'.$cartItem->productImage )}}" border="1" width="200px" height="200px"><br>{{ $cartItem->productName }}</td>

            <td>{{ $cartItem->productPrice}}</td>
            <td>{{ $cartItem->cartQuantity}}</td>
            <td>{{ $cartItem->subTotal }}</td>
            <td>
                <form action="{{route('removeFromCart',$cartItem->cartId)}}" method="POST"> 
                    @csrf
                    <div class="text-center py-3">
                        <button type="submit" name="removeFromCart" class="btnRemove">Remove</button>
                    </div>
                </form>
            </td>
        </tr> 
        @endforeach
        <tr style="border-top:1px black solid">
            <td>
                Total Amount: {{$carts->sum('subTotal')}}  
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td> 
                <form action="{{route('displayItem')}}" method="GET"> 
                    @csrf
                    <button type="submit"name="confirmOrder" class="btnRemove">Confirm Order</button>
                </form>
            </td>
        </tr>
    </table>
    @else
    <h2 style="text-align: center">No result found!</h2>
    @endif
</div>
</div>
@endsection

@include('sweetalert::alert')
