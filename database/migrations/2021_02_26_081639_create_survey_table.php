<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cluster_id')->references('id')->on('clusters');
            $table->unsignedBigInteger('dealer_id')->references('id')->on('dealers');
            $table->unsignedBigInteger('outlet_id')->references('id')->on('outlets');
            $table->string('note')->nullable();
            $table->boolean('is_open')->default(true);
            $table->boolean('is_audited')->default(false);
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
        Schema::dropIfExists('survey');
    }
}
