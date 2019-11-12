<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Загрузка файла:';
$this->params['breadcrumbs'][] = ['label' => 'Файл', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'file')->fileInput(['maxSize' => 104857600]) ?>
     


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
