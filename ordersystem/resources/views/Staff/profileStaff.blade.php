<?php
/**
 * @author Sim Hui Ming
 */
?>
@extends('layouts.masterPageProfileStaff')

@section('content2')
<style>
    input.staffPosition{
        pointer-events:none;
        opacity:0.5;
    }
</style>
<div class="text-center py-4">
    <h2>My Profile</h2>
</div>

<div class="container">
    <div class="row mb-2">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">


            @if(isset($staff))
            <table style="width:100%;height:350px;">
                @if(count($staff) > 0)
                @foreach($staff as $s)

                <tr> 
                    <td style="width:50%!important;text-align: right;"><label for="staffName">Name</label></td>
                    <td style="width:10%!important;text-align: center;">:</td>
                    <td style="width:40%!important;text-align: left;"> <input type="text"  name="staffName" id="staffName" size="30" value="{{$s->staffName}}" disabled/></td></br>
                </tr>
                <tr>
                    <td style="text-align: right;"><label for="staffEmail">Email</label></td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"> <input type="text" name="staffEmail" id="staffEmail" size="30" value="{{$s->staffEmail}}" disabled/></td>
                </tr>

                <tr>
                    <td style="text-align: right;"><label for="staffPosition">Position</label></td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"> 
                        <input type="radio"  id="staffPosition" name="staffPosition" class="staffPosition" value="Admin" {{ ($s->staffPosition=="Admin")? "checked" : "" }} >Admin</label></br>
                        <input type="radio"  id="staffPosition" name="staffPosition" class="staffPosition"value="Store Manager" {{ ($s->staffPosition=="Store Manager")? "checked" : "" }} >Store Manager</label></br>
                        <input type="radio"  id="staffPosition" name="staffPosition" class="staffPosition"value="Inventory Control Specialist" {{ ($s->staffPosition=="Inventory Control Specialist")? "checked" : "" }} >Inventory Control Specialist</label></br>

                </tr>

                @endforeach
                @endif
            </table>

            @endif

            <!--                <form method="POST"  action="{{url('/Customer/profileCust')}}">
                                @csrf-->
            <div class="text-center py-3">
                <button type="submit" onclick="location.href ='{{route('editProfileStaff')}}'" class="btn btn-warning mx-2">Edit Profile</button>

            </div>
            <!--            </form>-->


        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div>
@endsection