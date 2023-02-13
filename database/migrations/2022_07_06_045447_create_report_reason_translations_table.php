<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_reason_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_reason_id');
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['report_reason_id', 'locale']);
            $table->foreign('report_reason_id')->references('id')->on('report_reasons')->onDelete('cascade');
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
        Schema::dropIfExists('report_reason_translations');
    }
};
