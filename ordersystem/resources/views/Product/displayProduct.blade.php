<?php
/**
 * @author wai Hau Guan
 */
?>
@extends('layouts.masterPageCust')

@section('content2')
<style>
    table, th, td {
        border:1px solid black;
    }
    button{
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
</style>

<body>
    <!--HEADER-->
    <div class="text-center pt-4 pb-2">
        <h2>Products</h2>
    </div>

    <div style="text-align: center;padding-left:200px;padding-right: 200px;padding-top: 50px;padding-bottom: 50px;">
        @if(count($products) > 0)
        <table border = "1" style="width:100%;text-align: center;">
            <tr style="font-weight: bold;" >
                <td>Product Id</td>
                <td>Product </td>

                <td>Price</td>
                <td>Description</td>
                <td>Quantity</td>
                <td>Colour</td>
                <td>Category Name</td>
                <td></td>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td></br>{{ $product->productName }}</br><img src="{{asset('imageProduct/'.$product->productImage )}}" border="1" width="200px" height="200px"></br></br></td>
                @if($product->promotionPrice == null)
                <td>RM {{ $product->productPrice }}</td>
                @else
                <td style="color:red;">RM {{ $product->promotionPrice }}</td>
                @endif
                <td>{{ $product->productDetail }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->colour }}</td>
                <td>{{ $product->categoryName }}</td>
                <?php
                if (session()->has('custId')) {
                    ?> 
                    <td>
                        <form action="{{route('addToCart')}}" method="POST"> 
                            @csrf
                            <input type="hidden" name="productId" id="productId" value="{{$product->id}}">
                            <div class="text-center py-3">
                                <button type="submit" name="addToCart" class="btn btn-warning mx-2">Add To Cart</button>
                            </div>
                        </form>
                    </td>
                    <?php
                } else {
                    ?>
                    <td>                       
                        <div class="text-center py-3">
                            <button type="submit" name="addToCart" class="btn btn-warning mx-2">Add To Cart</button>
                        </div>
                    </td>
                <?php } ?>
            </tr>
            @endforeach

        </table>
        @else

        <h2>No result found!</h2>
        @endif
    </div>
</body>
@endsection