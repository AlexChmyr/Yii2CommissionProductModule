<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\components\BreadcrumbHelper;
use common\modules\i18n\Module;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge(\backend\models\Product::getLabels(), [
    'type'        => 'view',
    'customTitle' => $model->getDescription()
]), $model);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= \backend\widgets\DetailViewButtons::widget([
        'model' => $model
    ]) ?>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'location_id',
                'label'     => Module::t('Location'),
                'value'     => $model->location->name,
            ],
            [
                'attribute' => 'bullion_type_id',
                'label'     => Module::t('Bullion Type'),
                'value'     => $model->bullionType->name,
            ],
            'amount',
            [
                'attribute' => 'bullion_description_id',
                'label'     => Module::t('Bullion type description'),
                'value'     => $model->bullionTypeDescription->name,
            ],
            [
                'attribute' => 'brand_id',
                'label'     => Module::t('Brand'),
                'value'     => $model->brand->name,
            ],
            'pallet',
            'bar_number',
            'weight_amount',
            'weight_measure',
            [
                'attribute' => 'percentage',
                'label'     => Module::t('Percentage'),
                'value'     => $model->getPercentage(),
            ],
        ],
    ]) ?>

</div>
