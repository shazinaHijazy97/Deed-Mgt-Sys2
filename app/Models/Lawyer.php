<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Lawyer extends Authenticatable
{
    use Notifiable;

    use HasFactory;

    protected $guarded = [];

    protected $table = 'lawyers';

    protected $fillable = [
        'fname', 'lname', 'gender', 'nic', 'practicing_area', 'contact', 'address', 'email', 'password', 'created_by', 'updated_by'
    ];
}
