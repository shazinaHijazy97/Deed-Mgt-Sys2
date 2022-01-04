<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'nic', 'date_in', 'time_in'
    ];

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class,'nic','nic');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class,'nic','nic');
    }
}
