<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableFilesGmoXid extends Migration
{
    public $tableName = 'files';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->string('gmo_seller_xid')->nullable()->default(null);
            $table->string('gmo_buyer_xid')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dropColumn('gmo_seller_xid');
            $table->dropColumn('gmo_buyer_xid');
        });
    }
}
