<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableFile extends Migration
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
            $table->enum('type', ['other', 'estimate', 'contract_seller', 'contract_buyer'])->default('other')->comment('other:その他, estimate:見積り, contract_seller:売り主契約書, contract_buyer:買い主契約書');
            $table->tinyInteger('is_use_estimate')->nullable()->default(0);
            $table->tinyInteger('is_signature_contract')->nullable()->default(0)->comment('0:未署名, 1:署名済み');
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
            $table->dropColumn('type');
            $table->dropColumn('is_use_estimate');
            $table->dropColumn('is_signature_contract');
        });
    }
}
