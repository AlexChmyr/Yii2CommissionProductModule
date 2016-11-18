<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\modules\i18n\Module;
use backend\components\BreadcrumbHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BullionTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$labels = \backend\models\BullionType::getLabels();
BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge($labels, [
    'type' => 'index'
]));
?>
<div class="bullion-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= \backend\widgets\FormButtons::widget([
            'model' =>  false,
            'type'  =>  'create',
            'modelLabel'    =>  $labels['singular']
        ]);?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            [
                'attribute' => 'metal_parse_slug',
                'filter'    => Html::activeDropDownList($searchModel, "metal_parse_slug",
                    ['' => ''] + \backend\models\BullionType::getMetalParseSlugs(),
                    ['class' => 'form-control'])
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
