<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouse extends Model
{
    use HasFactory;
    protected $table='warehouse';
    protected $fillable=[
        'id_name','name','price','image'
    ];
}
