<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\modules\i18n\Module;
use backend\components\BreadcrumbHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$labels = \backend\models\Location::getLabels();
BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge($labels, [
    'type' => 'index'
]));
?>
<div class="location-index">

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
                'attribute' => 'country_id',
                'label'     => Module::t('Country'),
                'value'     => function ($model) {
                    return $model->country->country_name;
                },
                'filter'    => Html::activeDropDownList($searchModel, "country_id",
                    ['' => ''] + \backend\models\Country::listAll('id', 'country_name'),
                    ['class' => 'form-control'])
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
