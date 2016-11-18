<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\components\BreadcrumbHelper;
use \common\modules\i18n\Module;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */

BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge(\backend\models\Location::getLabels(), [
    'type' => 'view'
]), $model);
?>
<div class="location-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= \backend\widgets\DetailViewButtons::widget([
        'model' => $model
    ]) ?>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'country_id',
                'label' => Module::t('Country'),
                'value' => $model->country->country_name
            ]
        ],
    ]) ?>

</div>
