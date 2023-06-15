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
        Schema::create('paper_trades', function (Blueprint $table) {
            $table->id();
            $table->string('pair_name');
            $table->bigInteger('user_id');
            $table->string('entry');
            $table->string('entry_time');
            $table->string('exit')->nullable();
            $table->string('exit_time')->nullable();
            $table->enum('status',['open','closed','deleted'])->default('open');
            $table->string('profit')->nullable();
            $table->string('profit_percentage')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paper_trades');
    }
};
