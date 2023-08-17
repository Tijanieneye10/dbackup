<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('backups', static function (Blueprint $table) {
            $table->id();
            $table->string('dbhost');
            $table->string('dbname');
            $table->string('dbuser');
            $table->string('dbpass')->nullable();
            $table->string('dbdriver');
            $table->string('dbfolder');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backups');
    }
};
