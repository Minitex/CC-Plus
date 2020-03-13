<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportfields', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('report_id');
            $table->string('legend');
            $table->string('filter_by')->nullable();
            $table->boolean('is_alertable')->default(0);
            $table->timestamps();

            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metrics');
    }
}
