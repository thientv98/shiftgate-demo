<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableCar extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cars';
    
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function __construct()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }
    public function up()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            // add
            $table->tinyInteger('camera_around_view_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->text('sell_time')->nullable();
            
            //delete
            $table->dropColumn('model_called');
            $table->dropColumn('note_book_code');
            $table->dropColumn('tire_rear_code');
            $table->dropColumn('tire_groove_spare');
            $table->dropColumn('import_type_code');
            $table->dropColumn('note');
            $table->dropColumn('ownership_code');
            $table->dropColumn('usage_code');
            $table->dropColumn('owner_count_code');
            $table->dropColumn('image_comment1');
            $table->dropColumn('image_comment2');
            $table->dropColumn('image_comment3');
            $table->dropColumn('image_comment4');
            $table->dropColumn('image_comment5');
            $table->dropColumn('image_comment6');
            $table->dropColumn('image_comment7');
            $table->dropColumn('image_comment8');
            $table->dropColumn('image_comment9');
            $table->dropColumn('image_comment10');
            $table->dropColumn('image_comment11');
            $table->dropColumn('image_comment12');
            $table->dropColumn('image_comment13');
            $table->dropColumn('image_comment14');
            $table->dropColumn('image_comment15');
            $table->dropColumn('image_comment16');
            $table->dropColumn('image_comment17');
            $table->dropColumn('image_comment18');
            $table->dropColumn('image_comment19');
            $table->dropColumn('image_comment20');
            $table->dropColumn('image_comment21');
            $table->dropColumn('image_comment22');
            $table->dropColumn('image_comment23');
            $table->dropColumn('image_comment24');
            $table->dropColumn('image_comment25');

           
            $table->dropColumn('meter_condition_code');
            $table->dropColumn('navi_code');
            $table->dropColumn('aluminum_wheel_code');
            $table->dropColumn('smell_tobacco_code');
            $table->dropColumn('smell_pet_code');
            $table->dropColumn('smell_other_code');
            $table->dropColumn('damage_dashboard_code');
            $table->dropColumn('damage_steering_code');
            $table->dropColumn('damage_seat_code');
            $table->dropColumn('damage_roof_code');
            $table->dropColumn('sell_time_code');

        });
        Schema::table($this->tableName, function (Blueprint $table) {
            // edit
            $table->tinyInteger('meter_condition_code')->nullable()->default(null)->comment('0：なし、1：あり、２：不明')->after('recycle_information_management_price');
            $table->tinyInteger('navi_code')->nullable()->default(null)->comment('1：なし,2：ディーラーOP,3：メーカーOP,4：その他')->after('tv_code');
            $table->tinyInteger('aluminum_wheel_code')->nullable()->default(null)->comment('1：なし,2：純正,3：その他')->after('sunroof_code');
            $table->tinyInteger('smell_tobacco_code')->nullable()->default(null)->comment('0：なし,1：あり')->after('mileage');
            $table->tinyInteger('smell_pet_code')->nullable()->default(null)->comment('0：なし,1：あり')->after('smell_tobacco_code');
            $table->tinyInteger('smell_other_code')->nullable()->default(null)->comment('0：なし,1：あり')->after('smell_pet_code');
            $table->tinyInteger('damage_dashboard_code')->nullable()->default(null)->comment('0：なし,1：あり')->after('smell_other_code');
            $table->tinyInteger('damage_steering_code')->nullable()->default(null)->comment('0：なし,1：あり')->after('damage_dashboard_code');
            $table->tinyInteger('damage_seat_code')->nullable()->default(null)->comment('0：なし,1：あり')->after('damage_steering_code');
            $table->tinyInteger('damage_roof_code')->nullable()->default(null)->comment('0：なし,1：汚れ,2：垂れ,3：剥がれ')->after('damage_seat_code');
            $table->tinyInteger('sell_time_code')->nullable()->default(null)->comment('1：今すぐ,2：2週間以内,3：一か月以内')->after('income_price');
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
            $table->dropColumn(['camera_around_view_code']);
            $table->dropColumn(['sell_time']);

            $table->string('model_called')->nullable()->default(null);
            $table->tinyInteger('note_book_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('tire_rear_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->float('tire_groove_spare',3,1)->nullable()->default(null)->comment('mm（ミリメートル）');
            $table->tinyInteger('import_type_code')->nullable()->default(null)->comment('1：新車ディーラー車,2：新車並行,3：中古ディーラー車,4：中古並行');
            $table->text('note')->nullable()->default(null);
            $table->tinyInteger('ownership_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('usage_code')->nullable()->default(null)->comment('1：自家用,2：レンタカー,3：事業用');
            $table->tinyInteger('owner_count_code')->nullable()->default(null)->comment('1：1人,2：2人以上');
            $table->text('image_comment1')->nullable()->default(null);
            $table->text('image_comment2')->nullable()->default(null);
            $table->text('image_comment3')->nullable()->default(null);
            $table->text('image_comment4')->nullable()->default(null);
            $table->text('image_comment5')->nullable()->default(null);
            $table->text('image_comment6')->nullable()->default(null);
            $table->text('image_comment7')->nullable()->default(null);
            $table->text('image_comment8')->nullable()->default(null);
            $table->text('image_comment9')->nullable()->default(null);
            $table->text('image_comment10')->nullable()->default(null);
            $table->text('image_comment11')->nullable()->default(null);
            $table->text('image_comment12')->nullable()->default(null);
            $table->text('image_comment13')->nullable()->default(null);
            $table->text('image_comment14')->nullable()->default(null);
            $table->text('image_comment15')->nullable()->default(null);
            $table->text('image_comment16')->nullable()->default(null);
            $table->text('image_comment17')->nullable()->default(null);
            $table->text('image_comment18')->nullable()->default(null);
            $table->text('image_comment19')->nullable()->default(null);
            $table->text('image_comment20')->nullable()->default(null);
            $table->text('image_comment21')->nullable()->default(null);
            $table->text('image_comment22')->nullable()->default(null);
            $table->text('image_comment23')->nullable()->default(null);
            $table->text('image_comment24')->nullable()->default(null);
            $table->text('image_comment25')->nullable()->default(null);

            $table->dropColumn('meter_condition_code');
            $table->dropColumn('navi_code');
            $table->dropColumn('aluminum_wheel_code');
            $table->dropColumn('smell_tobacco_code');
            $table->dropColumn('smell_pet_code');
            $table->dropColumn('smell_other_code');
            $table->dropColumn('damage_dashboard_code');
            $table->dropColumn('damage_steering_code');
            $table->dropColumn('damage_seat_code');
            $table->dropColumn('damage_roof_code');
            $table->dropColumn('sell_time_code');
        });
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->tinyInteger('meter_condition_code')->nullable()->default(null)->comment('1：正常,2：改ざん,3：交換,4：不明,5：セットアップ交換')->after('recycle_information_management_price');
            $table->tinyInteger('navi_code')->nullable()->default(null)->comment('1：なし,2：純正（ディーラーOP）,3：純正（メーカーOP）,4：社外')->after('tv_code');
            $table->tinyInteger('aluminum_wheel_code')->nullable()->default(null)->comment('1：なし,2：純正,3：社外')->after('sunroof_code');
            $table->tinyInteger('smell_tobacco_code')->nullable()->default(null)->comment('1：なし,2：あり,3：強い')->after('mileage');
            $table->tinyInteger('smell_pet_code')->nullable()->default(null)->comment('1：なし,2：あり,3：強い')->after('smell_tobacco_code');
            $table->tinyInteger('smell_other_code')->nullable()->default(null)->comment('1：なし,2：あり,3：強い')->after('smell_pet_code');
            $table->tinyInteger('damage_dashboard_code')->nullable()->default(null)->comment('1：なし,2：あり,3：目立つ,4：大きく変形')->after('smell_other_code');
            $table->tinyInteger('damage_steering_code')->nullable()->default(null)->comment('1：なし,2：あり,3：目立つ,4：破れがある')->after('damage_dashboard_code');
            $table->tinyInteger('damage_seat_code')->nullable()->default(null)->comment('1：なし,2：あり,3：目立つ,4：修復不可能')->after('damage_steering_code');
            $table->tinyInteger('damage_roof_code')->nullable()->default(null)->comment('1：なし,2：あり,3：目立つ,4：垂れ,剥がれあり')->after('damage_seat_code');
            $table->tinyInteger('sell_time_code')->nullable()->default(null)->comment('1：今すぐ,2：2週間以内,3：一か月以内,4：半年以内,5：その他')->after('income_price');
        });
    }
}
