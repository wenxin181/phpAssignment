<?php
/**
 * @author Lee Jun Jie
 */
?>
@extends('layouts.masterPageStaff')

@section('content2')
<?php
require_once('../resources/views/Promotion/PromotionXSLTTransformation.php');
$promotions = new PromotionXSLTTransformation("../resources/views/Promotion/Promotion.xml", "../resources/views/Promotion/Promotion.xsl");
?>
<div class="text-center mt-5 pt-5 mb-5 ">
    <h2> </h2>
</div>
@endSection