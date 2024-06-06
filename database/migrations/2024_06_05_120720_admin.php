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
        //
        Schema::create('Admins', function (Blueprint $table) {
            $table->id();
            $table->string('Admin_Id');
            $table->string('Admin_Name');
            $table->string('Admin_Surname');
            $table->string('Admin_Phone');
            $table->string('Admin_Password');
            $table->string('Admin_Email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->string('Admin_Type');
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
        //
    }
};
