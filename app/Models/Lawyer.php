<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    use HasFactory;

    protected $table = 'lawyers';

    protected $fillable = [
        'fname', 'lname', 'gender', 'nic', 'contact', 'address', 'email', 'password', 'created_by', 'updated_by'
    ];
}
