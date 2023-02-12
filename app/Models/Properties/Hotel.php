<?php

namespace App\Models\Properties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Hotel extends Model
{
    use HasFactory, Uuid;

    protected $connection = 'cawptech_properties';

    protected $table = 'hotels';

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
		'quantity_pool',
		'quantity_playground',
		'quantity_bedroom',
		'quantity_single_beds',
		'quantity_couple_beds',
		'quantity_bathrooms',
		'quantity_suites',
		'quantity_garage',
		'contain_laundry',
		'contain_view_from_sea',
		'contain_backyard',
		'contain_air_conditioner',
		'check_in',
		'check_out',
		'phone_number',
		'cellphone_number',
		'facebook',
		'instagram',
		'youtube',
		'description',
    ];
}
