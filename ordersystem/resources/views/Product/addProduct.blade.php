<?php
/**
 * @author wai Hau Guan
 */
?>
@extends('layouts.masterPageStaff')

@section('content2')
    <script>
function getDate() {
    var today = new Date();
    document.getElementById("datePublish").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
}
    </script>

    <body onload="getDate()">
        <!--HEADER-->
        <div class="text-center pt-4 pb-2">
            <h2>Add A New Product Here!!</h2>
        </div>

        <div class="container">

            <form method="POST"  action="{{url('/Product/addProduct')}}" enctype="multipart/form-data">
                @csrf
                <div style="padding-left:350px;padding-right:350px;padding-top:25px;padding-bottom:25px;">
                    <table style="width:100%;height:350px;" >
                        <tr> 
                            <td style="width:50%!important;text-align: right;"><label for="productName">Product Name</label></td>
                            <td style="width:10%!important;text-align: right;">:</td>
                            <td style="width:40%!important;text-align: center;"> <input type="text"  name="productName" id="productName" placeholder="Polo Shirt"  size="30" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="productPrice">Product Price</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"> RM <input type="text" name="productPrice" id="productPrice" placeholder="eg. 20 Or 20.90" size="30" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="productDetail">Product Detail</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="text" name="productDetail" id="productDetail" placeholder="I am A T-Shirt" size="30" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="quantity">Quantity</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="number" name="quantity" id="quantity" size="30" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="datePublish">Date Publish</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="text"  name="datePublish" id="datePublish" size="30" readonly/></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="productImage">Product Image</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="file" name="productImage" id="productImage" size="30"/></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="colour">Colour</label></td>
                            <td style="text-align: right;">:</td>
                            <td style="text-align: center;"><input type="text" name="colour" id="colour" placeholder="e.g. Black" size="30" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;"><label for="categoryName">Category Name</label></td>
                            <td style="text-align: right;">:</td>
                            <td >&nbsp;&nbsp;&nbsp;<select name="categoryName" id="categoryName">
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="bag">Bag</option>
                                    <option value="shoes">Shoes</option>
                                </select></td>
                        </tr>
                    </table>
                </div>
                <div class="text-center py-3">                   
                    <button type="submit" name="addProduct" value="addProduct" class="btn btn-warning mx-2">Create</button>
                </div>
            </form>
        </div>

@include('sweetalert::alert')

@endsection