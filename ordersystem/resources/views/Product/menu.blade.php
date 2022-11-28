<?php
/**
 * @author wai Hau Guan
 */
?>
@extends('layouts.masterPageStaff')

@section('content2')
    <style>
        button{
            width: 250px ;      
            height: 60px;
        }
    </style>
    <body>
        <div class="text-center pt-4 pb-2">
            <h2>Product Module</h2>
        </div>
        <div style="text-align: center;padding-left:150px;padding-right: 150px;padding-top: 50px;padding-bottom: 50px;">
            <table  style="width:100%;height:350px;text-align: center;">

                <tr>
                    <td><button type="submit" onclick="location.href ='{{route('addData')}}'" class="btn btn-warning mx-2">Add Product</button></td>
                </tr>
                <tr>
                    <td> <button type="submit" onclick="location.href ='{{route('delUpData')}}'" class="btn btn-warning mx-2" >Delete / Modify Product</button></td>
                </tr>
                <td><button type="submit" onclick="location.href ='{{route('searchData')}}'" class="btn btn-warning mx-2" >Search Product</button></td>
                <tr>

                    <td> <button type="submit" onclick="location.href ='{{route('displayData')}}'" class="btn btn-warning mx-2" >Display Product</button></td>

                </tr>
            </table>

        </div>
    </body>
</html>

@endsection