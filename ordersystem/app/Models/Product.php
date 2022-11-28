<?php
//Author : Wai Hau Guan
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    public $timestamps = false;
    protected $table = "products";
    protected $fillable = [
        'productName',
        'productPrice',
        'promotionPrice',
        'productDetail',
        'quantity',
        'datePublish',
        'productImage',
        'colour',
        'categoryName'
    ];

}
