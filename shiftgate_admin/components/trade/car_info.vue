<template>
    <v-card flat>
        <v-container fluid>
            <v-card-text>
                <v-simple-table dense class="custom-table" fixed-header>
                    <template v-slot:default>
                        <thead>
                            <th class="py-0" colspan="4">車両情報</th>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in arrInfo" :key="index">
                                <td>{{ item.label }}</td>
                                <td>{{changeValue(tradeDetail[item.value],item.value)}}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-card-text>
        </v-container>
    </v-card>
</template>

<script>
import axios from 'axios'
import Util from '@/util';
import moment from "moment";

export default {
    name: 'car_info',
    props: ['tradeDetail'],
    data() {
        return {
            arrInfo: [
                {'label': 'メーカー', 'value':'maker_name'},
                {'label': '車名', 'value': 'car_name'},
                {'label': 'グレード', 'value': 'grade_name'},
                {'label': '型式指定番号', 'value': 'model_num'},
                {'label': '類別区分番号', 'value': 'category_num'},
                {'label': '登録番号', 'value': 'car_num'},
                {'label': '初度登録', 'value': 'first_registration_date'},
                {'label': '車検満了日', 'value': 'inspection_date'},
                {'label': '認定型式', 'value': 'model_official'},
                {'label': '車台番号', 'value': 'chassis_num'},
                {'label': '原動機の型式', 'value': 'engine_model'},
                {'label': 'ドア数', 'value': 'door_count'},
                {'label': '定員', 'value': 'seating_capacity'},
                {'label': 'ハンドル位置', 'value': 'steering_place_code'},
                {'label': 'エンジン位置', 'value': 'engine_place_code'},
                {'label': '燃料', 'value': 'engine_fuel_code'},
                {'label': '排気量', 'value': 'engine_displacement'},
                {'label': '駆動', 'value': 'drive_shaft_code'},
                {'label': 'シフトタイプ', 'value': 'transmission_type_code'},
                {'label': 'シフト位置', 'value': 'transmission_place_code'},
                {'label': 'シフト段数', 'value': 'transmission_count_code'},
                {'label': '最大積載量', 'value': 'max_load'},
                {'label': 'リサイクル券', 'value': 'recycle_ticket_code'},
                {'label': 'リサイクル券金額', 'value': 'recycle_price'},
                {'label': 'リサイクル券番号', 'value': 'recycle_no'},
                {'label': 'エアバッグ類料金', 'value': 'recycle_airbag_price'},
                {'label': 'フロン類（エアコン）料金', 'value': 'recycle_freon_price'},
                {'label': 'シュレッダーダスト料金', 'value': 'recycle_shredder_price'},
                {'label': '情報管理料金', 'value': 'recycle_information_management_price'},
                {'label': 'オドメーター交換歴', 'value': 'meter_condition_code'},
                {'label': '┗交換記録簿', 'value': 'meter_record_note_code'},
                {'label': '保証書', 'value': 'warranty_code'},
                {'label': '整備記録簿', 'value': 'record_note_code'},
                {'label': '取扱説明書_車両説明書', 'value': 'instruction_car_code'},
                {'label': '取扱説明書_オーディオ', 'value': 'instruction_audio_code'},
                {'label': '取扱説明書', 'value': 'instruction_navi_code'},
                {'label': '取扱説明書_その他', 'value': 'instruction_other_code'},
                {'label': '本革シート', 'value': 'leather_seat_code'},
                {'label': 'テレビ', 'value': 'tv_code'},
                {'label': 'カーナビ', 'value': 'navi_code'},
                {'label': 'カメラ_フロント', 'value': 'camera_front_code'},
                {'label': 'カメラ_サイド', 'value': 'camera_side_code'},
                {'label': 'カメラ_バック', 'value': 'camera_rear_code'},
                {'label': 'スペアキー', 'value': 'spare_key'},
                {'label': 'ETC', 'value': 'etc_code'},
                {'label': 'サンルーフ', 'value': 'sunroof_code'},
                {'label': 'アルミホイール', 'value': 'aluminum_wheel_code'},
                {'label': 'ホイールサイズ', 'value': 'wheel_size_code'},
                {'label': '装着タイヤ', 'value': 'tire_code'},
                {'label': 'タイヤ溝（フロント右）', 'value': 'tire_groove_front_right'},
                {'label': 'タイヤ溝（フロント左）', 'value': 'tire_groove_front_left'},
                {'label': 'タイヤ溝（リア右）', 'value': 'tire_groove_rear_right'},
                {'label': 'タイヤ溝（リア左）', 'value': 'tire_groove_rear_left'},
                {'label': '色コード', 'value': 'color_name_code'},
                {'label': '色名称', 'value': 'color_name'},
                {'label': '外装色', 'value': 'color_category_code'},
                {'label': '内装色', 'value': 'color_interior_code'},
                {'label': '元色（色替え時）', 'value': 'color_original_code'},
                {'label': '走行距離', 'value': 'mileage'},
                {'label': 'タバコ臭', 'value': 'smell_tobacco_code'},
                {'label': 'ペット臭', 'value': 'smell_pet_code'},
                {'label': 'その他の臭い', 'value': 'smell_other_code'},
                {'label': 'ダッシュボードの状態（浮き、ひび割れ）', 'value': 'damage_dashboard_code'},
                {'label': 'ハンドルの状態（汚れ・擦れ）', 'value': 'damage_steering_code'},
                {'label': 'シートの状態（汚れ、破れ、焦げ、擦れ）', 'value': 'damage_seat_code'},
                {'label': 'ルーフ（室内天井）', 'value': 'damage_roof_code'},
                {'label': '修復歴', 'value': 'repair_history_code'},
                {'label': '┗内容', 'value': 'repair_code'},
                {'label': '┗内容（備考）', 'value': 'repair_note'},
                {'label': 'モデル年式', 'value': 'model_year'},
                {'label': '掲載金額', 'value': 'total_price'},
                {'label': 'システム使用料', 'value': 'system_usage_fee'},
                {'label': '手取り金額', 'value': 'income_price'},
                {'label': '手放し時期', 'value': 'sell_time_code'},
                {'label': '総合評価点', 'value': 'value_total_code'},
                {'label': '外装評価点', 'value': 'value_exterior_code'},
                {'label': '内装評価点', 'value': 'value_interior_code'},
                {'label': 'クイックプライシング金額', 'value': 'quick_price'},
                {'label': 'クイックプライシング金額From', 'value': 'quick_price_from'},
                {'label': 'クイックプライシング金額To', 'value': 'quick_price_to'},
                {'label': '長さ', 'value': 'length'},
                {'label': '幅', 'value': 'width'},
                {'label': '高さ', 'value': 'height'},
                {'label': '車両重量', 'value': 'weight'},
                {'label': '車両総重量', 'value': 'total_weight'},
                {'label': '前前軸重', 'value': 'axile_weight_f_f'},
                {'label': '前後軸重', 'value': 'axile_weight_f_r'},
                {'label': '後前軸重', 'value': 'axile_weight_r_f'},
                {'label': '後後軸重', 'value': 'axile_weight_r_r'},
                {'label': '盗難情報', 'value': 'theft_date'},
                {'label': '抵当・嘱託', 'value': 'mortgage'},
                {'label': '車両装着カメラ_360°', 'value': 'camera_around_view_code'},
                {'label': '手放し時期詳細', 'value': 'sell_time'}

            ]
        }
    },

    methods: {
        changeValue(value, key) {
            if(value == 0) {
                if(['recycle_ticket_code','meter_record_note_code','warranty_code','record_note_code',
                    'instruction_car_code','instruction_audio_code','instruction_navi_code',
                    'instruction_other_code','leather_seat_code','tv_code','camera_front_code','camera_side_code',
                    'camera_rear_code','etc_code','repair_history_code','meter_condition_code', 'smell_tobacco_code',
                    'smell_pet_code','smell_other_code','damage_dashboard_code','damage_steering_code','damage_seat_code',
                    'damage_roof_code','camera_around_view_code'].indexOf(key) > -1) return 'なし';
                if(['mortgage'].indexOf(key) > -1) return '抵当なし';

            }
            if(value == 1) {
                if(['steering_place_code'].indexOf(key) > -1) return '左';
                if(['engine_place_code','drive_shaft_code'].indexOf(key) > -1) return '前';
                if(['engine_fuel_code'].indexOf(key) > -1) return 'CNG';
                if(['transmission_type_code'].indexOf(key) > -1) return 'AT';
                if(['transmission_place_code'].indexOf(key) > -1) return 'コラム';
                if(['transmission_count_code'].indexOf(key) > -1) return '無段';
                if(['recycle_ticket_code','meter_record_note_code','warranty_code','record_note_code',
                    'instruction_car_code','instruction_audio_code','instruction_navi_code',
                    'instruction_other_code','leather_seat_code','tv_code','camera_front_code','camera_side_code',
                    'camera_rear_code','etc_code','repair_history_code','meter_condition_code','smell_tobacco_code',
                    'smell_pet_code','smell_other_code','damage_dashboard_code','damage_steering_code','damage_roof_code',
                    'damage_seat_code','camera_around_view_code'].indexOf(key) > -1) return 'あり';
                if(['navi_code','sunroof_code','aluminum_wheel_code'].indexOf(key) > -1) return 'なし';
                if(['wheel_size_code'].indexOf(key) > -1) return '標準';
                if(['tire_code'].indexOf(key) > -1) return '夏';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'シロ';
                if(['repair_code'].indexOf(key) > -1) return '雹害';
                if(['sell_time_code'].indexOf(key) > -1) return '今すぐ';
                if(['value_total_code','value_exterior_code'].indexOf(key) > -1) return '6';
                if(['value_interior_code'].indexOf(key) > -1) return 'A';
                if(['mortgage'].indexOf(key) > -1) return '抵当あり';

            }

            if(value == 2) {
                if(['steering_place_code'].indexOf(key) > -1) return '右';
                if(['engine_place_code','drive_shaft_code'].indexOf(key) > -1) return '後';
                if(['engine_fuel_code'].indexOf(key) > -1) return 'ディーゼル';
                if(['transmission_type_code'].indexOf(key) > -1) return 'MT';
                if(['transmission_place_code'].indexOf(key) > -1) return 'ダッシュ';
                if(['transmission_count_code'].indexOf(key) > -1) return '2';
                if(['meter_condition_code'].indexOf(key) > -1) return '不明';
                if(['navi_code'].indexOf(key) > -1) return '純正（ディーラーOP）';
                if(['sunroof_code'].indexOf(key) > -1) return 'シングル';
                if(['aluminum_wheel_code'].indexOf(key) > -1) return '純正';
                if(['wheel_size_code'].indexOf(key) > -1) return 'インチ不明';
                if(['tire_code'].indexOf(key) > -1) return '冬';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'Ｐホワイト';
                if(['damage_roof_code'].indexOf(key) > -1) return '垂れ';
                if(['repair_code'].indexOf(key) > -1) return '水害';
                if(['sell_time_code'].indexOf(key) > -1) return '2週間以内';
                if(['value_total_code','value_exterior_code'].indexOf(key) > -1) return '5';
                if(['value_interior_code'].indexOf(key) > -1) return 'B';

            }

            if(value == 3) {
                if(['engine_place_code'].indexOf(key) > -1) return '中央';
                if(['engine_fuel_code'].indexOf(key) > -1) return 'EV';
                if(['drive_shaft_code'].indexOf(key) > -1) return '四駆';
                if(['transmission_type_code'].indexOf(key) > -1) return 'CVT';
                if(['transmission_place_code'].indexOf(key) > -1) return 'フロア';
                if(['transmission_count_code'].indexOf(key) > -1) return '3';
                if(['navi_code'].indexOf(key) > -1) return 'メーカーOP';
                if(['sunroof_code'].indexOf(key) > -1) return 'ツイン';
                if(['aluminum_wheel_code'].indexOf(key) > -1) return 'その他';
                if(['wheel_size_code'].indexOf(key) > -1) return '12インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'ベージュ';
                if(['damage_roof_code'].indexOf(key) > -1) return '剥がれ';
                if(['repair_code'].indexOf(key) > -1) return 'その他災害';
                if(['sell_time_code'].indexOf(key) > -1) return '一か月以内';
                if(['value_total_code','value_exterior_code'].indexOf(key) > -1) return '4.5';
                if(['value_interior_code'].indexOf(key) > -1) return 'C';

            }

            if(value == 4) {
                if(['engine_fuel_code'].indexOf(key) > -1) return 'ガソリン';
                if(['transmission_count_code'].indexOf(key) > -1) return '4';
                if(['navi_code'].indexOf(key) > -1) return 'その他';
                if(['sunroof_code'].indexOf(key) > -1) return 'トリプル';
                if(['wheel_size_code'].indexOf(key) > -1) return '13インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'シルバー';
                if(['damage_roof_code'].indexOf(key) > -1) return '垂れ,剥がれあり';
                if(['repair_code'].indexOf(key) > -1) return '事故';
                if(['value_total_code','value_exterior_code'].indexOf(key) > -1) return '4';
                if(['value_interior_code'].indexOf(key) > -1) return 'D';

            }

            if(value == 5) {
                if(['engine_fuel_code'].indexOf(key) > -1) return 'ハイブリッド';
                if(['transmission_count_code'].indexOf(key) > -1) return '5';
                if(['wheel_size_code'].indexOf(key) > -1) return '14インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'グレー';
                if(['repair_code','その他'].indexOf(key) > -1) return 'その他';
                if(['value_total_code','value_exterior_code'].indexOf(key) > -1) return '3.5';

            }

            if(value == 6) {
                if(['engine_fuel_code'].indexOf(key) > -1) return 'LPG';
                if(['transmission_count_code'].indexOf(key) > -1) return '6';
                if(['wheel_size_code'].indexOf(key) > -1) return '15インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'ガンメタ';
                if(['value_total_code','value_exterior_code'].indexOf(key) > -1) return '3';

            }

            if(value == 7) {
                if(['engine_fuel_code'].indexOf(key) > -1) return 'その他';
                if(['transmission_count_code'].indexOf(key) > -1) return '7';
                if(['wheel_size_code'].indexOf(key) > -1) return '16インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'クロ';

            }

            if(value == 8) {
                if(['transmission_count_code'].indexOf(key) > -1) return '8';
                if(['wheel_size_code'].indexOf(key) > -1) return '17インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'ピンク';

            }

            if(value == 9) {
                if(['wheel_size_code'].indexOf(key) > -1) return '18インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'ムラサキ';

            }

            if(value == 10) {
                if(['wheel_size_code'].indexOf(key) > -1) return '19インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'Ｗレッド';

            }

            if(value == 11) {
                if(['wheel_size_code'].indexOf(key) > -1) return '20インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'アカ';

            }

            if(value == 12) {
                if(['wheel_size_code'].indexOf(key) > -1) return '21インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'キイロ,';

            }

            if(value == 13) {
                if(['wheel_size_code'].indexOf(key) > -1) return '22インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'オレンジ';

            }

            if(value == 14) {
                if(['wheel_size_code'].indexOf(key) > -1) return '23インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'ゴールド';

            }

            if(value == 15) {
                if(['wheel_size_code'].indexOf(key) > -1) return '24インチ';
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'チャイロ';

            }

            if(value == 16) {
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'ミズイロ';

            }

            if(value == 17) {
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'アオ';

            }

            if(value == 18) {
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'コン';

            }

            if(value == 19) {
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'グリーン';

            }

            if(value == 21) {
                if(['color_category_code','color_interior_code','color_original_code'].indexOf(key) > -1) return 'ソノタ';
            }

            if(['tire_groove_front_right','tire_groove_front_left','tire_groove_rear_right','tire_groove_rear_left'].indexOf(key) > -1 && value != null) {
                return value + ' mm';
            }

            if(['first_registration_date','inspection_date','theft_date'].indexOf(key) > -1 && value != null) {
                return moment(value).format("YYYY/MM/DD");
            }

            return value;
        }
    },

    computed: {

    },
} 
</script>