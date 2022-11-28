<?php
/**
 * @author Lee Jun Jie
 */
?>
@extends('layouts.masterPageStaff')

@section('content2')
<style>
    .promotionForm{
        max-width:500px;
        margin:auto;
    }
    .title p{
        font-size: 30px;
        font-family: 'Abel', sans-serif;
        color: #6e6b6a;
        margin-bottom: 5px;
        /*                font-weight:bold;*/
    }
    .title {
        margin-left: auto;
        margin-right: auto;
        width:140px;
        margin-bottom:50px;
        border-bottom: 1px solid black;
    }
    button {
        outline: none;
        display: block;
        border: 0;
        font-size: 16px;
        line-height: 1;
        padding: 16px 30px;
        border-radius: 10px;
        cursor: pointer;
        background-color: #6569E9;
        color:white;
        font-weight:bold;
        transition: all 0.3s linear;
        margin-right:auto;
        margin-left:auto;
    }
    table{
        border: 1px solid black;
        border-radius: 10px;
        margin-left: auto; 
        margin-right: auto;
        width:1000px;
    }
    tr{
        padding:15px;
    }
    td{
        font-size: 15px;
        font-family: 'Abel', sans-serif;
        color: #fff;
        text-align:center;
    }
    a:link{
        text-decoration: none;
    }
</style>
<div class="title">
    <p>Order Details</p>
</div>
<table>
    <tr style="height:50px; text-align: center; background-color: #55608f; color: #fff;">
        <th style="width:50px;">No.</th>
        <th style="width:100px;">Order ID</th>
        <th style="width:150px;">Product ID</th> 
        <th style="width:150px;">Order Quantity</th>
        <th style="width:200px;">Unit Price</th>
        <th style="width:200px;">Sub Total</th>
    </tr>
    @foreach ($orders as $order)
    <tr style="background-color:#8390c9; height:70px;">
        <td>{{$order['orderDetailsId']}}</td>
        <td>{{$order['orderId']}}</td>
        <td>{{$order['productId']}}</td>
        <td>{{$order['orderQuantity']}}</td>
        <td>{{$order['unitPrice']}}</td>
        <td>{{$order['subTotal']}}</td>
    </tr>
    @endforeach

</table>
<div style="margin-right:50px; margin-left:880px; margin-top:20px;">
    <a href="{{route('OrderPDF')}}">
        <button class="w3-btn w3-blue" style="color: #fff;"><b>Download PDF</b></button>
    </a>
</div>

@endsection