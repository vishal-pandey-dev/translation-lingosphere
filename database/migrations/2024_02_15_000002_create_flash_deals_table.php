<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashDealsTable extends Migration
{
    public function up()
    {
        Schema::create('flash_deals', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('start_date')->nullable();
            $table->integer('end_date')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('featured')->default(false);
            $table->string('background_color')->nullable();
            $table->string('text_color')->nullable();
            $table->string('banner')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flash_deals');
    }
}
