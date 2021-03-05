<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cluster_id')->references('id')->on('clusters');
            $table->unsignedBigInteger('dealer_id')->references('id')->on('dealers');
            $table->string('xl_outlet_id', 50)->unique();
            $table->string('msisdn', 15)->unique();
            $table->string('type');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('micro_cluster');
            $table->string('image_url')->nullable();
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
        Schema::dropIfExists('outletss');
    }
}
