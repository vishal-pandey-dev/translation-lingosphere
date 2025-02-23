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
            $table->string('name');
            $table->string('added_by')->default('admin');
            $table->foreignId('user_id')->constrained();
            $table->string('subscription')->nullable();
            $table->foreignId('category_id')->constrained();
            $table->text('photos')->nullable();
            $table->string('thumbnail_img')->nullable();
            $table->string('video_provider')->nullable();
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->double('unit_price', 14, 2);
            $table->double('purchase_price', 18, 2)->default(0);
            $table->boolean('variant_product')->default(false);
            $table->text('attributes')->nullable();
            $table->text('choice_options')->nullable();
            $table->text('colors')->nullable();
            $table->integer('current_stock')->default(0);
            $table->string('unit')->nullable();
            $table->string('shipping_type')->nullable();
            $table->double('shipping_cost', 8, 2)->default(0);
            $table->integer('num_of_sale')->default(0);
            $table->string('slug');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
