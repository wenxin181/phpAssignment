<?php
/**
 * @author Lee Jun Jie
 */
?>
<!DOCTYPE html>
<html>
    <style>
        table, th, td{
            border:1px solid black;
        }
    </style>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>{{ $title }}</h1>
        <p>{{ $date }}</p>
        <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Product Date Publish</th>
                <th>Product Colour</th>
                <th>Product Category</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->productName }}</td>
                <td>RM{{ $product->productPrice }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->datePublish }}</td>
                <td>{{ $product->colour }}</td>
                <td>{{ $product->categoryName }}</td>
                
            </tr>
            @endforeach
        </table>
    </body>
</html>