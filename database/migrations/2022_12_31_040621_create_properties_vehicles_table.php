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
        Schema::connection('cawptech_properties')->create('vehicles', function (Blueprint $table) {
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
            $table->bigInteger('daily_price');
            $table->integer('installments_max')->default(1);//prestações maxima
            $table->mediumText('link_google_maps')->nullable();
            $table->string('brand', 150);
            $table->integer('year_veicle');
            $table->string('type_veicle', 150);
            $table->string('check_in', 5);
            $table->string('check_out', 5);
            $table->string('phone_number', 24)->nullable();
            $table->string('cellphone_number', 24);
            $table->string('facebook', 250)->nullable();
            $table->string('instagram', 250)->nullable();
            $table->mediumText('description')->nullable();
            $table->bigInteger('views')->default(0);
            $table->bigInteger('likes')->default(0);
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
        Schema::connection('cawptech_properties')->dropIfExists('vehicles');
    }
};
