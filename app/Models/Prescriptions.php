<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescriptions extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'prescriptions';
    // protected $casts = [
    //     'created_at' => 'datetime:m-d-Y',
    // ];
    // protected $dates = ['added_at'];

    public function patients(){
        return $this->belongsTo(Patients::class);
    }

    use HasFactory;
}
