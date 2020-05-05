<p><strong>問題</strong></p>
<table width=100%>
    <tr>
        <td width="30%">ID :</td>
        <td>{{ $question->id }}</td>
    </tr>
    <tr>
        <td width="30%">ステータス :</td>
        <td>{{  $question->status ? $question->status->name : null }}</td>
    </tr>
    <tr>
        <td width="30%">作成者 :</td>
        <td>{{ $question->user ? ($question->user->last_name . ' ' . $question->user->first_name) : null }}</td>
    </tr>
    <tr>
        <td width="30%">科目領域 :</td>
        <td>{{ $question->subjectArea ? $question->subjectArea->name : null }}</td>
    </tr>
    <tr>
        <td width="30%">疾患グループ :</td>
        <td>{{ $question->diseaseGroup ? $question->diseaseGroup->name : null }}</td>
    </tr>
    <tr>
        <td width="30%">疾患テーマ :</td>
        <td>{{ $question->diseaseTheme ? $question->diseaseTheme->name : null }}</td>
    </tr>
    <tr>
        <td width="30%">出題疾患 :</td>
        <td>{{ $question->question_disease }}</td>
    </tr>
    <tr>
        <td width="30%">出題内容 :</td>
        <td>{{ $question->question_content }}</td>
    </tr>
    <tr>
        <td width="30%">出題意図 :</td>
        <td>{!! $question->question_intention !!}</td>
    </tr>
    <tr>
        <td width="30%">出題分野 :</td>
        <td>{{  $question->questionField ? $question->questionField->name : null }}</td>
    </tr>
    <tr>
        <td width="30%">タキソノミー :</td>
        <td>{{ $question->taxonomy ? $question->taxonomy->name : null }}</td>
    </tr>
    <tr>
        <td width="30%">予測正答率 :</td>
        <td>{{ $question->predictCorrectAnswerRateByCorrectAnswerRateId ? $question->predictCorrectAnswerRateByCorrectAnswerRateId->name : null }}</td>
    </tr>
    <tr>
        <td width="30%">問題 :</td>
        <td>{!! $question->detail !!}</td>
    </tr>
    <tr>
        <td width="30%">選択肢 :</td>
        <td>{!! $question->choice !!}</td>
    </tr>
    <tr>
        <td width="30%">正解選択肢 (選択肢(1)〜(5)から一つ選択) :</td>
        <td>{!! $question->correct_choice !!}</td>
    </tr>
    <tr>
        <td width="30%">解説 :</td>
        <td>{!! $question->explanation !!}</td>
    </tr>
    <tr>
        <td width="30%">参考文献 :</td>
        <td>{!! $question->reference !!}</td>
    </tr>
    <tr>
        <td width="30%">登録日 :</td>
        <td>{{ $question->created_at }}</td>
    </tr>
    <tr>
        <td width="30%">問題正答率 :</td>
        <td>{{ $predictCorrectAnswerRate }}</td>
    </tr>
</table>
<p><strong> 査読評価 </strong></p>
<table width=100%>
    <tr>
        <td width="30%">査読者 :</td>
        <td>{{ $reviewer ? $reviewer->last_name . ' ' . $reviewer->first_name : null }}</td>
    </tr>
    <tr>
        <td width="30%">評価 :</td>
        <td>{{ $reviewEvaluation }}</td>
    </tr>
    <tr>
        <td width="30%">不適切理由 :</td>
        <td>{!! $arrReason !!}</td>
    </tr>
    <tr>
        <td width="30%">予測正答率 :</td>
        <td>{{ $questionReviewPredictCorrectAnswerRate ? $questionReviewPredictCorrectAnswerRate->name : null }}</td>
    </tr>
    <tr>
        <td width="30%">コメント :</td>
        <td>{!! !$question->questionReviews->isEmpty() ? $question->questionReviews[0]->comment : null !!}</td>
    </tr>
    <tr>
        <td width="30%">査読日 :</td>
        <td>{{ !$question->questionReviews->isEmpty() ? $question->questionReviews[0]->review_date : null }}</td>
    </tr>
</table>