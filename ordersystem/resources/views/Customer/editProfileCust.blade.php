<?php
/**
 * @author Sim Hui Ming
 */
?>
@extends('layouts.masterPageProfileCust')

@section('content2')

<div class="text-center py-4">
    <h2>Edit Profile</h2>
</div>

<div class="container">
    <div class="row mb-2">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form method="POST" action="{{route('editProfileCust')}}">
                @csrf

                <table style="width:100%;height:350px;" >
                    <tr> 
                        <td style="width:50%!important;text-align: right;"><label for="custName">Name</label></td>
                        <td style="width:10%!important;text-align: center;">:</td>
                        <td style="width:40%!important;text-align: left;"> <input type="text"  name="custName" id="custName" size="30" value="{{$customers->custName}}" /></td></br>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="custEmail">Email</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"> <input type="text" name="custEmail" id="custEmail" size="30" value="{{$customers->custEmail}}" /></td>
                    </tr>

                    <tr>
                        <td style="text-align: right;"><label for="custPhone">Phone</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"> <input type="text" name="custPhone" id="custPhone" size="30" value="{{$customers->custPhone}}" /></td>
                    </tr>

                    <tr>
                        <td style="text-align: right;"><label for="custEmail">Email</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"> <input type="text" name="custEmail" id="custEmail" size="30" value="{{$customers->custEmail}}" /></td>
                    </tr>

                    <tr>
                        <td style="text-align: right;"><label for="custAddress">Address</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"> <textarea type="text" rows="4" name="custAddress" id="custAddress" style="width: 70%" />{{$customers->custAddress}}</textarea></td>
                    </tr>

                </table>
        </div>
        <div class="text-center py-3">
            <button type="submit" name="modifyProfile" value="modifyProfile" class="btn btn-warning mx-2">Update</button>
        </div>
    </div>
</form>




</div>
<div class="col-sm-4">
</div>
</div>
</div>
@endsection