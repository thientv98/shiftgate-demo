<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buyer Loan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <style>
        .color-blue{ color: #48628d; }
        .color-light-blue{ color: #4472c4}
        .two-line{
            height: 3px;
            width: 100%;
            border-top: 1px solid;
            border-bottom: 1px solid;
        }
        .font-size-11{ font-size: 11px; }
        .font-size-13{ font-size: 13px; }
        .font-size-15{ font-size: 15px; }
        .font-size-17{ font-size: 17px; }
        .font-size-20{ font-size: 20px; }
        hr{ border-color: black; }
        .line-hr{
            width: 100%;
            height: 1px;
            border-top: 1px solid black;
        }
        .sign{
            width: 100%;
            height: 80px;
            border: 3px solid #8497b0;
        }
        .background-1{ background-color: #4472c4; }
        .background-2{ background-color: #d9e1f2; }
        .background-3{ background-color: #d9d9d9; }
        .background-4{ background-color: #ddebf7; }
        .background-5{ background-color: #acb9ca; }
        .background-6{ background-color: #f2f2f2; }
        .border-top{ border-top: 1px solid #8d9eb4 !important; }
        .border-bottom{ border-bottom: 1px solid #8d9eb4 !important; }
        .border-left{ border-left: 1px solid #8d9eb4 !important; }
        .border-right{ border-right: 1px solid #8d9eb4 !important; }
        .border-black{ border: 1px solid black; }
        .border-top-black{ border-top: 1px solid black; }
        .border-bottom-black{ border-bottom: 1px solid black; }
        .border-left-black{ border-left: 1px solid black; }
        .border-right-black{ border-right: 1px solid black; }
        .border-top-gray{ border-top: 1px solid #adadad; }
        .border-bottom-gray{ border-bottom: 1px solid #adadad; }
        .border-left-gray{ border-left: 1px solid #adadad; }
        .border-right-gray{ border-right: 1px solid #adadad; }

        .w-100{ width: 100%; }
        .h-100{ height: 100%; }
        .py-n{ padding-top: 13px; padding-bottom: 13px;}
        .col-5-5 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 5.55555555556%;
            flex: 0 0 5.55555555556%;
            max-width: 5.55555555556%;
        }
        .col-11-1 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 11.2%;
            flex: 0 0 11.2%;
            max-width: 11.2%;
        }
        .col-16-6 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 16.6666666667%;
            flex: 0 0 16.6666666667%;
            max-width: 16.6666666667%;
        }
        .col-22-2 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 22.1%;
            flex: 0 0 22.1%;
            max-width: 22.1%;
        }
        .w-1-of-6 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 16.6666666667%;
            flex: 0 0 16.6666666667%;
            max-width: 16.6666666667%;
        }
        .w-2-of-6 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 33.3333333333%;
            flex: 0 0 33.3333333333%;
            max-width: 33.3333333333%;
        }
        .text-vertical{
            writing-mode: vertical-lr;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row pt-3">
            <div class="col col-7">
                <p class="color-blue font-weight-bold">売買契約書</p>
            </div>
            <div class="col col-5">
                <span class="color-blue font-weight-bold font-size-13 pl-2">No</span>
                <div class="two-line color-blue"></div>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col col-12">
                <p class="font-weight-bold">私（乙）は株式会社MIDﾈｯﾄﾜｰｸ（甲）からSHIFTGATEサイトに掲載した下記車両を同利用規約を理解、合意したうえで購買します。
                    </p>
            </div>
        </div>

        <div class="row pt-3">
            <div class="col col-7">
                <div class="row pl-3">
                    <div class="col col-2 px-0">
                        <p class="color-blue font-weight-bold">ID（乙）</p>
                    </div>
                    <div class="col col-10 pt-2">
                        <hr>
                    </div>
                </div>

                <div class="row pl-3">
                    <div class="col col-2 px-0">
                        <p class="color-blue font-weight-bold">氏名（乙）</p>
                    </div>
                    <div class="col col-10 pt-2">
                        {{-- <span class="float-right pr-3 font-weight-bold color-blue font-size-20">様</span> --}}
                        {{-- <div class="line-hr float-right"></div> --}}
                        <hr>
                    </div>
                </div>

                <div class="row pl-3">
                    <div class="col col-2 px-0">
                        <p class="color-blue font-weight-bold">〒</p>
                    </div>
                    <div class="col col-10 pt-2">
                        <hr>
                    </div>
                </div>

                <div class="row pl-3">
                    <div class="col col-2 px-0">
                        <p class="color-blue font-weight-bold">住所</p>
                    </div>
                    <div class="col col-10 pt-2">
                        <div class="row">
                            <div class="col col-12"><hr></div>
                        </div>
                        <div class="row pt-3">
                            <div class="col col-12"><hr></div>
                        </div>
                    </div>
                </div>

                <div class="row pl-3">
                    <div class="col col-2 px-0">
                        <p class="color-blue font-weight-bold">連絡先<br>（電話）</p>
                    </div>
                    <div class="col col-10 pt-4">
                        <hr>
                    </div>
                </div>

                <div class="row pl-3">
                    <div class="col col-2 px-0">
                        <p class="color-blue font-weight-bold">紹介コード</p>
                    </div>
                    <div class="col col-10 pt-2">
                        <hr>
                    </div>
                </div>
            </div>
            <div class="col col-5">
                <div class="row pl-3">
                    <div class="col col-3">
                        <p class="text-center font-weight-bold">日付</p>
                    </div>
                    <div class="col col-9">
                        <p class="font-weight-bold text-center mb-0">2020/4/13</p>
                        <div class="line-hr"></div>
                    </div>
                </div>
                <div class="row pl-3">
                    <div class="col col-12">
                        <p class="font-weight-bold mb-1"><b>同意サイン欄</b> （ご自身でサインをお願いいたします）</p>
                    </div>
                    <div class="col col-12">
                        <div class="sign"></div>
                    </div>
                </div>

                <div class="row pl-3 pt-4">
                    <div class="col col-12">
                        <p class="border-black mb-0 font-size-15">
                            <b>株式会社MIDネットワーク （甲）</b><br>
                            〒104-0061 <br>
                            東京都中央区銀座7-3-5 <br>
                            ヒューリック銀座7丁目ビル <br>
                            TEL：03-6263-5077 <br>
                            FAX:03-6263-5078
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-3 font-size-15">
            <div class="col col-12">
                <div class="row">
                    <div class="col col-12">
                        <p class="background-1 text-center text-white mb-0 border-top border-left border-right font-weight-bold">ご契約車輛</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-1 pr-0">
                        <p class="background-2 py-3 text-center border-top border-left border-right mb-0 h-100">車名</p>
                    </div>
                    <div class="col col-5 px-0 border-top border-right background-6">
                    </div>
                    <div class="col col-1 px-0">
                        <p class="background-2 py-3 text-center border-top border-right mb-0">メーカー</p>
                    </div>
                    <div class="col col-5 pl-0">
                        <p class="mb-0 border-top border-right background-6 w-100 h-100"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-1 pr-0">
                        <p class="background-2 text-center border-top border-left border-right mb-0 h-100">型式</p>
                    </div>
                    <div class="col col-2 px-0 border-top border-right background-6">
                    </div>
                    <div class="col col-1 px-0">
                        <p class="background-2 text-center border-top h-100 border-right mb-0">走行距離</p>
                    </div>
                    <div class="col col-2 px-0 border-top border-right background-6">
                        <p class="mb-0 text-right pr-2">Km</p>
                    </div>
                    <div class="col col-1 px-0">
                        <p class="background-2 text-center border-top border-right mb-0">ボディカラー</p>
                    </div>
                    <div class="col col-5 pl-0">
                        <p class="mb-0 border-top border-right background-6 w-100 h-100"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-1 pr-0">
                        <p class="background-2 text-center border-top border-bottom border-left border-right mb-0 h-100">初度登録日</p>
                    </div>
                    <div class="col col-2 px-0 border-top border-right border-bottom background-6">
                    </div>
                    <div class="col col-1 px-0">
                        <p class="background-2 text-center border-top h-100 border-right mb-0">車検満了日</p>
                    </div>
                    <div class="col col-2 px-0 border-top border-right border-bottom background-6">
                    </div>
                    <div class="col col-1 px-0">
                        <p class="background-2 text-center border-top border-bottom border-right mb-0 h-100">車台No.</p>
                    </div>
                    <div class="col col-5 pl-0">
                        <p class="mb-0 border-top border-right border-bottom background-6 w-100 h-100"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-3 px-3">
            <div class="col col-6 pl-0 h-100">
                <div class="border-black text-center">
                    <p class="font-size-20 font-weight-bold color-blue mb-0 py-1">現金販売時お支払総額</p>
                    <p class="font-weight-bold font-size-20 mb-0 pb-1">¥68,450</p>
                </div>
            </div>

            <div class="col col-6 px-0">
                <div class="border-black font-weight-bold text-center">
                    <p class="mb-0">
                        お支払い<br>
                        契約締結後5営業日以内に左記よりローン元金を差し引いた<br>
                        額を下記口座にお支払い願います。
                    </p>
                </div>
            </div>
        </div>

        <div class="row pt-3 px-3">
            <div class="col col-6">
                <div class="w-100">
                    <div class="row pr-3">
                        <div class="col col-7 background-1 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold text-white">内訳</p>
                        </div>

                        <div class="col col-5 background-1 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold text-white">（単位円）</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">車両本体価格（A)   </p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 font-weight-bold text-right">0</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">諸費用（B＋C)</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-right font-weight-bold">68,450</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">SHIFTGATEシステム利用料（D)</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-right font-weight-bold">0</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">オプション（E)</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-right font-weight-bold">0</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-7 border-left border-right border-top background-4">
                            <p class="mb-0 text-center font-weight-bold">（小　　　計）</p>
                        </div>

                        <div class="col col-5 border-right border-top background-4">
                            <p class="mb-0 text-right font-weight-bold"> 68,450</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-7 border-left border-right border-top background-4">
                            <p class="mb-0 text-center font-weight-bold">（内消費税合計）</p>
                        </div>

                        <div class="col col-5 border-right border-top background-4">
                            <p class="mb-0 text-right font-weight-bold">6,400</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-7 border-left border-right border-top background-5">
                            <p class="mb-0 text-center font-weight-bold">合計</p>
                        </div>

                        <div class="col col-5 border-right border-top background-5">
                            <p class="mb-0 text-right font-weight-bold">68,450</p>
                        </div>
                    </div>
                </div>

                <div class="w-100 pt-4">
                    <div class="row pr-3">
                        <div class="col col-7 background-1 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold text-white">お支払い例</p>
                        </div>

                        <div class="col col-5 background-1 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold text-white">（単位円）</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-1 background-1 border-top border-left text-white font-size-11 pt-1">
                            税
                            金
                            ・
                            保
                            険
                            料
                            ・
                            そ
                            の
                            他
                        </div>
                        <div class="col col-6 border-left px-0">
                            <p class="mb-0 border-top font-weight-bold">自動車税（本年度分）</p>
                            <p class="mb-0 border-top font-weight-bold">自賠責　</p>
                            <p class="mb-0 border-top font-weight-bold">リサイクル料預託金</p>
                            <p class="mb-0 border-top font-weight-bold">自動車取得税</p>
                            <p class="mb-0 border-top font-weight-bold">検査登録印紙</p>
                            <p class="mb-0 border-top font-weight-bold">車庫証明印紙</p>
                            <p class="mb-0 border-top font-weight-bold background-5">合計（Ｂ）</p>
                        </div>
                        <div class="col col-5 border-left border-right px-0">
                            <p class="mb-0 px-3 border-top font-weight-bold text-right">本体価格に含む</p>
                            <p class="mb-0 px-3 border-top font-weight-bold text-right">本体価格に含む</p>
                            <p class="mb-0 px-3 border-top font-weight-bold text-right">本体価格に含む</p>
                            <p class="mb-0 px-3 border-top font-weight-bold text-right">0</p>
                            <p class="mb-0 px-3 border-top font-weight-bold text-right">1,850</p>
                            <p class="mb-0 px-3 border-top font-weight-bold text-right">2,600</p>
                            <p class="mb-0 px-3 border-top font-weight-bold background-5 text-right">4,450</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-1 background-1 border-top border-left text-white pt-3">
                            課
                            税
                            対
                            象
                            諸
                            費
                        </div>
                        <div class="col col-6 border-left px-0">
                            <p class="mb-0 border-top font-weight-bold">検査登録届出手続代行費</p>
                            <p class="mb-0 border-top font-weight-bold">車庫証明手続き代行費</p>
                            <p class="mb-0 border-top font-weight-bold">希望No.取得費用（プレート代含）</p>
                            <p class="mb-0 border-top font-weight-bold">&nbsp</p>
                            <p class="mb-0 border-top font-weight-bold text-center background-4">（小　　　計）</p>
                            <p class="mb-0 border-top font-weight-bold text-center background-4">（内消費税・10%）</p>
                            <p class="mb-0 border-top font-weight-bold background-5">合計（Ｃ）</p>
                        </div>
                        <div class="col col-5 border-left border-right px-0">
                            <p class="mb-0 border-top font-weight-bold text-right px-3">36,000</p>
                            <p class="mb-0 border-top font-weight-bold text-right px-3">16,000</p>
                            <p class="mb-0 border-top font-weight-bold text-right px-3">12,000</p>
                            <p class="mb-0 border-top">&nbsp</p>
                            <p class="mb-0 border-top font-weight-bold background-4 text-right px-3"> 64,000</p>
                            <p class="mb-0 border-top font-weight-bold background-4 text-right px-3">6,400</p>
                            <p class="mb-0 border-top font-weight-bold background-5 text-right px-3">64,000</p>
                        </div>
                    </div>

                    <div class="row pr-3">
                        <div class="col col-1 background-1 border-top border-left text-white font-size-13 px-1 pt-2" style="writing-mode: vertical-lr;text-orientation: upright;">
                            利用料 <br>
                            システム
                        </div>
                        <div class="col col-6 border-left border-bottom px-0">
                            <p class="mb-0 border-top font-weight-bold text-center" style="font-size: 14px;line-height: 24px;">シフトゲートシステム利用料（5.5%）</p>
                            <p class="mb-0 border-top font-weight-bold text-center background-4">（内消費税・10%）</p>
                            <p class="mb-0 border-top font-weight-bold background-5">合計（D）</p>
                        </div>
                        <div class="col col-5 border-left border-bottom border-right px-0">
                            <p class="mb-0 border-top font-weight-bold text-right px-3">0</p>
                            <p class="mb-0 border-top font-weight-bold background-4 text-right px-3">0</p>
                            <p class="mb-0 border-top font-weight-bold background-5 text-right px-3">0</p>
                        </div>
                    </div>
                </div>

                <div class="w-100" style="padding-top: 7px">
                    <label class="font-size-20 font-weight-bold mb-0">振込先銀行</label>
                    <div class="row mr-0" style="border: 1px solid #4472c4">
                        <div class="col col-3 px-0">
                            <p class="mb-0 text-center">銀行名</p>
                        </div>
                        <div class="col col-9 px-0">
                            <p class="mb-0 border-left-gray">&nbsp;</p>
                        </div>

                        <div class="col col-3 px-0">
                            <p class="mb-0 text-center border-top-gray">支店名</p>
                        </div>
                        <div class="col col-9 px-0">
                            <p class="mb-0 border-left-gray border-top-gray">&nbsp;</p>
                        </div>

                        <div class="col col-3 px-0">
                            <p class="mb-0 text-center border-top-gray">口座種類</p>
                        </div>
                        <div class="col col-9 px-0">
                            <p class="mb-0 border-left-gray text-center border-top-gray">普通</p>
                        </div>

                        <div class="col col-3 px-0">
                            <p class="mb-0 text-center border-top-gray">口座番号</p>
                        </div>
                        <div class="col col-9 px-0">
                            <p class="mb-0 border-left-gray border-top-gray">&nbsp;</p>
                        </div>

                        <div class="col col-3 px-0">
                            <p class="mb-0 text-center border-top-gray">口座名義</p>
                        </div>
                        <div class="col col-9 px-0">
                            <p class="mb-0 border-left-gray border-top-gray">&nbsp;</p>
                        </div>
                        <div class="col col-12 px-0">
                            <p class="mb-0 text-center border-top-gray">※振込手数料はお客様にてご負担願います。</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-6">
                <div class="w-100">
                    <div class="row">
                        <div class="col col-7 background-1 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold text-white">オプション費用</p>
                        </div>

                        <div class="col col-5 background-1 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold text-white">（単位円）</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">輸送費　　　　　　から　　　</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 font-weight-bold text-right">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-right font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-right font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-right font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>

                        <div class="col col-5 border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">&nbsp</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top background-4">
                            <p class="mb-0 text-center font-weight-bold">（小　　　計）</p>
                        </div>

                        <div class="col col-5 border-right border-top background-4">
                            <p class="mb-0 text-center font-weight-bold">0</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top background-4">
                            <p class="mb-0 text-center font-weight-bold">（内消費税・10%）</p>
                        </div>

                        <div class="col col-5 border-right border-top background-4">
                            <p class="mb-0 text-center font-weight-bold">0</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-7 border-left border-right border-top background-5">
                            <p class="mb-0 font-weight-bold">オプション合計（E)</p>
                        </div>

                        <div class="col col-5 border-right border-top background-5">
                            <p class="mb-0 text-center font-weight-bold">0</p>
                        </div>
                    </div>
                </div>

                <div class="w-100 pt-4">
                    <div class="row">
                        <div class="col col-4 border-left border-top">
                            <p class="mb-0 text-center font-weight-bold">お支払い例</p>
                        </div>

                        <div class="col col-4 border-left border-top">
                            <p class="mb-0 text-center font-weight-bold">オリコ</p>
                        </div>

                        <div class="col col-11-1 border-left border-top">
                            <p class="mb-0 text-center font-weight-bold">5</p>
                        </div>

                        <div class="col col-22-2 border-left border-right border-top">
                            <p class="mb-0 text-center font-weight-bold">年ローン</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-1 background-1 border-top border-left text-white font-size-11 pt-4 font-size-15 text-vertical" style="padding-left: 10px">
                            分 割 払 い（ 消 費 税 等 込 み）
                        </div>
                        <div class="col col-3 border-left border-bottom px-0">
                            <p class="mb-0 border-top font-weight-bold">ローン元金</p>
                            <p class="mb-0 border-top font-weight-bold">頭金</p>
                            <p class="mb-0 border-top font-weight-bold">初回支払額</p>
                            <p class="mb-0 border-top font-weight-bold">月々支払い額</p>
                            <p class="mb-0 border-top font-weight-bold">ボーナス支払い額</p>
                            <p class="mb-0 border-top font-weight-bold">ボーナス月</p>
                            <p class="mb-0 border-top font-weight-bold">分割支払い手数料</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                        </div>
                        <div class="col col-4 border-left border-bottom px-0">
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <div class="mb-0 px-0 font-weight-bold border-top d-flex">
                                <div class="w-2-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left border-right text-center">月</div>
                                <div class="w-2-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left text-center">月</div>
                            </div>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                        </div>
                        <div class="col col-4 border-left border-right border-top border-bottom px-0">
                            <div class="mb-0 px-0 font-weight-bold d-flex">
                                <div class="w-1-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                            </div>
                            <div class="mb-0 px-0 font-weight-bold border-top d-flex">
                                <div class="w-1-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                            </div>
                            <div class="mb-0 px-0 font-weight-bold border-top d-flex">
                                <div class="w-1-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left text-center"><i class="fas fa-check"></i></div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                                <div class="w-1-of-6 border-left">&nbsp;</div>
                            </div>
                            <div class="mb-0 px-0 font-weight-bold border-top d-flex">
                                <div class="w-1-of-6 text-center">×</div>
                                <div class="w-2-of-6 border-left">&nbsp;</div>
                                <div class="w-2-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left text-center">回</div>
                            </div>
                            <div class="mb-0 px-0 font-weight-bold border-top d-flex">
                                <div class="w-1-of-6 text-center">×</div>
                                <div class="w-2-of-6 border-left">&nbsp;</div>
                                <div class="w-2-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left text-center">回</div>
                            </div>
                            <div class="mb-0 px-0 font-weight-bold border-top d-flex">
                                <div class="w-2-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left border-right text-center">月</div>
                                <div class="w-2-of-6">&nbsp;</div>
                                <div class="w-1-of-6 border-left text-center">月</div>
                            </div>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                            <p class="mb-0 font-weight-bold border-top">&nbsp;</p>
                        </div>
                    </div>
                </div>

                <div class="w-100" style="padding-top: 7px">
                    <label class="font-size-20 font-weight-bold mb-0" style="color: #8497b0">（問い合わせ先）SHIFTGATE プラットフォーム運営会社</label>
                    <div class="row pl-1 py-1 pr-4" style="border: 1px solid #4472c4">
                        <p class="font-size-20 font-weight-bold mb-0">株式会社SHIFTGATE （丙）</p>
                        <p>
                            〒104-0061東京都中央区銀座7-3-5 ヒューリック銀座7丁目ビル<br>
                            TEL：0120-915-237<br>
                            FAX:03-6263-9448<br>
                            担当コンシェルジュ：高野
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-3 px-3 pb-5">
            <div class="col col-12 border-black">
                <p class="font-weight-bold font-size-20"><u>契約条項</u></p>
                <div class="row">
                    <div class="col col-1">
                        <p>第1条</p>
                    </div>
                    <div class="col col-11">
                        （契約の目的・成立）　<br>
                        甲は乙に対し本件自動車を前記契約内容の約定により売渡を行い、乙はこれを買受ける。
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col col-1">
                        <p>第2条</p>
                    </div>
                    <div class="col col-11">
                        （所有権移転時期）　<br>
                        本件自動車の所有権は、乙が本件自動車の名義変更を完了完了させた時点で 甲から乙に移転する。
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col col-1">
                        <p>第3条</p>
                    </div>
                    <div class="col col-11">
                        （名義変更）　<br>
                        乙は本契約締結後速やかに名義変更手続きを行い、名義を変更する。
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col col-1">
                        <p>第4条</p>
                    </div>
                    <div class="col col-11">
                        （契約解除）　<br>
                        本件自動車の名義変更完了後は、別途定める場合を除き、甲乙のいずれも本契約を解除することはできない 。
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col col-1">
                        <p>第5条</p>
                    </div>
                    <div class="col col-11">
                        （引渡し後の自己責任）　<br>
                        本件自動車の引渡し後の事故等においては、乙の責任においてすべて処理し、乙は甲に一切の迷惑をかけないものとする。
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col col-1">
                        <p>第6条</p>
                    </div>
                    <div class="col col-11">
                        （瑕疵担保）<br>
                        1. 本件自動車の瑕疵担保期間は本件自動車の引渡し後3日以内とし、<br>
                         この間に乙の責任とはならない瑕疵が発見された場合は、甲の責任においてこれを修理するものとする 。<br>
                        2. 前項の瑕疵の存在によって本契約の目的を達することができない場合には、乙は本契約を解除することができるものとする。<br>
                        3. 甲の乙に対する前2項の責任は、第1項に定める期間に限られ、以後甲は乙に対し何ら責任を負わないものとする。   <br>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col col-1">
                        <p>第７条</p>
                    </div>
                    <div class="col col-11">
                        　（丙に対する委任）　<br>
                        甲および乙は、本契約の履行に関してそれぞれ丙に諸手続きを委任するものとする。
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col col-1">
                        <p>第8条　</p>
                    </div>
                    <div class="col col-11">
                        　（協議・紛争解決）<br>
                        1. 本契約に定めのない事項または本契約に関して紛争が生じた場合には、民法その他の法規の従い甲乙誠意をもって協議解決するものとする。<br>
                        2．前項の協議が不調となった場合など、本契約に関する紛争については、<br>
                        甲乙の居住地を管轄する簡易裁判所または地方裁判所を第一審の専属的合意管轄裁判所として解決するものとする。<br>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col col-1">
                        <p>第9条</p>
                    </div>
                    <div class="col col-11">
                        　（SHIFTGATE利用規約の適用）<br>
                        甲および乙は、本契約条項に定めるもののほか、SHIFTGATE利用規約の定めにそれぞれ従うものとする。
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>
</html>
