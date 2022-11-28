<?php
/**
 * @author Sim Hui Ming
 */
?>
@extends('layouts.masterPageStaff')

@section('content2')
<?php
require_once('../resources/views/Staff/StaffXSLTTransformation.php');
$staff = new StaffXSLTTransformation("../resources/views/Staff/Staff.xml", "../resources/views/Staff/Staff.xsl");
?>
<div class="text-center mt-5 pt-5 mb-5 ">
    <h2> </h2>
</div>
@endsection