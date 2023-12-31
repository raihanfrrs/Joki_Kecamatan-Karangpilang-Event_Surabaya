<?php

use App\Models\Admin;
use App\Models\RukunWarga;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestMusbangkelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_musbangkels', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Admin::class)->nullable();
            $table->foreignIdFor(RukunWarga::class);
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('request_type');
            $table->string('size')->nullable();
            $table->string('amount')->nullable();
            $table->string('location');
            $table->string('photo')->nullable();
            $table->string('video')->nullable();
            $table->enum('status', ['terima', 'proses', 'tolak', 'selesai'])->default('proses');
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_musbangkels');
    }
}
