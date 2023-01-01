<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('cawptech_properties')->create('houses', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('street', 255);
            $table->string('number', 6)->nullable();
            $table->string('neighborhood', 255);
            $table->text('complement')->nullable();
            $table->string('zipcode', 14);
            $table->integer('city_id');
            $table->string('city', 150);
            $table->integer('state_id');
            $table->string('state', 150);
            $table->bigInteger('price');
            $table->bigInteger('iptu_price');
            $table->bigInteger('condominium_price');
            $table->boolean('condominium_price_include');//mobiliada
            $table->boolean('condominium_iptu_include');//mobiliada
            $table->enum('type_residence', ['condominium', 'village', 'house']); // sale = venda; rent = aluguel
            $table->enum('type_payment', ['sale', 'rent']); // sale = venda; rent = aluguel
            $table->integer('installments_max');//prestações maxima
            $table->mediumText('link_google_maps');
            $table->integer('quantity_pool');//piscina
            $table->integer('quantity_bedroom');//quartos
            $table->integer('quantity_bathrooms');//banheiros
            $table->integer('quantity_suites');//suites
            $table->integer('quantity_garage');
            $table->boolean('contain_view_from_sea');//vista pro mar
            $table->boolean('contain_furnished');//mobiliada
            $table->boolean('contain_laundry');//lavanderia
            $table->boolean('contain_backyard');//quintal
            $table->boolean('contain_air_conditioner');//arcondicionado
            $table->mediumText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
};
