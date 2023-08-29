<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{

    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'equipments';
    // // protected $casts = [
    // //     'date' => 'date:m/d/Y', // Change your format
    // ];

    use HasFactory;
}
