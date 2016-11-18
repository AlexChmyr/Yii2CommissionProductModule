<?php

use yii\helpers\Html;
use backend\components\BreadcrumbHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\BullionTypeDescription */

BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge(\backend\models\BullionTypeDescription::getLabels(), [
    'type' => 'update'
]), $model);
?>
<div class="bullion-type-description-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'    => $model,
        'bullions' => $bullions
    ]) ?>

</div>
