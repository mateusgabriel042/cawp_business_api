<?php

namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogWebhook extends Model
{
    use HasFactory, Uuid;

    protected $connection = 'tenant';
    
    protected $table = 'logs_webhook';
    
    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'value',
    ];
}
