<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\models\Post */

$this->title = 'Редактировать Файл: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Файл', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>