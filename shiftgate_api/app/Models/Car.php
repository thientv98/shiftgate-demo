<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CarSearch;

/**
 * @property int $id
 * @property int $customer_id
 * @property string $public_status_code
 * @property int $buyer_id
 * @property string $published_date
 * @property boolean $is_in_transaction
 * @property boolean $is_in_contract
 * @property boolean $is_car_delivery_complete
 * @property boolean $is_trading_complete
 * @property string $trading_no
 * @property string $dealer_introduction_code
 * @property string $trading_memo
 * @property int $total_vehicle_price
 * @property boolean $is_coating
 * @property int $coating_fee
 * @property boolean $is_film
 * @property int $film_fee
 * @property boolean $is_warranty_inheritance
 * @property int $warranty_inheritance_fee
 * @property boolean $is_electric_components
 * @property int $electric_components_fee
 * @property boolean $is_shift_gate_warranty
 * @property int $shift_gate_warranty_fee
 * @property boolean $is_other
 * @property int $other_fee
 * @property int $transport_fee
 * @property int $acquisition_tax
 * @property string $payment_methods
 * @property string $seller_signature
 * @property string $buyer_signature
 * @property int $create_id
 * @property string $create_date
 * @property string $maker_name
 * @property string $car_name
 * @property string $grade_name
 * @property string $model_num
 * @property string $category_num
 * @property string $car_num
 * @property string $first_registration_date
 * @property string $inspection_date
 * @property string $model_official
 * @property string $chassis_num
 * @property string $engine_model
 * @property int $door_count
 * @property int $seating_capacity
 * @property boolean $steering_place_code
 * @property boolean $engine_place_code
 * @property boolean $engine_fuel_code
 * @property int $engine_displacement
 * @property boolean $drive_shaft_code
 * @property boolean $transmission_type_code
 * @property boolean $transmission_place_code
 * @property boolean $transmission_count_code
 * @property int $max_load
 * @property boolean $recycle_ticket_code
 * @property int $recycle_price
 * @property string $recycle_no
 * @property int $recycle_airbag_price
 * @property int $recycle_freon_price
 * @property int $recycle_shredder_price
 * @property int $recycle_information_management_price
 * @property boolean $meter_condition_code
 * @property boolean $meter_record_note_code
 * @property boolean $warranty_code
 * @property boolean $record_note_code
 * @property boolean $instruction_car_code
 * @property boolean $instruction_audio_code
 * @property boolean $instruction_navi_code
 * @property boolean $instruction_other_code
 * @property boolean $leather_seat_code
 * @property boolean $tv_code
 * @property boolean $navi_code
 * @property boolean $camera_front_code
 * @property boolean $camera_side_code
 * @property boolean $camera_rear_code
 * @property boolean $spare_key
 * @property boolean $etc_code
 * @property boolean $sunroof_code
 * @property boolean $aluminum_wheel_code
 * @property boolean $wheel_size_code
 * @property boolean $tire_code
 * @property float $tire_groove_front_right
 * @property float $tire_groove_front_left
 * @property float $tire_groove_rear_right
 * @property float $tire_groove_rear_left
 * @property string $color_name_code
 * @property string $color_name
 * @property boolean $color_category_code
 * @property boolean $color_interior_code
 * @property boolean $color_original_code
 * @property int $mileage
 * @property boolean $smell_tobacco_code
 * @property boolean $smell_pet_code
 * @property boolean $smell_other_code
 * @property boolean $damage_dashboard_code
 * @property boolean $damage_steering_code
 * @property boolean $damage_seat_code
 * @property boolean $damage_roof_code
 * @property boolean $repair_history_code
 * @property boolean $repair_code
 * @property string $repair_note
 * @property int $model_year
 * @property int $total_price
 * @property int $system_usage_fee
 * @property int $income_price
 * @property boolean $sell_time_code
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $image4
 * @property string $image5
 * @property string $image6
 * @property string $image7
 * @property string $image8
 * @property string $image9
 * @property string $image10
 * @property string $image11
 * @property string $image12
 * @property string $image13
 * @property string $image14
 * @property string $image15
 * @property string $image16
 * @property string $image17
 * @property string $image18
 * @property string $image19
 * @property string $image20
 * @property string $image21
 * @property string $image22
 * @property string $image23
 * @property string $image24
 * @property string $image25
 * @property string $development_image
 * @property string $inspection_image
 * @property string $liability_insurance_image
 * @property boolean $value_total_code
 * @property boolean $value_exterior_code
 * @property boolean $value_interior_code
 * @property int $quick_price
 * @property int $quick_price_from
 * @property int $quick_price_to
 * @property int $length
 * @property int $width
 * @property int $height
 * @property int $weight
 * @property int $total_weight
 * @property int $axile_weight_f_f
 * @property int $axile_weight_f_r
 * @property int $axile_weight_r_f
 * @property int $axile_weight_r_r
 * @property string $theft_date
 * @property boolean $mortgage
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property int $camera_around_view_code
 * @property string $sell_time
 * @property string $seller_comment
 * @property Customer $customer
 * @property Status $status
 * @property Customer $customer
 * @property BrowsingHistory[] $browsingHistories
 * @property Contact[] $contacts
 * @property Favorite[] $favorites
 * @property File[] $files
 */
