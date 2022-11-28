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
        /*                font-weight:bold;*/
    }
    .title {
        margin-left: auto;
        margin-right: auto;
        width:320px;
        margin-bottom:60px;
        border-bottom: 1px solid black;
    }
    form > p{
        margin-bottom:30px;
    }
    form > p > label{
        width:200px; 
        margin-right:50px;
        font-size:15px;
        font-family: 'Abel', sans-serif;
    }
    form > p > input{
        border-radius: 5px;
        border: 1px solid black;
        width:200px;
    }
    button {
        outline: none;
        display: block;
        border: 0;
        font-size: 16px;
        line-height: 1;
        padding: 16px 30px;
        border-radius: 30px;
        cursor: pointer;
        background-color: #6569E9;
        color:white;
        font-weight:bold;
        transition: all 0.3s linear;
        margin-bottom:100px;
        margin-top:100px;
    }
</style>
<div class="promotionForm">
    <div class="title">
        <p>Edit Promotion | No.{{ $val }}</p>
        <p></p>
    </div>
    <form method="post" action="{{route('update-promotion', $id)}}">
        @csrf
        <p>
            <label for ="promotion_id" >Product ID:</label>
            <input type="text" name="promotion_id" value="{{$promotions->promotion_id}}">          
        </p>
        <p>
            <label for ="promotionRate">Promotion Rate:</label>
            <input type="number" name="promotionRate" min="0" max="100">
        </p>
        <p>
            <label for ="promotionDescription">Promotion Description:</label>
            <input type="text" name="promotionDescription" value="{{$promotions->promotionDescription}}">          
        </p>
        <p>
            <label for ="promotionCategory">Promotion Category:</label>
            <select name="promotionCategory" id="categoryName" style="border-radius:5px;">
                <option value="Top">Top</option>
                <option value="Bottom">Bottom</option>
                <option value="Bag">Bag</option>
                <option value="Shoes">Shoes</option>
            </select>        
        </p>
        <div style="padding-top:20px; height: 100px;position: relative;">
            <div style="margin: 0; position: absolute; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
                <button type="submit">Update</button>
            </div>
        </div>
    </form>
</div>
@include('sweetalert::alert')
@endsection