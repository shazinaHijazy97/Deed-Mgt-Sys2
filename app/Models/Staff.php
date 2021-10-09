<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    
    protected $fillable = [
        'fname', 'lname', 'gender', 'nic', 'contact', 'address', 'email', 'created_by', 'updated_by'
    ];
}
