<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';
    protected $fillable = [
        'item_name', 'item_category', 'quantity', 'service_date', 'manufacturer', 'manufacturer_contact', 'created_by', 'updated_by'
    ];
}
