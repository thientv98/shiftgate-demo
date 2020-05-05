以下のSHIFTGATE会員情報の変更がありました。

【氏名】
{{ $customer->last_name }} {{ $customer->first_name }}

【氏名カタカナ】
{{ $customer->last_name_kana }} {{ $customer->first_name_kana }}

【郵便番号】
{{ $customer->zipcode }}

【住所 (都道府県と住所)】
{{ $customer->prefecture->name }} {{ $customer->address }}

【固定電話】
{{ $customer->fixed_phone_number }}

【携帯電話】
{{ $customer->mobile_phone_number }}


