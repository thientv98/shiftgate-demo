<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandTransportationFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_transportation_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('from_prefecture_id')->nullable();
            $table->unsignedInteger('to_prefecture_id')->nullable();
            $table->unsignedInteger('fee')->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('from_prefecture_id')
                ->references('id')->on('prefectures')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('to_prefecture_id')
                ->references('id')->on('prefectures')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_transportation_fees');
    }
}
