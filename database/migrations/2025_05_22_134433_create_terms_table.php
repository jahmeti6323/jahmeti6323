<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('pacijent_id');
            $table->unsignedBigInteger('doktor_id');
            $table->unsignedBigInteger('usluga_id');

            $table->timestamp('vreme');

            $table->timestamps();

           
            $table->foreign('pacijent_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('doktor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->foreign('usluga_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};
