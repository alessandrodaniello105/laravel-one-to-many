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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('image', 255)->after('description')->nullable();
            $table->string('image_original_name', 255)->after('image')->nullable();

            $table->unsignedBigInteger('type_id')->after('id')->nullable();
            $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('image_original_name');

            $table->dropForeign('type_id');
            $table->dropColumn('type_id');
        });
    }
};
