<?php
    use App\Models\Car;
?>

<table>
    <thead>
        <tr>
            <th>顧客ID</th>
            <th>公開状態</th>
            <th>公開日時</th>
            <th>取引状態</th>
            <th>契約状態</th>
            <th>納車状態</th>
            <th>取引完了状態</th>
            <th>取引No</th>
            <th>ディーラー紹介コード</th>
            <th>取引メモ</th>
            <th>買い主ID</th>
            <th>最終価格</th>
            <th>コーティング_フラグ</th>
            <th>コーティング</th>
            <th>フィルム_フラグ</th>
            <th>フィルム</th>
            <th>保証継承_フラグ</th>
            <th>保証継承</th>
            <th>電装品_フラグ</th>
            <th>電装品</th>
            <th>シフトゲート保証_フラグ</th>
            <th>シフトゲート保証</th>
            <th>その他_フラグ</th>
            <th>その他</th>
            <th>輸送料</th>
            <th>取得税</th>
            <th>支払い方法</th>
            <th>売り主サイン</th>
            <th>買い主サイン</th>
            <th>登録ID</th>
            <th>登録日時</th>
            <th>メーカー</th>
            <th>車名</th>
            <th>グレード</th>
            <th>型式指定番号</th>
            <th>類別区分番号</th>
            <th>登録番号</th>
            <th>初度登録</th>
            <th>車検満了日</th>
            <th>認定型式</th>
            <th>車台番号</th>
            <th>原動機の型式</th>
            <th>ドア数</th>
            <th>定員</th>
            <th>ハンドル位置</th>
            <th>エンジン位置</th>
            <th>燃料</th>
            <th>排気量</th>
            <th>駆動</th>
            <th>シフトタイプ</th>
            <th>シフト位置</th>
            <th>シフト段数</th>
            <th>最大積載量</th>
            <th>リサイクル券</th>
            <th>リサイクル券金額</th>
            <th>リサイクル券番号</th>
            <th>エアバッグ類料金</th>
            <th>フロン類（エアコン）料金</th>
            <th>シュレッダーダスト料金</th>
            <th>情報管理料金</th>
            <th>オドメーター交換歴</th>
            <th>┗交換記録簿</th>
            <th>保証書</th>
            <th>整備記録簿</th>
            <th>取扱説明書_車両説明書</th>
            <th>取扱説明書_オーディオ</th>
            <th>取扱説明書</th>
            <th>取扱説明書_その他</th>
            <th>本革シート</th>
            <th>テレビ</th>
            <th>カーナビ</th>
            <th>カメラ_フロント</th>
            <th>カメラ_サイド</th>
            <th>カメラ_バック</th>
            <th>スペアキー</th>
            <th>ETC</th>
            <th>サンルーフ</th>
            <th>アルミホイール</th>
            <th>ホイールサイズ</th>
            <th>装着タイヤ</th>
            <th>タイヤ溝（フロント右）</th>
            <th>タイヤ溝（フロント左）</th>
            <th>タイヤ溝（リア右）</th>
            <th>タイヤ溝（リア左）</th>
            <th>色コード</th>
            <th>色名称</th>
            <th>外装色</th>
            <th>内装色</th>
            <th>元色（色替え時）</th>
            <th>走行距離</th>
            <th>タバコ臭</th>
            <th>ペット臭</th>
            <th>その他の臭い</th>
            <th>ダッシュボードの状態（浮き、ひび割れ）</th>
            <th>ハンドルの状態（汚れ・擦れ）</th>
            <th>シートの状態（汚れ、破れ、焦げ、擦れ）</th>
            <th>ルーフ（室内天井）</th>
            <th>修復歴</th>
            <th>┗内容</th>
            <th>┗内容（備考）</th>
            <th>モデル年式</th>
            <th>掲載金額</th>
            <th>システム使用料</th>
            <th>手取り金額</th>
            <th>手放し時期</th>
            <th>総合評価点</th>
            <th>外装評価点</th>
            <th>内装評価点</th>
            <th>クイックプライシング金額</th>
            <th>クイックプライシング金額From</th>
            <th>クイックプライシング金額To</th>
            <th>長さ</th>
            <th>幅</th>
            <th>高さ</th>
            <th>車両重量</th>
            <th>車両総重量</th>
            <th>前前軸重</th>
            <th>前後軸重</th>
            <th>後前軸重</th>
            <th>後後軸重</th>
            <th>盗難情報</th>
            <th>抵当・嘱託</th>
            <th>車両装着カメラ_360°</th>
            <th>手放し時期詳細</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
        <tr>
            <td>{{ $car->customer ? $car->customer->id : '' }}</td>
            <td>{{ $car->status ? $car->status->name : '' }}</td>
            <td>{{ $car->published_date ? date('Y/m/d', strtotime($car->published_date)) : '' }}</td>
            <td>{{ $car->is_in_transaction }}</td>
            <td>{{ $car->is_in_contract }}</td>
            <td>{{ $car->is_car_delivery_complete }}</td>
            <td>{{ $car->is_trading_complete }}</td>
            <td>{{ $car->trading_no }}</td>
            <td>{{ $car->dealer_introduction_code }}</td>
            <td>{{ $car->trading_memo }}</td>
            <td>{{ $car->customerBuyer ? $car->customerBuyer->id : '' }}</td>
            <td>{{ $car->total_vehicle_price }}</td>
            <td>{{ $car->is_coating }}</td>
            <td>{{ $car->coating_fee }}</td>
            <td>{{ $car->is_film }}</td>
            <td>{{ $car->film_fee }}</td>
            <td>{{ $car->is_warranty_inheritance }}</td>
            <td>{{ $car->warranty_inheritance_fee }}</td>
            <td>{{ $car->is_electric_components }}</td>
            <td>{{ $car->electric_components_fee }}</td>
            <td>{{ $car->is_shift_gate_warranty }}</td>
            <td>{{ $car->shift_gate_warranty_fee }}</td>
            <td>{{ $car->is_other }}</td>
            <td>{{ $car->other_fee }}</td>
            <td>{{ $car->transport_fee }}</td>
            <td>{{ $car->acquisition_tax }}</td>
            <td>{{ $car->payment_methods }}</td>
            <td>{{ $car->seller_signature }}</td>
            <td>{{ $car->buyer_signature }}</td>
            <td>{{ $car->create_id }}</td>
            <td>{{ $car->create_date ? date('Y/m/d', strtotime($car->create_date)) : '' }}</td>
            <td>{{ $car->maker_name }}</td>
            <td>{{ $car->car_name }}</td>
            <td>{{ $car->grade_name }}</td>
            <td>{{ $car->model_num }}</td>
            <td>{{ $car->category_num }}</td>
            <td>{{ $car->car_num }}</td>
            <td>{{ $car->first_registration_date ? date('Y/m/d', strtotime($car->first_registration_date)) : '' }}</td>
            <td>{{ $car->inspection_date ? date('Y/m/d', strtotime($car->inspection_date)) : '' }}</td>
            <td>{{ $car->model_official }}</td>
            <td>{{ $car->chassis_num }}</td>
            <td>{{ $car->engine_model }}</td>
            <td>{{ $car->door_count }}</td>
            <td>{{ $car->seating_capacity }}</td>
            <td>{{ $car->steering_place_code ? Car::steering_place_code($car->steering_place_code) : '' }}</td>
            <td>{{ $car->engine_place_code ? Car::engine_place_code($car->engine_place_code) : '' }}</td>
            <td>{{ $car->engine_fuel_code ? Car::engine_fuel_code($car->engine_fuel_code) : '' }}</td>
            <td>{{ $car->engine_displacement }}</td>
            <td>{{ $car->drive_shaft_code ? Car::drive_shaft_code($car->drive_shaft_code) : '' }}</td>
            <td>{{ $car->transmission_type_code ? Car::transmission_type_code($car->transmission_type_code) : '' }}</td>
            <td>{{ $car->transmission_place_code ? Car::transmission_place_code($car->transmission_place_code) : '' }}</td>
            <td>{{ $car->transmission_count_code ? Car::transmission_count_code($car->transmission_count_code) : '' }}</td>
            <td>{{ $car->max_load }}</td>
            <td>{{ $car->recycle_ticket_code ? Car::recycle_ticket_code($car->recycle_ticket_code) : '' }}</td>
            <td>{{ $car->recycle_price }}</td>
            <td>{{ $car->recycle_no }}</td>
            <td>{{ $car->recycle_airbag_price }}</td>
            <td>{{ $car->recycle_freon_price }}</td>
            <td>{{ $car->recycle_shredder_price }}</td>
            <td>{{ $car->recycle_information_management_price }}</td>
            <td>{{ $car->meter_condition_code ? Car::meter_condition_code($car->meter_condition_code) : '' }}</td>
            <td>{{ $car->meter_record_note_code ? Car::meter_record_note_code($car->meter_record_note_code) : '' }}</td>
            <td>{{ $car->warranty_code ? Car::warranty_code($car->warranty_code) : '' }}</td>
            <td>{{ $car->record_note_code ? Car::record_note_code($car->record_note_code) : '' }}</td>
            <td>{{ $car->instruction_car_code ? Car::instruction_car_code($car->instruction_car_code) : '' }}</td>
            <td>{{ $car->instruction_audio_code ? Car::instruction_audio_code($car->instruction_audio_code) : '' }}</td>
            <td>{{ $car->instruction_navi_code ? Car::instruction_navi_code($car->instruction_navi_code) : '' }}</td>
            <td>{{ $car->instruction_other_code ? Car::instruction_other_code($car->instruction_other_code) : '' }}</td>
            <td>{{ $car->leather_seat_code ? Car::leather_seat_code($car->leather_seat_code) : '' }}</td>
            <td>{{ $car->tv_code ? Car::tv_code($car->tv_code) : '' }}</td>
            <td>{{ $car->navi_code ? Car::navi_code($car->navi_code) : '' }}</td>
            <td>{{ $car->camera_front_code ? Car::camera_front_code($car->camera_front_code) : '' }}</td>
            <td>{{ $car->camera_side_code ? Car::camera_side_code($car->camera_side_code) : '' }}</td>
            <td>{{ $car->camera_rear_code ? Car::camera_rear_code($car->camera_rear_code) : '' }}</td>
            <td>{{ $car->spare_key }}</td>
            <td>{{ $car->etc_code ? Car::etc_code($car->etc_code) : '' }}</td>
            <td>{{ $car->sunroof_code ? Car::sunroof_code($car->sunroof_code) : '' }}</td>
            <td>{{ $car->aluminum_wheel_code ? Car::aluminum_wheel_code($car->aluminum_wheel_code) : '' }}</td>
            <td>{{ $car->wheel_size_code ? Car::wheel_size_code($car->wheel_size_code) : '' }}</td>
            <td>{{ $car->tire_code ? Car::tire_code($car->tire_code) : '' }}</td>
            <td>{{ $car->tire_groove_front_right }}</td>
            <td>{{ $car->tire_groove_front_left }}</td>
            <td>{{ $car->tire_groove_rear_right }}</td>
            <td>{{ $car->tire_groove_rear_left }}</td>
            <td>{{ $car->color_name_code }}</td>
            <td>{{ $car->color_name }}</td>
            <td>{{ $car->color_category_code ? Car::color_category_code($car->color_category_code) : '' }}</td>
            <td>{{ $car->color_interior_code ? Car::color_interior_code($car->color_interior_code) : '' }}</td>
            <td>{{ $car->color_original_code ? Car::color_original_code($car->color_original_code) : '' }}</td>
            <td>{{ $car->mileage }}</td>
            <td>{{ $car->smell_tobacco_code ? Car::smell_tobacco_code($car->smell_tobacco_code) : '' }}</td>
            <td>{{ $car->smell_pet_code ? Car::smell_pet_code($car->smell_pet_code) : '' }}</td>
            <td>{{ $car->smell_other_code ? Car::smell_other_code($car->smell_other_code) : '' }}</td>
            <td>{{ $car->damage_dashboard_code ? Car::damage_dashboard_code($car->damage_dashboard_code) : '' }}</td>
            <td>{{ $car->damage_steering_code ? Car::damage_steering_code($car->damage_steering_code) : '' }}</td>
            <td>{{ $car->damage_seat_code ? Car::damage_seat_code($car->damage_seat_code) : '' }}</td>
            <td>{{ $car->damage_roof_code ? Car::damage_roof_code($car->damage_roof_code) : ''}}</td>
            <td>{{ $car->repair_history_code ? Car::repair_history_code($car->repair_history_code) : '' }}</td>
            <td>{{ $car->repair_code ? Car::repair_code($car->repair_code) : '' }}</td>
            <td>{{ $car->repair_note }}</td>
            <td>{{ $car->model_year }}</td>
            <td>{{ $car->total_price }}</td>
            <td>{{ $car->system_usage_fee }}</td>
            <td>{{ $car->income_price }}</td>
            <td>{{ $car->sell_time_code ? Car::sell_time_code($car->sell_time_code) : '' }}</td>
            <td>{{ $car->value_total_code ? Car::value_total_code($car->value_total_code) : '' }}</td>
            <td>{{ $car->value_exterior_code ? Car::value_exterior_code($car->value_exterior_code) : '' }}</td>
            <td>{{ $car->value_interior_code ? Car::value_interior_code($car->value_interior_code) : '' }}</td>
            <td>{{ $car->quick_price }}</td>
            <td>{{ $car->quick_price_from }}</td>
            <td>{{ $car->quick_price_to }}</td>
            <td>{{ $car->length }}</td>
            <td>{{ $car->width }}</td>
            <td>{{ $car->height }}</td>
            <td>{{ $car->weight }}</td>
            <td>{{ $car->total_weight }}</td>
            <td>{{ $car->axile_weight_f_f }}</td>
            <td>{{ $car->axile_weight_f_r }}</td>
            <td>{{ $car->axile_weight_r_f }}</td>
            <td>{{ $car->axile_weight_r_r }}</td>
            <td>{{ $car->theft_date ? date('Y/m/d', strtotime($car->theft_date)) : '' }}</td>
            <td>{{ $car->mortgage ? Car::mortgage($car->mortgage) : '' }}</td>
            <td>{{ $car->camera_around_view_code ? Car::camera_around_view_code($car->camera_around_view_code) : '' }}</td>
            <td>{{ $car->sell_time }}</td>
        </tr>
    @endforeach
    </tbody>
</table>