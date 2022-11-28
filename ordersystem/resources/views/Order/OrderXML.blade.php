<?php
/**
 * @author Soong Wen Xin
 */
?>
@extends('layouts.masterPageStaff')

@section('content2')
        <?php
        require_once('../resources/views/Order/OrderXSLTTransformation.php');
        $order = new OrderXSLTTransformation("../resources/views/Order/Order.xml", "../resources/views/Order/Order.xsl");
        ?>
@endsection