<?php

use App\Models\User;
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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('name');
            $table->string('fname')->after('id');
            $table->string('lname')->after('fname');
            $table->string('phone')->after('email');
            $table->enum('status', User::STATUS);
            $table->enum('gender', User::GENDER);
            $table->string('image')->after('status')->nullable();
            $table->timestamp('deleted_at')->after('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('status');
            $table->dropColumn('image');
            $table->dropColumn('deleted_at');
            $table->dropColumn('fname');
            $table->dropColumn('lname');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->string('name');
        });
    }
};
