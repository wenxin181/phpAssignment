<?php
/**
 * @author Sim Hui Ming
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = "staff";
    public $timestamps = false;

    protected $fillable = [
        'staffName', 'staffEmail', 'staffPosition', 'staffPassword',
    ];
}
