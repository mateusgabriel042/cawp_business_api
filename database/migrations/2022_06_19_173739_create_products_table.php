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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name', 200);
            $table->string('product_supplier', 200);//fornecedor do produto
            $table->integer('count');
            $table->double('price');
            $table->integer('Weight')->nullable();//peso
            $table->date('date_fabrication');
            $table->date('date_validate');
            $table->string('code_ean', 200);
            $table->string('image', 200);
            $table->string('banner', 200);
            $table->mediumText('description')->nullable();
            $table->string('obs', 200)->nullable();
            $table->uuid('type_product_id');
            $table->foreign('type_product_id')->references('id')->on('types_product')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
