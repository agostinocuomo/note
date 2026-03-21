<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('messages', function (Blueprint $table) {
            if (!Schema::hasColumn('messages', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable();
            }
            if (!Schema::hasColumn('messages', 'pos_x')) {
                $table->integer('pos_x')->default(0);
            }
            if (!Schema::hasColumn('messages', 'pos_y')) {
                $table->integer('pos_y')->default(0);
            }
        });
    }

    public function down(): void {
        Schema::table('messages', function (Blueprint $table) {
            if (Schema::hasColumn('messages', 'user_id')) {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('messages', 'pos_x')) {
                $table->dropColumn('pos_x');
            }
            if (Schema::hasColumn('messages', 'pos_y')) {
                $table->dropColumn('pos_y');
            }
        });
    }
};