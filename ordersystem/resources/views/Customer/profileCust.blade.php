<?php
/**
 * @author Sim Hui Ming
 */
?>
@extends('layouts.masterPageProfileCust')

@section('content2')

<div class="text-center py-4">
    <h2>My Profile</h2>
</div>

<div class="container">
    <div class="row mb-2">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">


            @if(isset($customers))
            <table style="width:100%;height:350px;">
                @if(count($customers) > 0)
                @foreach($customers as $c)
                <!--                    $id ={{$c->id}};-->

                <tr> 
                    <td style="width:50%!important;text-align: right;"><label for="custName">Name</label></td>
                    <td style="width:10%!important;text-align: center;">:</td>
                    <td style="width:40%!important;text-align: left;"> <input type="text"  name="custName" id="custName" size="30" value="{{$c->custName}}" disabled/></td></br>
                </tr>
                <tr>
                    <td style="text-align: right;"><label for="custEmail">Email</label></td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"> <input type="text" name="custEmail" id="custEmail" size="30" value="{{$c->custEmail}}" disabled/></td>
                </tr>

                <tr>
                    <td style="text-align: right;"><label for="custPhone">Phone</label></td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"> <input type="text" name="custPhone" id="custPhone" size="30" value="{{$c->custPhone}}" disabled/></td>
                </tr>

                <tr>
                    <td style="text-align: right;"><label for="custEmail">Email</label></td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"> <input type="text" name="custEmail" id="custEmail" size="30" value="{{$c->custEmail}}" disabled/></td>
                </tr>

                <tr>
                    <td style="text-align: right;"><label for="custAddress">Address</label></td>
                    <td style="text-align: center;">:</td>
                    <td style="text-align: left;"> <textarea type="text" rows="4" name="custAddress" id="custAddress" style="width: 70%" disabled />{{$c->custAddress}}</textarea></td>
                </tr>

                @endforeach
                @endif
            </table>

            @endif

            <!--                <form method="POST"  action="{{url('/Customer/profileCust')}}">
                                @csrf-->
            <div class="text-center py-3">
                <button type="submit" onclick="location.href ='{{route('editProfileCust')}}'" class="btn btn-warning mx-2">Edit Profile</button>

            </div>
            <!--            </form>-->


        </div>
        <div class="col-sm-4">
        </div>
    </div>
</div>
@endsection