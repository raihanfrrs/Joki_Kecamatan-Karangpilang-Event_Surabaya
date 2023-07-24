<?php

use App\Models\Admin;
use App\Models\RukunWarga;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Admin::class)->nullable();
            $table->foreignIdFor(RukunWarga::class);
            $table->string('event')->unique();
            $table->string('slug');
            $table->date('date_start');
            $table->date('date_done');
            $table->text('location');
            $table->string('phone');
            $table->string('proposal');
            $table->string('surat_permohonan');
            $table->string('photo')->nullable();
            $table->string('video')->nullable();
            $table->text('feedback')->nullable();
            $table->enum('status', ['terima', 'proses', 'tolak', 'selesai'])->default('proses');
            $table->enum('status_proposal', ['terima', 'proses', 'tolak'])->default('proses');
            $table->enum('status_permohonan', ['terima', 'proses', 'tolak'])->default('proses');
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
        Schema::dropIfExists('request_events');
    }
}
