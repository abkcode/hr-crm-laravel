<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn('gender');
        // });
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedSmallInteger('phone_code')->nullable()->change();
            $table->bigInteger('phone_number')->nullable()->change();
            $table->string('profile_pic')->nullable()->change();
            $table->enum('gender', ['male','female'])->nullable();
            $table->string('timezone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn('gender');
        // });
        // Schema::table('users', function (Blueprint $table) {
        //     $table->unsignedSmallInteger('phone_code')->change();
        //     $table->bigInteger('phone_number')->change();
        //     $table->string('profile_pic')->change();
        //     $table->enum('gender', ['male','female'])->change();
        //     $table->string('timezone')->change();
        // });
    }
}
