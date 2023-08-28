<?php

namespace App\Models;

use Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon as SupportCarbon;

class Prescriptions extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $table = 'prescriptions';
    // protected $casts = [
    //     'created_at' => 'datetime:m-d-Y',
    // ];
    // protected $dateFormat = 'm/d/Y H:i:s';
//     public function getUpdatedAtAttribute($date)
//     {
//     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d-Y H:i:s');
//    }

//    public function setUpdatedAtAttribute($date)
//   {
//     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d-Y H:i:s');
//   }

    protected $touches = ['patients'];

    public function patients(){
        return $this->belongsTo(Patients::class);
    }

    use HasFactory;
}
