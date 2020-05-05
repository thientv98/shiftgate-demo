<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrowsingHistoriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'browsing_histories';

    /**
     * Run the migrations.
     * @table browsing_histories
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('car_id');

            $table->index(["customer_id"], 'customer_id');

            $table->index(["car_id"], 'car_id');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('car_id', 'car_id')
                ->references('id')->on('cars')
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
       Schema::dropIfExists($this->tableName);
     }
}