class Car extends Base
{
    use CarSearch;

    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'public_status_code', 'buyer_id', 'published_date', 'is_in_transaction', 'is_in_contract', 'is_car_delivery_complete', 'is_trading_complete', 'trading_no', 'dealer_introduction_code', 'trading_memo', 'total_vehicle_price', 'is_coating', 'coating_fee', 'is_film', 'film_fee', 'is_warranty_inheritance', 'warranty_inheritance_fee', 'is_electric_components', 'electric_components_fee', 'is_shift_gate_warranty', 'shift_gate_warranty_fee', 'is_other', 'other_fee', 'transport_fee', 'acquisition_tax', 'payment_methods', 'seller_signature', 'buyer_signature', 'create_id', 'create_date', 'maker_name', 'car_name', 'grade_name', 'model_num', 'category_num', 'car_num', 'first_registration_date', 'inspection_date', 'model_official', 'chassis_num', 'engine_model', 'door_count', 'seating_capacity', 'steering_place_code', 'engine_place_code', 'engine_fuel_code', 'engine_displacement', 'drive_shaft_code', 'transmission_type_code', 'transmission_place_code', 'transmission_count_code', 'max_load', 'recycle_ticket_code', 'recycle_price', 'recycle_no', 'recycle_airbag_price', 'recycle_freon_price', 'recycle_shredder_price', 'recycle_information_management_price', 'meter_condition_code', 'meter_record_note_code', 'warranty_code', 'record_note_code', 'instruction_car_code', 'instruction_audio_code', 'instruction_navi_code', 'instruction_other_code', 'leather_seat_code', 'tv_code', 'navi_code', 'camera_front_code', 'camera_side_code', 'camera_rear_code', 'spare_key', 'etc_code', 'sunroof_code', 'aluminum_wheel_code', 'wheel_size_code', 'tire_code', 'tire_groove_front_right', 'tire_groove_front_left', 'tire_groove_rear_right', 'tire_groove_rear_left', 'color_name_code', 'color_name', 'color_category_code', 'color_interior_code', 'color_original_code', 'mileage', 'smell_tobacco_code', 'smell_pet_code', 'smell_other_code', 'damage_dashboard_code', 'damage_steering_code', 'damage_seat_code', 'damage_roof_code', 'repair_history_code', 'repair_code', 'repair_note', 'model_year', 'total_price', 'system_usage_fee', 'income_price', 'sell_time_code', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6', 'image7', 'image8', 'image9', 'image10', 'image11', 'image12', 'image13', 'image14', 'image15', 'image16', 'image17', 'image18', 'image19', 'image20', 'image21', 'image22', 'image23', 'image24', 'image25', 'development_image', 'inspection_image', 'liability_insurance_image', 'value_total_code', 'value_exterior_code', 'value_interior_code', 'quick_price', 'quick_price_from', 'quick_price_to', 'length', 'width', 'height', 'weight', 'total_weight', 'axile_weight_f_f', 'axile_weight_f_r', 'axile_weight_r_f', 'axile_weight_r_r', 'theft_date', 'mortgage', 'created_at', 'updated_at', 'deleted_at', 'camera_around_view_code', 'sell_time', 'seller_comment', 'is_seller_consent', 'is_buyer_consent', 'seller_introduction_code', 'buyer_introduction_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'public_status_code', 'code');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerBuyer()
    {
        return $this->belongsTo('App\Models\Customer', 'buyer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function browsingHistories()
    {
        return $this->hasMany('App\Models\BrowsingHistory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

    public static function steering_place_code($v)
    {
        switch ($v) {
            case 1:
                return '左';
                break;
            case 2:
                return '右';
                break;
            default:
                return '';
                break;
        }
    }

    public static function engine_place_code($v)
    {
        switch ($v) {
            case 1:
                return '前';
                break;
            case 2:
                return '後';
                break;
            case 3:
                return '中央';
                break;
            default:
                return '';
                break;
        }
    }

    public static function engine_fuel_code($v)
    {
        switch ($v) {
            case 1:
                return 'CNG';
                break;
            case 2:
                return 'ディーゼル';
                break;
            case 3:
                return 'EV';
                break;
            case 4:
                return 'ガソリン';
                break;
            case 5:
                return 'ハイブリッド';
                break;
            case 6:
                return 'LPG';
                break;
            case 7:
                return 'その他';
                break;
            default:
                return '';
                break;
        }
    }

    public static function drive_shaft_code($v)
    {
        switch ($v) {
            case 1:
                return '前';
                break;
            case 2:
                return '後';
                break;
            case 3:
                return '四駆';
                break;
            default:
                return '';
                break;
        }
    }

    public static function transmission_type_code($v)
    {
        switch ($v) {
            case 1:
                return 'AT';
                break;
            case 2:
                return 'MT';
                break;
            case 3:
                return 'CVT';
                break;
            default:
                return '';
                break;
        }
    }

    public static function transmission_place_code($v)
    {
        switch ($v) {
            case 1:
                return 'コラム';
                break;
            case 2:
                return 'ダッシュ';
                break;
            case 3:
                return 'フロア';
                break;
            default:
                return '';
                break;
        }
    }

    public static function transmission_count_code($v)
    {
        if ($v == 1) return '無段';
        else return $v;
    }

    public static function recycle_ticket_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function meter_condition_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            case 2:
                return '不明';
                break;
            default:
                return '';
                break;
        }
    }

    public static function meter_record_note_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function warranty_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function record_note_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function instruction_car_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function instruction_audio_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function instruction_navi_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function instruction_other_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function leather_seat_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function tv_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function navi_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return 'ディーラーOP';
                break;
            case 3:
                return 'メーカーOP';
                break;
            case 4:
                return 'その他';
                break;
            default:
                return '';
                break;
        }
    }

    public static function camera_front_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function camera_side_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function camera_rear_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function etc_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function sunroof_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return 'シングル';
                break;
            case 3:
                return 'ツイン';
                break;
            case 4:
                return 'トリプル';
                break;
            default:
                return '';
                break;
        }
    }

    public static function aluminum_wheel_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return '純正';
                break;
            case 3:
                return '社外';
                break;
            default:
                return '';
                break;
        }
    }

    public static function wheel_size_code($v)
    {
        switch ($v) {
            case 1:
                return '標準';
                break;
            case 2:
                return 'インチ不明';
                break;
            case 3:
                return '12インチ';
                break;
            case 4:
                return '13インチ';
                break;
            case 5:
                return '14インチ';
                break;
            case 6:
                return '15インチ';
                break;
            case 7:
                return '16インチ';
                break;
            case 8:
                return '17インチ';
                break;
            case 9:
                return '18インチ';
                break;
            case 10:
                return '19インチ';
                break;
            case 11:
                return '20インチ';
                break;
            case 12:
                return '21インチ';
                break;
            case 13:
                return '22インチ';
                break;
            case 14:
                return '23インチ';
                break;
            case 15:
                return '24インチ';
                break;
            default:
                return '';
                break;
        }
    }

    public static function tire_code($v)
    {
        switch ($v) {
            case 1:
                return '夏';
                break;
            case 2:
                return '冬';
                break;
            default:
                return '';
                break;
        }
    }

    public static function color_category_code($v)
    {
        switch ($v) {
            case 1:
                return 'シロ';
                break;
            case 2:
                return 'Ｐホワイト';
                break;
            case 3:
                return 'ベージュ';
                break;
            case 4:
                return 'シルバー';
                break;
            case 5:
                return 'グレー';
                break;
            case 6:
                return 'ガンメタ';
                break;
            case 7:
                return 'クロ';
                break;
            case 8:
                return 'ピンク';
                break;
            case 9:
                return 'ムラサキ';
                break;
            case 10:
                return 'Ｗレッド';
                break;
            case 11:
                return 'アカ';
                break;
            case 12:
                return 'キイロ';
                break;
            case 13:
                return 'オレンジ';
                break;
            case 14:
                return 'ゴールド';
                break;
            case 15:
                return 'チャイロ';
                break;
            case 16:
                return 'ミズイロ';
                break;
            case 17:
                return 'アオ';
                break;
            case 18:
                return 'コン';
                break;
            case 19:
                return 'グリーン';
                break;
            case 21:
                return 'ソノタ';
                break;
            default:
                return '';
                break;
        }
    }

    public static function color_interior_code($v)
    {
        switch ($v) {
            case 1:
                return 'シロ';
                break;
            case 2:
                return 'Ｐホワイト';
                break;
            case 3:
                return 'ベージュ';
                break;
            case 4:
                return 'シルバー';
                break;
            case 5:
                return 'グレー';
                break;
            case 6:
                return 'ガンメタ';
                break;
            case 7:
                return 'クロ';
                break;
            case 8:
                return 'ピンク';
                break;
            case 9:
                return 'ムラサキ';
                break;
            case 10:
                return 'Ｗレッド';
                break;
            case 11:
                return 'アカ';
                break;
            case 12:
                return 'キイロ';
                break;
            case 13:
                return 'オレンジ';
                break;
            case 14:
                return 'ゴールド';
                break;
            case 15:
                return 'チャイロ';
                break;
            case 16:
                return 'ミズイロ';
                break;
            case 17:
                return 'アオ';
                break;
            case 18:
                return 'コン';
                break;
            case 19:
                return 'グリーン';
                break;
            default:
                return '';
                break;
        }
    }

    public static function color_original_code($v)
    {
        switch ($v) {
            case 1:
                return 'シロ';
                break;
            case 2:
                return 'Ｐホワイト';
                break;
            case 3:
                return 'ベージュ';
                break;
            case 4:
                return 'シルバー';
                break;
            case 5:
                return 'グレー';
                break;
            case 6:
                return 'ガンメタ';
                break;
            case 7:
                return 'クロ';
                break;
            case 8:
                return 'ピンク';
                break;
            case 9:
                return 'ムラサキ';
                break;
            case 10:
                return 'Ｗレッド';
                break;
            case 11:
                return 'アカ';
                break;
            case 12:
                return 'キイロ';
                break;
            case 13:
                return 'オレンジ';
                break;
            case 14:
                return 'ゴールド';
                break;
            case 15:
                return 'チャイロ';
                break;
            case 16:
                return 'ミズイロ';
                break;
            case 17:
                return 'アオ';
                break;
            case 18:
                return 'コン';
                break;
            case 19:
                return 'グリーン';
                break;
            case 21:
                return 'ソノタ';
                break;
            default:
                return '';
                break;
        }
    }

    public static function smell_tobacco_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function smell_pet_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function smell_other_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function damage_dashboard_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function damage_steering_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function damage_seat_code($v)
    {
        switch ($v) {
            case 1:
                return 'なし';
                break;
            case 2:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function damage_roof_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return '汚れ';
                break;
            case 2:
                return '垂れ';
                break;
            case 3:
                return '剥がれ';
                break;
            default:
                return '';
                break;
        }
    }

    public static function repair_history_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function repair_code($v)
    {
        switch ($v) {
            case 1:
                return '雹害';
                break;
            case 2:
                return '水害';
                break;
            case 3:
                return 'その他災害';
                break;
            case 4:
                return '事故,剥がれあり';
                break;
            case 5:
                return 'その他';
                break;
            default:
                return '';
                break;
        }
    }

    public static function sell_time_code($v)
    {
        switch ($v) {
            case 1:
                return '今すぐ';
                break;
            case 2:
                return '2週間以内';
                break;
            case 3:
                return '一か月以内';
                break;
            case 4:
                return '半年以内';
                break;
            case 5:
                return 'その他';
                break;
            default:
                return '';
                break;
        }
    }

    public static function value_total_code($v)
    {
        switch ($v) {
            case 1:
                return '6';
                break;
            case 2:
                return '5';
                break;
            case 3:
                return '4.5';
                break;
            case 4:
                return '4';
                break;
            case 5:
                return '3.5';
                break;
            case 6:
                return '3';
                break;
            default:
                return '';
                break;
        }
    }

    public static function value_exterior_code($v)
    {
        switch ($v) {
            case 1:
                return '6';
                break;
            case 2:
                return '5';
                break;
            case 3:
                return '4.5';
                break;
            case 4:
                return '4';
                break;
            case 5:
                return '3.5';
                break;
            case 6:
                return '3';
                break;
            default:
                return '';
                break;
        }
    }

    public static function value_interior_code($v)
    {
        switch ($v) {
            case 1:
                return 'A';
                break;
            case 2:
                return 'B';
                break;
            case 3:
                return 'C';
                break;
            case 4:
                return 'D';
                break;
            default:
                return '';
                break;
        }
    }

    public static function mortgage($v)
    {
        switch ($v) {
            case 0:
                return '抵当なし';
                break;
            case 1:
                return '抵当あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function camera_around_view_code($v)
    {
        switch ($v) {
            case 0:
                return 'なし';
                break;
            case 1:
                return 'あり';
                break;
            default:
                return '';
                break;
        }
    }

    public static function formatTradingNumb($numb)
    {
        $characters = strtoupper('abcdefghijklmnopqrstuvwxyz');
        if ($numb) {
            $s = (string)$numb;
            while (strlen($s) < 5 || strlen($s) < 2) {
                $s = "0" . $s;
            }
            return substr(str_shuffle($characters), 0, 3) . $s;
        } else {
            return "";
        }
    }
    
    public function scopeExclude($query,$value = array(),$addCars = false) 
    {
        $arrFillable = array_diff( $this->fillable,(array) $value);

        if($addCars) {
            foreach ($arrFillable as $key => $value) {
                $arrFillable[$key] = 'cars.'.$value;
            }
        }

        return $query->select($arrFillable);
    }
}
