<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\BreadcrumbHelper;
use common\modules\i18n\Module;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BullionTypeDescriptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge(\backend\models\BullionTypeDescription::getLabels(), [
    'type' => 'index'
]));
?>
<div class="bullion-type-description-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('Create') . ' ' . Module::t('Bullion type description'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [
                'attribute' => 'bullion_type_id',
                'label'     => Module::t('Bullion Type'),
                'value'     => function ($model) {
                    return $model->bullionType->name;
                },
                'filter'    => Html::activeDropDownList($searchModel, "bullion_type_id",
                    ['' => ''] + \backend\models\BullionTypeDescription::getBullionDropdown(),
                    ['class' => 'form-control'])
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
