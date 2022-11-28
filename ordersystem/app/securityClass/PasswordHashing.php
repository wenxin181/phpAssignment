<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class PasswordHashing {

    public function update(Request $request) {
        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();
    }

    public function checkPassword(Request $request) {
        $pw=$request->get('password');
        $hashed = Hash::make($pw);
        if(Hash::check($request->password, $pw)){
            return true;
        }
    }

}
