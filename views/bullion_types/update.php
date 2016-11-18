<?php

use yii\helpers\Html;
use backend\components\BreadcrumbHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\BullionType */

BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge(\backend\models\BullionType::getLabels(), [
    'type' => 'update'
]), $model);
?>
<div class="bullion-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'      => $model,
        'metalSlugs' => \backend\models\BullionType::getMetalParseSlugs(),
    ]) ?>

</div>
