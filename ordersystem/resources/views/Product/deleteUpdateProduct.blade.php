<?php
/**
 * @author wai Hau Guan
 */
?>
@extends('layouts.masterPageStaff')

@section('content2')
<style>
    table, th, td {
        border:1px solid black;
    }
</style>


<body>
    <!--HEADER-->
    <div class="text-center pt-4 pb-2">
        <h2>Delete / Update Products</h2>
    </div>

    <div style="text-align: center;padding-left:150px;padding-right: 150px;padding-top: 50px;padding-bottom: 50px;">

        <div class="text-center py-3">
            <a href="{{route('displayProductXML')}}" target="_blank">
                <button class="btn btn-warning mx-2">Display Product XML</button>
            </a>
        </div>
        @if(count($products) > 0)
        <table border = "1" style="width:100%;text-align: center;">
            <tr style="font-weight: bold;" >
                <td>Product Id</td>
                <td>Product </td>
                <td>Date Publish</td>
                <td>Price</td>
                <td>Description</td>
                <td>Quantity</td>
                <td>Colour</td>
                <td>Category Name</td>
                <td></td>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{$product['id']}}</td>
                <td></br>{{$product['productName']}}</br><img src="{{asset('imageProduct/'.$product['productImage'])}}" border="1" width="200px" height="200px"></br></br></td>
                <td>{{$product['datePublish']}}</td>
                @if($product->promotionPrice == null)
                    <td>RM {{ $product->productPrice }}</td>
                    @else
                    <td style="color:red;">RM {{ $product->promotionPrice }}</td>
                    @endif
               
                <td>{{$product['productDetail']}}</td>
                <td>{{$product['quantity']}}</td>
                <td>{{$product['colour']}}</td>
                <td>{{$product['categoryName']}}</td>
                <td>
                    <div class="text-center py-3">
                        <button type="submit" onclick="location.href ='{{route('editProduct',$product['id'])}}'" name="modify" value="modify" class="btn btn-warning mx-2" style="background-color: #4CAF50 !important; border: none;">Modify</button>
                    </div>
                </td>
                <td>
                    <form action="{{route('deleteProduct',$product['id'])}}" method="POST">
                        @csrf
                        <div class="text-center py-3">
                            <button type="submit" name="delete" value="delete" class="btn btn-warning mx-2" style="background-color: #f44336 !important; border: none;">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="text-center py-3">
            <form action="{{route('ProductPDF')}}" method="GET">
                @csrf

                <button type="submit" name="delete" value="delete" class="btn btn-warning mx-2">Print PDF</button>

            </form>
        </div>
        @else


        <h2>No result found!</h2>
        @endif

    </div>

    @include('sweetalert::alert')




    <footer id="footer"  class="footer">
        <div class="container-fluid py-3 bg-light">
            <div class="text-center">
                Follow Us
            </div>
            <div class="hm-footer-copyright text-center">
                <div class="footer-social pt-2" >
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>	
                    <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                    <a href="https://twitter.com/login"><i class="fa fa-twitter"></i></a>
                </div>
                <p style="font-size: 80%;margin-bottom: 0px">Copyright 2022 &copy; M&#252;m&#252;. All rights reserved.</br>
                    <span>Made with <span class="heart">♥</span> Team of M&#252;m&#252;</span>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>


@endsection