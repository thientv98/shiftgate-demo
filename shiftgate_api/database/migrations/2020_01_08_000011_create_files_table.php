<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'files';

    /**
     * Run the migrations.
     * @table files
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('car_id');
            $table->string('image_name');
            $table->string('image_path');
            $table->tinyInteger('is_delete_ban')->default('0');

            $table->index(["car_id"], 'car_id');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('car_id')
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
