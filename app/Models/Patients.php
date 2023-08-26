<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{

    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'patients';

    public function prescriptions(){
        return $this->hasMany(Prescriptions::class);
    }

    use HasFactory;
}
