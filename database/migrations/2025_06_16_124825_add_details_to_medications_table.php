<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('medications', function (Blueprint $table) {
            $table->string('code')->nullable()->after('description');
            $table->date('arrival_date')->nullable()->after('code');
            $table->date('expiration_date')->nullable()->after('arrival_date');
        });
    }

    public function down(): void
    {
        Schema::table('medications', function (Blueprint $table) {
            $table->dropColumn(['code', 'arrival_date', 'expiration_date']);
        });
    }
};
