<?php
//Author : Sim Hui Ming
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgetPasswordCust extends Model
{
    use HasFactory;
    protected $table = "forget_password_custs";
    public $timestamps = false;

    protected $fillable = [
        'custEmail', 'token', 'expDate',
    ];
}
