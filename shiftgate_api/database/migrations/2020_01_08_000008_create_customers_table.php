<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'customers';

    /**
     * Run the migrations.
     * @table customers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->enum('type', ['C', 'D'])->comment('C:顧客, D:ディーラー');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('last_name_kana');
            $table->string('first_name_kana');
            $table->string('email')->comment('is_deleted == 0 unique');
            $table->string('password');
            $table->date('birthdate');
            $table->string('zipcode', 7)->nullable()->default(null);
            $table->unsignedInteger('prefecture_id')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('mobile_phone_number', 11)->nullable()->default(null);
            $table->string('fixed_phone_number', 11)->nullable()->default(null);
            $table->tinyInteger('is_deleted')->nullable()->default(null);

            $table->index(["prefecture_id"], 'prefecture_id');

            $table->unique(["email"], 'email');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('prefecture_id', 'prefecture_id')
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
       Schema::dropIfExists($this->tableName);
     }
}
