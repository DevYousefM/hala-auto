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
        Schema::create('terms_and_conditions_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('terms_and_conditions_id')->unsigned();
            $table->string('locale')->index();
            $table->longText('content')->nullable();
            $table->unique(['terms_and_conditions_id', 'locale']);
            $table->foreign('terms_and_conditions_id')->references('id')->on('terms_and_conditions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms_and_conditions_translations');
    }
};
