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
        Schema::table('anonimus', function (Blueprint $table) {
            // 1️⃣ Crea la colonna user_id come unsignedBigInteger e nullable
            $table->unsignedBigInteger('user_id')->nullable()->after('updated_at');

            // 2️⃣ Aggiungi la foreign key
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
       }

    /**
     * Reverse the migrations.
     */
        public function down(): void
    {
        Schema::table('anonimus', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
    };
   

