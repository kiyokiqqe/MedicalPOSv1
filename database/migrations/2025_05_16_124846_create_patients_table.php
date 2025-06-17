<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->date('birth_date');
    $table->enum('gender', ['male', 'female', 'other'])->nullable();
    $table->string('phone')->nullable();
    $table->timestamps();
});
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
