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
        Schema::create('stores', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('cnpj', 30)->nullable();
            $table->string('address_zipcode', 10);
            $table->string('address_country', 150);
            $table->string('address_state', 150);
            $table->string('address_city', 150);
            $table->string('address_neighborhood', 150);
            $table->string('address_street', 150);
            $table->string('address_number', 6);
            $table->string('address_reference', 250)->nullable();
            $table->integer('address_map_zoom')->nullable();
            $table->double('address_map_lat')->nullable();
            $table->double('address_map_long')->nullable();            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
