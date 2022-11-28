<?php
/**
 * @author Sim Hui Ming
 */
?>
@extends('layouts.masterPageProfileStaff')

@section('content2')

<div class="text-center py-4">
    <h2>Edit Profile</h2>
</div>

<div class="container">
    <div class="row mb-2">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form method="POST" action="{{route('editProfileStaff')}}">
                @csrf

                <table style="width:100%;height:350px;" >
                    <tr> 
                        <td style="width:50%!important;text-align: right;"><label for="staffName">Name</label></td>
                        <td style="width:10%!important;text-align: center;">:</td>
                        <td style="width:40%!important;text-align: left;"> <input type="text"  name="staffName" id="staffName" size="30" value="{{$staff->staffName}}" /></td></br>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><label for="staffEmail">Email</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"> <input type="text" name="staffEmail" id="staffEmail" size="30" value="{{$staff->staffEmail}}" /></td>
                    </tr>

                    <tr>
                        <td style="text-align: right;"><label for="staffPosition">Position</label></td>
                        <td style="text-align: center;">:</td>
                        <td style="text-align: left;"> 
                             <input type="radio"  id="staffPosition" name="staffPosition" value="Admin" {{ ($staff->staffPosition=="Admin")? "checked" : "" }} >Admin</label></br>
                        <input type="radio"  id="staffPosition" name="staffPosition" value="Store Manager" {{ ($staff->staffPosition=="Store Manager")? "checked" : "" }} >Store Manager</label></br>
                        <input type="radio"  id="staffPosition" name="staffPosition" value="Inventory Control Specialist" {{ ($staff->staffPosition=="Inventory Control Specialist")? "checked" : "" }} >Inventory Control Specialist</label></br>
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