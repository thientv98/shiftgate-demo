<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'   => '認証情報と一致するレコードがありません。',
    'throttle' => 'ログインの試行回数が多すぎます。:seconds 秒後にお試しください。',
    'login' => [
        'false' => 'メールアドレスまたはパスワードが無効です',
        'true' => '正常にログインしました！',
        'deleted' => 'このアカウントは削除されました',
        'locked' => 'ログイン試行が多すぎる',
        'withdrawal' => '退会処理済です',
    ],
    'register' => [
        'duplicate_email' => "アカウントは既に存在します"
    ],
    'token' => [
        'expired' => 'トークンの有効期限が切れています！',
        'valid' => 'トークンが無効です！'
    ]
];
