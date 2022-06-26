<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $connection = 'main_cawptech_business';
    
    protected $fillable = [
        'id',
        'name',
        'host',
        'port',
        'database_name',
        'username',
        'password'
    ];
}
