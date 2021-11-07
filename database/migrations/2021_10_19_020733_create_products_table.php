<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();

            $table->mediumText('shopt_description')->nullable();
            $table->longText('long_description')->nullable();

            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->decimal('price',12,2);
            $table->enum('status', ['ACTIVE', 'DEACTIVATED'])->default('ACTIVE');

            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('provider_id');

            $table->foreign('subcategory_id')->references('id')->on('sub_categories');
            $table->foreign('provider_id')->references('id')->on('providers');

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
        Schema::dropIfExists('products');
    }
}
