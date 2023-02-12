<?php

namespace App\Models\Properties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class House extends Model
{
    use HasFactory, Uuid;

    protected $connection = 'cawptech_properties';

    protected $table = 'houses';

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
		'price',
		'iptu_price',
		'condominium_price',
		'condominium_price_include',
		'condominium_iptu_include',
		'type_residence',
		'type_payment',
		'installments_max',
		'link_google_maps',
		'quantity_pool',
		'quantity_bedroom',
		'quantity_bathrooms',
		'quantity_suites',
		'quantity_garage',
		'contain_view_from_sea',
		'contain_furnished',
		'contain_laundry',
		'contain_backyard',
		'contain_air_conditioner',
		'phone_number',
		'cellphone_number',
		'facebook',
		'instagram',
		'description',
    ];

}
