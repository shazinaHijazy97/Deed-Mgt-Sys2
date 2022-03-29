<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCase extends Model
{
    use HasFactory;
    protected $table = 'cases';
    protected $fillable = [
        'client_id', 'title', 'case_type', 'lawyer_id', 'filed_date', 'note',
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
