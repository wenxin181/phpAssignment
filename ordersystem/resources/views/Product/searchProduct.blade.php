<?php
/**
 * @author wai Hau Guan
 */
?>
@extends('layouts.masterPageStaff')

@section('content2')

    <body onload="getDate()">
        <!--HEADER-->
        <div class="text-center pt-4 pb-2">
            <h2>Search Product Here!!</h2>
        </div>

        <div class="container">

            <div style="padding-left:350px;padding-right:350px;padding-top:25px;padding-bottom:25px;">
                <form action="{{ route('searchData') }}" method="GET">
                    <table style="width:100%;" >
                        <tr> 
                            <td style="width:50%!important;text-align: right;"><label for="productID">Product ID</label></td>
                            <td style="width:5%!important;text-align: right;">:</td>
                            <td style="width:40%!important;text-align: center;"> <input type="search"  name="productID"> </td>
                            <td style="text-align: left;"> <button type="submit" class="btn btn-warning mx-2" value="{{ request()->input('productID') }}">Search</button></td>
                        </tr>
                    </table>
                </form>


                @if(isset($products))
                <table style="width:100%;height:350px;">
                    @if(count($products) > 0)
                    @foreach($products as $product)

                    <tr> 
                        <td style="width:50%!important;text-align: right;"><label for="productName">Product Name</label></td>
                        <td style="width:10%!important;text-align: center;">:</td>
                        <td style="width:40%!important;text-align: left;"> <input type="text"  name="productName" id="productName" size="30" value="{{$product->productName}}" disabled/></td></br>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="productPrice">Product Price</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"> <input type="text" name="productPrice" id="productPrice" size="30" value="{{$product->productPrice}}"  disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="productDetail">Product Detail</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"><input type="text" name="productDetail" id="productDetail" size="30" value="{{$product->productDetail}}"  disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="quantity">Quantity</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"><input type="text" name="quantity" id="quantity" size="30" value="{{$product->quantity}}"  disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="datePublish">Date Publish</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"><input type="text"  name="datePublish" id="datePublish" size="30" value="{{$product->datePublish}}"  disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="productImage">Product Image</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: center;"><img  src="{{asset('imageProduct/'.$product->productImage )}}" border="1" width="200px" height="200px" ></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="colour">Colour</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"><input type="text" name="colour" id="colour" size="30" value="{{$product->colour}}"  disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="categoryName">Category Name</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"><input type="text" name="categoryName" id="categoryName" size="30" value="{{$product->categoryName}}"  disabled/></td>
                    </tr>

                    @endforeach
                    
                    @else

                    <h2>No result found!</h2>
                    @endif
                </table>

                @endif



            </div>
        </div>

@endsection