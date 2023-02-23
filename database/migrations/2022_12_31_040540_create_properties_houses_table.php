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
            $table->string('title', 255);
            $table->string('street', 255);
            $table->string('number', 6)->nullable();
            $table->string('neighborhood', 255);
            $table->text('complement')->nullable();
            $table->string('zipcode', 9);
            $table->integer('city_id');
            $table->string('city', 150);
            $table->integer('state_id');
            $table->string('state', 150);
            $table->integer('installments_max')->default(1);//prestações maxima
            $table->bigInteger('price');
            $table->bigInteger('iptu_price');
            $table->bigInteger('condominium_price');
            $table->boolean('condominium_price_include')->default(0);
            $table->boolean('condominium_iptu_include')->default(0);
            $table->integer('area');
            $table->enum('type_residence', ['condominio', 'vila', 'casa', 'chacara', 'quarto', 'kitnet', 'terreno']); // sale = venda; rent = aluguel
            $table->enum('type_payment', ['venda', 'aluguel']); // sale = venda; rent = aluguel
            $table->mediumText('link_google_maps')->nullable();
            $table->integer('quantity_pool')->default(0);//piscina
            $table->integer('quantity_bedroom')->default(0);//quartos
            $table->integer('quantity_bathrooms')->default(0);//banheiros
            $table->integer('quantity_suites')->default(0);//suites
            $table->integer('quantity_garage')->default(0);
            $table->boolean('contain_view_from_sea')->default(0);//vista pro mar
            $table->boolean('contain_furnished')->default(0);//mobiliada
            $table->boolean('contain_laundry')->default(0);//lavanderia
            $table->boolean('contain_backyard')->default(0);//quintal
            $table->boolean('contain_air_conditioner')->default(0);//arcondicionado
            $table->string('phone_number', 24)->nullable();
            $table->string('cellphone_number', 24);
            $table->string('facebook', 250)->nullable();
            $table->string('instagram', 250)->nullable();
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
        Schema::connection('cawptech_properties')->dropIfExists('houses');
    }
};
