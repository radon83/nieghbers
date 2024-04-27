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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('description_ar');
            $table->text('description_en');
            $table->integer('category_id');
            $table->enum('status',['Available','Pending','In use'])->default('Available');
            $table->integer('city_id');
            $table->integer('place_id');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('allow_time')->default(7);
            $table->float('fee')->unsigned();
            $table->json('images')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('items');
    }
};
