<?php
//Author : Soong Wen Xin
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    use HasFactory;
    
    protected $table = "carts";
    public $timestamps = false;
    protected $fillable = ["productId","custId","cartQuantity"];

}
