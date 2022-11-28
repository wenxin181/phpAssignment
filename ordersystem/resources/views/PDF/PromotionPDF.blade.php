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
                <th>Promotion ID</th>
                <th>Promotion Rate (%)</th>
                <th>Promotion Description</th>
            </tr>
            @foreach($promotions as $promotion)
            <tr>
                <td>{{ $promotion->id }}</td>
                <td>{{ $promotion->promotion_id }}</td>
                <td>{{ $promotion->promotionRate }}</td>
                <td>{{ $promotion->promotionDescription }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>