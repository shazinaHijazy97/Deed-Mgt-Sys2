<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeedRequests extends Model
{
    use HasFactory;

    protected $table = 'deed_requests';

    protected $fillable = [
        'client_id', 'deed_no', 'deed_type', 'request_date', 'payment_status', 'note', 'created_by', 'updated_by'
    ];
}
