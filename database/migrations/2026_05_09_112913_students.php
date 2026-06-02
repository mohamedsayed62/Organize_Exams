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
  Schema::create('students', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('group_id');
    $table->integer('done_exam');
  });
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    //
}
};
