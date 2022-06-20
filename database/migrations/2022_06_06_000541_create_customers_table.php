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
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('cell_phone', 30);
            $table->string('cpf', 14)->nullable();
            $table->enum('sex', ['M', 'F']);
            $table->string('nationality', 150);
            $table->string('address_zipcode', 10);
            $table->string('address_country', 150);
            $table->string('address_state', 150);
            $table->string('address_city', 150);
            $table->string('address_neighborhood', 150);
            $table->string('address_street', 150);
            $table->string('address_number', 6);
            $table->string('address_reference', 250)->nullable();

            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('customers');
    }
};
