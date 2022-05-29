<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;

    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'fname', 'lname', 'gender', 'nic', 'contact', 'address', 'email', 'password'
    ];

}
