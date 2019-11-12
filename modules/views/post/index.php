<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Файлы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
        <?= Html::a('Создать файл', ['create'], ['class' => 'btn btn-success']);?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'title',
            'predmet',
            'description',
            'file',

            ['class' => 'yii\grid\ActionColumn'],
            ['attribute'=>'Сылка на скачивание',
            'format'=>'raw',
            'value' => function($data)
                {
                    return Html::a('Скачать файл', ['download', 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
