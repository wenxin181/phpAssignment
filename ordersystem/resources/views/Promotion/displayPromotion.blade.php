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
    <p>Promotion</p>
</div>
<table>
    <tr style="height:50px; text-align: center; background-color: #55608f; color: #fff;">
        <th style="width:50px;">No.</th>
        <th style="width:100px;">Promotion ID</th>
        <th style="width:150px;">Promotion Rate</th> 
        <th style="width:150px;">Promotion Category</th>
        <th style="width:200px;">Promotion Description</th>
        <th colspan="2" style="width:200px;">Edit / Delete</th>
    </tr>
    @foreach ($promotions as $promotion)
    <tr style="background-color:#8390c9; height:70px;">
        <td>{{$promotion['id']}}</td>
        <td>{{$promotion['promotion_id']}}</td>
        <td>{{$promotion['promotionRate']}}</td>
        <td>{{$promotion['promotionCategory']}}</td>
        <td>{{$promotion['promotionDescription']}}</td>
        <td>
            <a href="{{route('edit-promotion', $promotion['id'])}}">
                <button style="color: #fff; text-decoration: none;"><b>Edit</b></button>
            </a>
        </td>
        <td>
            <form action="{{route('delete-promotion', $promotion['id'])}}" method="POST">
                @csrf
                <button style="color: #fff;"><b>Delete</b></button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
<div style="margin-right:50px; margin-left:880px; margin-top:20px;">
    <a href="{{route('PromotionPDF')}}">
        <button class="w3-btn w3-blue" style="color: #fff;"><b>Download PDF</b></button>
    </a>
</div>
<div style="margin-right:50px; margin-left:880px; margin-top:20px;">
    <a href="{{route('displayXML')}}" target="_blank">
        <button class="w3-btn w3-blue" style="color: #fff;"><b>Display XML</b></button>
    </a>
</div>

<div style="margin-bottom:130px;">
    <div style="padding-top: 20px; height:100px;">
        <p style=" margin-right: auto; margin-left: auto; width: 30%; padding-top: 10px; padding-bottom: 30px; text-align: center; font-size: 25px; font-family: 'Abel', sans-serif; font-weight: bold; color: #6e6b6a;">
            Add A New Promotions! 
        </p>
    </div>
    <div style="height: 50px;position: relative;">
        <div style="position: absolute; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
            <a href="{{route('insertPromotionPage')}}">
                <button class="w3-btn w3-blue" style="color: #fff;"><b>Add New Promotions!</b></button>
            </a>
        </div>
    </div>
</div>

@endsection