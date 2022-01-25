<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'lawyer_id', 'date', 'payment_type', 'amount', 'created_by', 'updatd_by'
    ];

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class,'lawyer_id','id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class,'client_id','id');
    }
}
