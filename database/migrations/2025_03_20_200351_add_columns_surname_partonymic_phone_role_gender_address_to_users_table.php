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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name')->nullable();
            $table->string('patronymic')->nullable()->after('surname')->nullable();
            $table->smallInteger('age')->nullable()->after('patronymic')->nullable();
            $table->unsignedSmallInteger('gender')->after('age');
            $table->string('phone')->nullable()->after('gender');
            $table->string('address')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('patronymic');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('address');
        });
    }
};
