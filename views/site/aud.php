<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$form = ActiveForm::begin();



    echo $form->field($model, 'name')->textInput(['autofocus' => true])->label("Имя");
    echo $form->field($model, 'num')->dropDownList($drop)->label("Выберити аудиторию");
    echo $form->field($model,'time')->input('datetime-local')->label('Выбирите время');
    echo Html::submitButton('Забронировать', ['class' => 'btn btn-primary', 'name' => 'contact-button']);
ActiveForm::end();
?>