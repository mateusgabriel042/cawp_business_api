<?php

namespace App\Models\Properties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Vehicle extends Model
{
    use HasFactory, Uuid;

    protected $connection = 'cawptech_properties';

    protected $table = 'vehicles';

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'title',
		'street',
		'number',
		'neighborhood',
		'complement',
		'zipcode',
		'city_id',
		'city',
		'state_id',
		'state',
		'daily_price',
		'installments_max',
		'link_google_maps',
		'brand',
		'year_veicle',
		'type_veicle',
		'check_in',
		'check_out',
		'phone_number',
		'cellphone_number',
		'facebook',
		'instagram',
		'description',
		'views',
		'likes',
    ];

}
