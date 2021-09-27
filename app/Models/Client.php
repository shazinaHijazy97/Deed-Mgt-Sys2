<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'fname', 'lname', 'gender', 'nic', 'contact', 'address', 'email', 'password'
    ];

}
