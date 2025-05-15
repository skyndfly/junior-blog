<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->after('name')->default(null);
        });

        // Заполняем slug (например, на основе name)
        DB::table('categories')->get()->each(function ($category) {
            DB::table('categories')
                ->where('id', $category->id)
                ->update(['slug' => \Illuminate\Support\Str::slug($category->name)]);
        });

        // Теперь добавляем unique
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
