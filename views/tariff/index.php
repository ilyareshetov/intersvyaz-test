<?php

use app\models\Tariff;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TariffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tariffs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tariff-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tariff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class'=>'kartik\grid\SerialColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
            ],

            'id',
            'price',
            'title',
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'speed',
                'editableOptions' => [
                    'header' => 'Speed',
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                    'options' => [
                        'pluginOptions' => ['min' => 0, 'max' => 5000]
                    ],
                    'formOptions' => ['action' => ['/tariff/edittariff']]
                ],
                'hAlign' => 'right',
                'vAlign' => 'middle',
                'width' => '7%',
                'format' => ['integer'],
                'pageSummary' => true
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Tariff $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
