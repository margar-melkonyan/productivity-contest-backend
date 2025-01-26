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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title', 1024);
            $table->bigInteger('author_id');
            $table->string('type', 128)->default('open')->comment(
                'Тип команты (открытй, закрытый, по приглашению)'
            );
            $table->smallInteger('max_count')->nullable()->comment(
                'Если NULL, то участников не ограничено'
            );
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
