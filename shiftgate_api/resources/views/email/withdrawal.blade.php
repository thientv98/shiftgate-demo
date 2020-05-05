以下のSHIFTGATE退会がありました。
[顧客ID]
{{ $customer->type}}{{ sprintf('%08d', $customer->id) }}

[顧客名]
{{ $customer->last_name }} {{ $customer->first_name }} 様

[退会理由]
{{ $request['option'] }}

{{ $request['messages'] }}
