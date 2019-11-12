<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Файлы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
                 
                  if($model->file==NULL){

       
            echo  Html::a('Загрузить файл', ['set-file', 'id' => $model->id], ['class' => 'btn btn-default']);
        }

        ?>

           
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить этот файл?',
                'method' => 'post',
            ],
        ]) ?>
    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description',
            'file',
        ],
    ]) ?>
    <?php 
          echo  Html::a('Скачать файл', ['download', 'id' => $model->id]);
          ?>
          
    </p>

</div>
