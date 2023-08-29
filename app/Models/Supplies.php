<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'supplies';

    use HasFactory;
}
