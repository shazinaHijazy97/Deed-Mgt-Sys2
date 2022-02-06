<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'notice_subject', 'notice_content', 'notice_date', 'notice_time', 'notice_type', 'recipient'
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
