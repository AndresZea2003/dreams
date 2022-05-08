<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->default('images/products/defaultFile.jpeg')->nullable();
            $table->string('name', 100);
            $table->tinyText('description');
            $table->integer('price');
            $table->unsignedInteger('available');
            $table->timestamp('disabled_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
