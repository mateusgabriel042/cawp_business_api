<?php

namespace App\Models\Properties;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Utensil extends Model
{
    use HasFactory, Uuid;

    protected $connection = 'cawptech_properties';

    protected $table = 'utensils';

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
		'object',
		'check_in',
		'check_out',
		'phone_number',
		'cellphone_number',
		'facebook',
		'instagram',
		'description',
    ];

}
