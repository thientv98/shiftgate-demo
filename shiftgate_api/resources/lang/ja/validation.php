<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */
	'check_item_dealer' => '販売業者は、必ず指定してください。',
    'accepted'             => ':attributeを承認してください。',
    'active_url'           => ':attributeは、有効なURLではありません。',
    'after'                => ':attributeには、:date以降の日付を指定してください。',
    'after_or_equal'       => ':attributeには、:date以降もしくは同日時を指定してください。',
    'alpha'                => ':attributeには、アルファベッドのみ使用できます。',
    'alpha_dash'           => ":attributeには、英数字('A-Z','a-z','0-9')とハイフンと下線('-','_')が使用できます。",
    'alpha_num'            => ":attributeには、英数字('A-Z','a-z','0-9')が使用できます。",
    'array'                => ':attributeには、配列を指定してください。',
    'before'               => ':attributeには、:date以前の日付を指定してください。',
    'before_or_equal'      => ':attributeには、:date以前もしくは同日時を指定してください。',
    'between'              => [
        'numeric' => ':attributeには、:minから、:maxまでの数字を指定してください。',
        'file'    => ':attributeには、:min KBから:max KBまでのサイズのファイルを指定してください。',
        'string'  => ':attributeは、:min文字から:max文字にしてください。',
        'array'   => ':attributeの項目は、:min個から:max個にしてください。',
    ],
    'boolean'              => ":attributeには、'true'か'false'を指定してください。",
    'confirmed'            => ':attributeと:attribute確認が一致しません。',
    'date'                 => ':attributeは、正しい日付ではありません。',
    'date_format'          => ":attributeの形式は、':format'と合いません。",
    'different'            => ':attributeと:otherには、異なるものを指定してください。',
    'digits'               => ':attributeは、:digits桁の数字を入力してください。',
    'digits_between'       => ':attributeは、:min桁から:max桁の数字を入力してください。',

    'dimensions'           => ':attributeは、正しい縦横比ではありません。',
    'distinct'             => ':attributeに重複した値があります。',
    'email'                => ':attributeは、有効なメールアドレス形式で指定してください。',
    'exists'               => '選択された:attributeは、有効ではありません。',
    'file'                 => 'ファイルはPDFでなければいけません。',
    'filled'               => ':attributeは必須です。',
    'image'                => ':attributeには、画像を指定してください。',
    'in'                   => '選択された:attributeは、有効ではありません。',
    'in_array'             => ':attributeは、:otherに存在しません。',
    'integer'              => ':attributeには、整数を指定してください。',
    'ip'                   => ':attributeには、有効なIPアドレスを指定してください。',
    'ipv4'                 => ':attributeはIPv4アドレスを指定してください。',
    'ipv6'                 => ':attributeはIPv6アドレスを指定してください。',
    'json'                 => ':attributeには、有効なJSON文字列を指定してください。',
    'max'                  => [
        'numeric' => ':attributeには、:max以下の数字を指定してください。',
        'file'    => ':attributeには、:max KB以下のファイルを指定してください。',
        'string'  => ':attributeは、:max文字以下にしてください。',
        'array'   => ':attributeの項目は、:max個以下にしてください。',
    ],
    'mimes'                => ':attributeには、:valuesタイプのファイルを指定してください。',
    'mimetypes'            => ':attributeには、:valuesタイプのファイルを指定してください。',
    'min'                  => [
        'numeric' => ':attributeには、:min以上の数字を指定してください。',
        'file'    => ':attributeには、:min KB以上のファイルを指定してください。',
        'string'  => ':attributeは、:min文字以上にしてください。',
        'array'   => ':attributeの項目は、:max個以上にしてください。',
    ],
    'not_in'               => '選択された:attributeは、有効ではありません。',
    'numeric'              => ':attributeには、数字を指定してください。',
    'present'              => ':attributeは、必ず存在しなくてはいけません。',
    'regex'                => ':attributeには、有効な正規表現を指定してください。',
    'required'             => ':attributeは、必ず指定してください。',
    'required_if'          => ':otherが:valueの場合、:attributeを指定してください。',
    'required_unless'      => ':otherが:value以外の場合、:attributeを指定してください。',
    'required_with'        => ':valuesが指定されている場合、:attributeも指定してください。',
    'required_with_all'    => ':valuesが全て指定されている場合、:attributeも指定してください。',
    'required_without'     => ':valuesが指定されていない場合、:attributeを指定してください。',
    'required_without_all' => ':valuesが全て指定されていない場合、:attributeを指定してください。',
    'same'                 => ':attributeと:otherが一致しません。',
    'size'                 => [
        'numeric' => ':attributeには、:sizeを指定してください。',
        'file'    => ':attributeには、:size KBのファイルを指定してください。',
        'string'  => ':attributeは、:size文字にしてください。',
        'array'   => ':attributeの項目は、:size個にしてください。',
    ],
    'string'   => ':attributeには、文字を指定してください。',
    'timezone' => ':attributeには、有効なタイムゾーンを指定してください。',
    'unique'   => '指定の:attributeは既に使用されています。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url'      => ':attributeは、有効なURL形式で指定してください。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        // Common
        'login_id' => 'ログインID',
        'password' => 'パスワード',
        're_password' => 'パスワード確認',
        'user_role_code' => '役割',
        'company_id' => '会社',
        'sex' => '性別',
        'birth_date' => '生年月日',
        'mobile' => '携帯電話',
        'tel' => '電話番号',
        'mail' => 'メールアドレス',

        // Funeral
        'nyuden_recital' => '追記事項',
        'nyuden_date' => '入電日',
        'in_call_name' => '氏名',
        'in_call_name_kana' => 'ひらがな',
        'in_call_terms_id' => '続柄',
        'in_call_terms_detail' => '続柄詳細',
        'in_call_tel' => '自宅電話',
        'in_call_mobile' => '携帯電話',
        'in_call_user_id' => '応対者',

        'hospital_date_time' => '事前相談日時',
        'hospital_name' => '場所名',
        'hospital_address' => '住所',
        'police_name' => '警察署',
        'policeman_name' => '担当刑事',
        'msb_m_carrier_id' => '手配先',
        'msb_m_carrier_detail_id' => '営業所',
        'carrier_tel' => '電話',
        'carrier_chk_user_id' => '確認者',
        'sage_user_id' => '担当者',
        'sage_doukou_user_id' => '同行者',
        'is_repose' => '場所',
        'repose_date_time' => '到着日時',
        'repose_id' => '安置所名',
        'repose_name' => '場所名',
        'repose_address' => '住所',
        'repose_tel' => '電話',
        'repose_notice' => '注意事項',
        'repose_recital' => '備考',
        'repose_chk_user_id' => '確認者',

        // Funeral reservation tab1
        'floor_id' => '式場',
        'floor_name' => '名称',
        'floor_yoyaku_date_time' => '予約日時',
        'floor_chk_user_id' => '確認者',

        // tab2
        'committal_place_id' => '火葬場',
        'committal_yoyaku_date_time' => '予約日時',
        'committal_chk_user_id' => '確認者',

        // other tab
        'address2' => '住所',

        // Approach register
        'approach_date_time' => '日時',
        'approach_recital' => '備考',
        'msb_m_approach_purpose_id' => '目的',
        'approach_user_id' => '応対者',

        'service_date_time' => '受付日時',
        'regi_user_id' => '受付者',
        'history_recital' => '内容',

        // Inquiry History Comment
        'comment' => 'コメント',
        'after_item_kbn_id' => '商品区分',
        'after_item_status_id' => '状況',

        // Cineration
        'customer_id' => '資料送付先',
        'deadline' => '提案期限',
        'after_cineration_kbn_id' => '納骨先区分',
        'after_cineration_status_id' => '状況',
        'price' => '金額',
        'type' => 'タイプ',
        'email' => 'メールアドレス',
        'messages' => 'メッセージ',
        'last_name' => '姓',
        'first_name' => '名',
        'last_name_kana' => 'セイ',
        'first_name_kana' => 'メイ',
        'zipcode' => '郵便番号',
        'zipcode_prefix' => '郵便番号',
        'zipcode_subfix' => '郵便番号',
        'zipcode_total' => '郵便番号合計',
        'prefecture_id' => '都道府県',
        'address' => '住 所',
        'mobile_phone_number' => '連絡先電話番号',
        'mobile_phone_number_prefix' => '連絡先電話番号',
        'mobile_phone_number_mid' => '連絡先電話番号',
        'mobile_phone_number_subfix' => '連絡先電話番号',
        'mobile_phone_number_total' => '連絡先電話番号合計',
        'fixed_phone_number' => '携帯電話番号',
        'fixed_phone_number_prefix' => '携帯電話番号',
        'fixed_phone_number_mid' => '携帯電話番号',
        'fixed_phone_number_subfix' => '携帯電話番号',
        'fixed_phone_number_total' => '携帯電話番号合計',
        'birthdate' => "生年月日"
    ],
];