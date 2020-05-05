<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'contacts';

    /**
     * Run the migrations.
     * @table contacts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('admin_id');
            $table->enum('target', ['seller', 'buyer', 'other'])->comment('\'seller:売り主, buyer:買い主, other:その他');
            $table->text('content');

            $table->index(["car_id"], 'car_id');

            $table->index(["admin_id"], 'admin_id');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('car_id')
                ->references('id')->on('cars')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('admin_id')
                ->references('id')->on('admins')
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
