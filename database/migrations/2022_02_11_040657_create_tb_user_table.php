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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('password');
            $table->integer('id_sub_sektor');
            $table->string('business_category');
            $table->string('logo_business');
            $table->string('description');
            $table->string('owner_name');
            $table->string('nik');
            $table->string('address');
            $table->string('kecamatan');
            $table->string('website');
            $table->string('social_media');
            $table->string('business_legal');
            $table->string('nib');
            $table->string('siup');
            $table->string('haki');
            $table->string('income');
            $table->string('complaints');
            $table->string('solutions');
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
        Schema::dropIfExists('tb_user');
    }
};
