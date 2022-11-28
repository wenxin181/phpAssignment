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
                <th>No.</th>
                <th>Order ID</th>
                <th>Product ID</th>
                <th>Order Quantity</th>
                <th>Unit Price</th>
                <th>Sub Total</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->orderDetailsId}}</td>
                <td>{{ $order->orderId }}</td>
                <td>{{ $order->productId }}</td>
                <td>{{ $order->orderQuantity }}</td>
                <td>{{ $order->unitPrice }}</td>
                <td>{{ $order->subTotal }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>