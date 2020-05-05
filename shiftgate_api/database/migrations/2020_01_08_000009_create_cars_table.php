<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'cars';

    /**
     * Run the migrations.
     * @table cars
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->string('public_status_code', 50)->nullable()->default('101');
            $table->date('published_date')->nullable()->default(null);
            $table->tinyInteger('is_in_transaction')->nullable()->default('0')->comment('0,1');
            $table->tinyInteger('is_in_contract')->nullable()->default('0')->comment('0,1');
            $table->tinyInteger('is_car_delivery_complete')->nullable()->default('0')->comment('0,1');
            $table->tinyInteger('is_trading_complete')->nullable()->default('0')->comment('0,1');
            $table->string('trading_no')->nullable()->default(null);
            $table->string('dealer_introduction_code')->nullable()->default(null);
            $table->text('trading_memo')->nullable()->default(null);
            $table->unsignedInteger('buyer_id')->nullable()->default(null);
            $table->integer('total_vehicle_price')->nullable()->default('0');
            $table->tinyInteger('is_coating')->nullable()->default('0');
            $table->integer('coating_fee')->nullable()->default('0');
            $table->tinyInteger('is_film')->nullable()->default('0');
            $table->integer('film_fee')->nullable()->default('0');
            $table->tinyInteger('is_warranty_inheritance')->nullable()->default('0');
            $table->integer('warranty_inheritance_fee')->nullable()->default('0');
            $table->tinyInteger('is_electric_components')->nullable()->default('0');
            $table->integer('electric_components_fee')->nullable()->default('0');
            $table->tinyInteger('is_shift_gate_warranty')->nullable()->default('0');
            $table->integer('shift_gate_warranty_fee')->nullable()->default('0');
            $table->tinyInteger('is_other')->nullable()->default('0');
            $table->integer('other_fee')->nullable()->default('0');
            $table->integer('transport_fee')->nullable()->default('0');
            $table->integer('acquisition_tax')->nullable()->default('0');
            $table->enum('payment_methods', ['cash', 'installments'])->nullable()->default(null)->comment('cash : 現金, installments : 分割');
            $table->string('seller_signature')->nullable()->default(null);
            $table->string('buyer_signature')->nullable()->default(null);
            $table->integer('create_id')->nullable()->default(null);
            $table->dateTime('create_date')->nullable()->default(null);
            $table->string('maker_name')->nullable()->default(null);
            $table->string('car_name')->nullable()->default(null);
            $table->string('grade_name')->nullable()->default(null);
            $table->string('model_num')->nullable()->default(null);
            $table->string('category_num')->nullable()->default(null);
            $table->string('car_num')->nullable()->default(null);
            $table->date('first_registration_date')->nullable()->default(null);
            $table->date('inspection_date')->nullable()->default(null);
            $table->string('model_official')->nullable()->default(null);
            $table->string('chassis_num')->nullable()->default(null);
            $table->string('model_called')->nullable()->default(null);
            $table->string('engine_model')->nullable()->default(null);
            $table->integer('door_count')->nullable()->default(null);
            $table->integer('seating_capacity')->nullable()->default(null);
            $table->tinyInteger('steering_place_code')->nullable()->default(null)->comment('1：左,2：右');
            $table->tinyInteger('engine_place_code')->nullable()->default(null)->comment('1：前,2：後,3：中央');
            $table->tinyInteger('engine_fuel_code')->nullable()->default(null)->comment('1：CNG,2：ディーゼル,3：EV,4：ガソリン,5：ハイブリッド,6：LPG,7：その他');
            $table->integer('engine_displacement')->nullable()->default(null);
            $table->tinyInteger('drive_shaft_code')->nullable()->default(null)->comment('1：前,2：後,3：四駆');
            $table->tinyInteger('transmission_type_code')->nullable()->default(null)->comment('1：AT,2：MT,3：CVT');
            $table->tinyInteger('transmission_place_code')->nullable()->default(null)->comment('1：コラム,2：ダッシュ,3：フロア');
            $table->tinyInteger('transmission_count_code')->nullable()->default(null)->comment('1：無段,2：2,3：3,4：4,5：5,6：6,7：7,8：8');
            $table->integer('max_load')->nullable()->default(null);
            $table->tinyInteger('recycle_ticket_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->integer('recycle_price')->nullable()->default(null);
            $table->string('recycle_no')->nullable()->default(null)->comment('リサイクル券情報が取得できた場合のみ設定されます');
            $table->integer('recycle_airbag_price')->nullable()->default(null)->comment('リサイクル券情報が取得できた場合のみ設定されます');
            $table->integer('recycle_freon_price')->nullable()->default(null)->comment('リサイクル券情報が取得できた場合のみ設定されます');
            $table->integer('recycle_shredder_price')->nullable()->default(null)->comment('リサイクル券情報が取得できた場合のみ設定されます');
            $table->integer('recycle_information_management_price')->nullable()->default(null)->comment('リサイクル券情報が取得できた場合のみ設定されます');
            $table->tinyInteger('meter_condition_code')->nullable()->default(null)->comment('1：正常,2：改ざん,3：交換,4：不明,5：セットアップ交換');
            $table->tinyInteger('meter_record_note_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('warranty_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('record_note_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('note_book_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('instruction_car_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('instruction_audio_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('instruction_navi_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('instruction_other_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('leather_seat_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('tv_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('navi_code')->nullable()->default(null)->comment('1：なし,2：純正（ディーラーOP）,3：純正（メーカーOP）,4：社外');
            $table->tinyInteger('camera_front_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('camera_side_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('camera_rear_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('spare_key')->nullable()->default(null)->comment('本数');
            $table->tinyInteger('etc_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('sunroof_code')->nullable()->default(null)->comment('1：なし,2：シングル,3：ツイン,4：トリプル');
            $table->tinyInteger('aluminum_wheel_code')->nullable()->default(null)->comment('1：なし,2：純正,3：社外');
            $table->tinyInteger('wheel_size_code')->nullable()->default(null)->comment('1：標準,2：インチ不明,3：12インチ,4：13インチ,5：14インチ,6：15インチ,7：16インチ,8：17インチ,9：18インチ,10：19インチ,11：20インチ,12：21インチ,13：22インチ,14：23インチ,15：24インチ,');
            $table->tinyInteger('tire_code')->nullable()->default(null)->comment('1：夏,2：冬');
            $table->tinyInteger('tire_rear_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->float('tire_groove_front_right',3,1)->nullable()->default(null)->comment('mm（ミリメートル）');
            $table->float('tire_groove_front_left',3,1)->nullable()->default(null)->comment('mm（ミリメートル）');
            $table->float('tire_groove_rear_right',3,1)->nullable()->default(null)->comment('mm（ミリメートル）');
            $table->float('tire_groove_rear_left',3,1)->nullable()->default(null)->comment('mm（ミリメートル）');
            $table->float('tire_groove_spare',3,1)->nullable()->default(null)->comment('mm（ミリメートル）');
            $table->string('color_name_code')->nullable()->default(null);
            $table->string('color_name')->nullable()->default(null);
            $table->tinyInteger('color_category_code')->nullable()->default(null)->comment('1：シロ,2：Ｐホワイト,3：ベージュ,4：シルバー,5：グレー,6：ガンメタ,7：クロ,8：ピンク,9：ムラサキ,10：Ｗレッド,11：アカ,12：キイロ,13：オレンジ,14：ゴールド,15：チャイロ,16：ミズイロ,17：アオ,18：コン,19：グリーン,21：ソノタ,');
            $table->tinyInteger('color_interior_code')->nullable()->default(null)->comment('1：シロ,2：Ｐホワイト,3：ベージュ,4：シルバー,5：グレー,6：ガンメタ,7：クロ,8：ピンク,9：ムラサキ,10：Ｗレッド,11：アカ,12：キイロ,13：オレンジ,14：ゴールド,15：チャイロ,16：ミズイロ,17：アオ,18：コン,19：グリーン,');
            $table->tinyInteger('color_original_code')->nullable()->default(null)->comment('1：シロ,2：Ｐホワイト,3：ベージュ,4：シルバー,5：グレー,6：ガンメタ,7：クロ,8：ピンク,9：ムラサキ,10：Ｗレッド,11：アカ,12：キイロ,13：オレンジ,14：ゴールド,15：チャイロ,16：ミズイロ,17：アオ,18：コン,19：グリーン,21：ソノタ,');
            $table->integer('mileage')->nullable()->default(null);
            $table->tinyInteger('smell_tobacco_code')->nullable()->default(null)->comment('1：なし,2：あり,3：強い');
            $table->tinyInteger('smell_pet_code')->nullable()->default(null)->comment('1：なし,2：あり,3：強い');
            $table->tinyInteger('smell_other_code')->nullable()->default(null)->comment('1：なし,2：あり,3：強い');
            $table->tinyInteger('damage_dashboard_code')->nullable()->default(null)->comment('1：なし,2：あり,3：目立つ,4：大きく変形');
            $table->tinyInteger('damage_steering_code')->nullable()->default(null)->comment('1：なし,2：あり,3：目立つ,4：破れがある');
            $table->tinyInteger('damage_seat_code')->nullable()->default(null)->comment('1：なし,2：あり,3：目立つ,4：修復不可能');
            $table->tinyInteger('damage_roof_code')->nullable()->default(null)->comment('1：なし,2：あり,3：目立つ,4：垂れ,剥がれあり');
            $table->tinyInteger('repair_history_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('repair_code')->nullable()->default(null)->comment('1：雹害,2：水害,3：その他災害,4：事故,5：その他');
            $table->text('repair_note')->nullable()->default(null);
            $table->integer('model_year')->nullable()->default(null);
            $table->tinyInteger('import_type_code')->nullable()->default(null)->comment('1：新車ディーラー車,2：新車並行,3：中古ディーラー車,4：中古並行');
            $table->text('note')->nullable()->default(null);
            $table->tinyInteger('ownership_code')->nullable()->default(null)->comment('0：なし,1：あり');
            $table->tinyInteger('usage_code')->nullable()->default(null)->comment('1：自家用,2：レンタカー,3：事業用');
            $table->integer('total_price')->nullable()->default(null);
            $table->integer('system_usage_fee')->nullable()->default(null);
            $table->integer('income_price')->nullable()->default(null);
            $table->tinyInteger('owner_count_code')->nullable()->default(null)->comment('1：1人,2：2人以上');
            $table->tinyInteger('sell_time_code')->nullable()->default(null)->comment('1：今すぐ,2：2週間以内,3：一か月以内,4：半年以内,5：その他');
            $table->mediumText('image1')->nullable()->default(null);
            $table->mediumText('image2')->nullable()->default(null);
            $table->mediumText('image3')->nullable()->default(null);
            $table->mediumText('image4')->nullable()->default(null);
            $table->mediumText('image5')->nullable()->default(null);
            $table->mediumText('image6')->nullable()->default(null);
            $table->mediumText('image7')->nullable()->default(null);
            $table->mediumText('image8')->nullable()->default(null);
            $table->mediumText('image9')->nullable()->default(null);
            $table->mediumText('image10')->nullable()->default(null);
            $table->mediumText('image11')->nullable()->default(null);
            $table->mediumText('image12')->nullable()->default(null);
            $table->mediumText('image13')->nullable()->default(null);
            $table->mediumText('image14')->nullable()->default(null);
            $table->mediumText('image15')->nullable()->default(null);
            $table->mediumText('image16')->nullable()->default(null);
            $table->mediumText('image17')->nullable()->default(null);
            $table->mediumText('image18')->nullable()->default(null);
            $table->mediumText('image19')->nullable()->default(null);
            $table->mediumText('image20')->nullable()->default(null);
            $table->mediumText('image21')->nullable()->default(null);
            $table->mediumText('image22')->nullable()->default(null);
            $table->mediumText('image23')->nullable()->default(null);
            $table->mediumText('image24')->nullable()->default(null);
            $table->mediumText('image25')->nullable()->default(null);
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
            $table->mediumText('development_image')->nullable()->default(null)->comment('base64でエンコードしたものを送信する');
            $table->mediumText('inspection_image')->nullable()->default(null)->comment('base64でエンコードしたものを送信する');
            $table->mediumText('liability_insurance_image')->nullable()->default(null)->comment('base64でエンコードしたものを送信する');
            $table->tinyInteger('value_total_code')->nullable()->default(null)->comment('1：6,2：5,3：4.5,4：4,5：3.5,6：3');
            $table->tinyInteger('value_exterior_code')->nullable()->default(null)->comment('1：6,2：5,3：4.5,4：4,5：3.5,6：3');
            $table->tinyInteger('value_interior_code')->nullable()->default(null)->comment('1：A,2：B,3：C,4：D');
            $table->integer('quick_price')->nullable()->default(null);
            $table->integer('quick_price_from')->nullable()->default(null);
            $table->integer('quick_price_to')->nullable()->default(null);
            $table->integer('length')->nullable()->default(null);
            $table->integer('width')->nullable()->default(null);
            $table->integer('height')->nullable()->default(null);
            $table->integer('weight')->nullable()->default(null);
            $table->integer('total_weight')->nullable()->default(null);
            $table->integer('axile_weight_f_f')->nullable()->default(null);
            $table->integer('axile_weight_f_r')->nullable()->default(null);
            $table->integer('axile_weight_r_f')->nullable()->default(null);
            $table->integer('axile_weight_r_r')->nullable()->default(null);
            $table->date('theft_date')->nullable()->default(null)->comment('盗難情報がある場合のみ');
            $table->tinyInteger('mortgage')->nullable()->default(null)->comment('0：抵当なし,1：抵当あり');

            $table->index(["public_status_code"], 'public_status_code');

            $table->index(["customer_id"], 'customer_id');

            $table->index(["buyer_id"], 'buyer_id');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('customer_id', 'customer_id')
                ->references('id')->on('customers')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('public_status_code', 'public_status_code')
                ->references('code')->on('statuses')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('buyer_id', 'buyer_id')
                ->references('id')->on('customers')
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
