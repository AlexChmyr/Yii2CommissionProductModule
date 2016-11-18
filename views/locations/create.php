<?php

use yii\helpers\Html;
use backend\components\BreadcrumbHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */

BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge(\backend\models\Location::getLabels(), [
    'type' => 'create'
]), $model);
?>
<div class="location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'    => $model,
        'countries' => $countries
    ]) ?>

</div>
