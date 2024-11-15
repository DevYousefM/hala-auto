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
        Schema::create('branch_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('branch_id')->unsigned();
            $table->string('locale')->index();
            $table->string('branch_name');
            $table->string('branch_address');
            $table->string('branch_services');
            $table->unique(['branch_id', 'locale']);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_translations');
    }
};
