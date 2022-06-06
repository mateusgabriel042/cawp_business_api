<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Customer extends Model
{
    use HasFactory, Uuid;

    protected $table = 'customers';

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
		'cell_phone',
		'cpf',
		'sex',
		'nationality',
		'address_zipcode',
		'address_country',
		'address_state',
		'address_city',
		'address_neighborhood',
		'address_street',
		'address_number',
		'address_reference',
		'user_id',
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
