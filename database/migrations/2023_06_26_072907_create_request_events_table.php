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
            $table->string('name');
            $table->string('event');
            $table->string('slug');
            $table->date('date_start');
            $table->date('date_done');
            $table->string('location');
            $table->string('phone');
            $table->string('proposal');
            $table->string('surat_permohonan');
            $table->enum('status', ['terima', 'proses', 'tolak', 'selesai']);
            $table->enum('status_proposal', ['terima', 'proses', 'tolak']);
            $table->enum('status_permohonan', ['terima', 'proses', 'tolak']);
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
