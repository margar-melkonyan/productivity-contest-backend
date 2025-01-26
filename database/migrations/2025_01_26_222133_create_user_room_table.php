<?php

declare(strict_types=1);

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
        Schema::create('user_room', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('room_id');
            $table->timestamp('join_at')->nullable();
            $table->timestamp('left_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_room');
    }
};
