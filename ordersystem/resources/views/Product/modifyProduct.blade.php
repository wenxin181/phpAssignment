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
            <h2>Update Product Here!!</h2>
        </div>

        <div class="container">

            <div style="padding-left:350px;padding-right:350px;padding-top:25px;padding-bottom:25px;">
                <form method="post" action="{{route('modifyProduct', $id)}}">
                    @csrf

                    <table style="width:100%;height:350px;" >
                        <tr> 
                            <td style="width:50%!important;text-align: right;"><label for="productName">Product Name</label></td>
                            <td style="width:10%!important;text-align: right;">:</td>
                            <td style="width:40%!important;text-align: center;"> <input type="text"  name="productName" id="productName" value="{{$products->productName}}" size="30"  /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="productPrice">Product Price</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"> <input type="text" name="productPrice" id="productPrice" size="30" value="{{$products->productPrice}}" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="productDetail">Product Detail</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="text" name="productDetail" id="productDetail" size="30" value="{{$products->productDetail}}" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="quantity">Quantity</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="number" name="quantity" id="quantity" size="30" value="{{$products->quantity}}" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="datePublish">Date Publish</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="text"  name="datePublish" id="datePublish" size="30" value="{{$products->datePublish}}" disabled/></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="productImage">Product Image</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><img src="{{asset('imageProduct/'.$products->productImage)}}" border="1" width="200px" height="200px"></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="colour">Colour</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="text" name="colour" id="colour" size="30" value="{{$products->colour}}" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="categoryName">Category Name</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: left;"><select name="categoryName" id="categoryName" value="{{$products->categoryName}}">
                                    <option value="Top">Top</option>
                                    <option value="Bottom">Bottom</option>
                                    <option value="Bag">Bag</option>
                                    <option value="Shoes">Shoes</option>
                                </select>
                        </tr>
                    </table>
            </div>
            <div class="text-center py-3">
                <button type="submit" name="deleteProduct" value="deleteProduct" class="btn btn-warning mx-2">Modify</button>
            </div>
        </div>
    </form>

@endsection