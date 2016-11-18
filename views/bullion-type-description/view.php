<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\components\BreadcrumbHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\BullionTypeDescription */

BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge(\backend\models\BullionTypeDescription::getLabels(), [
    'type' => 'view'
]), $model);
?>
<div class="bullion-type-description-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= \backend\widgets\DetailViewButtons::widget([
        'model' => $model
    ]) ?>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'name',
            [
                'value'     => $model->bullionType->name,
                'label' =>  \common\modules\i18n\Module::t('Bullion Type')
            ]
        ],
    ]) ?>

</div>
