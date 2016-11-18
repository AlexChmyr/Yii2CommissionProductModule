<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'location_id') ?>

    <?= $form->field($model, 'bullion_type_id') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'bullion_description_id') ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <?php // echo $form->field($model, 'pallet') ?>

    <?php // echo $form->field($model, 'bar_number') ?>

    <?php // echo $form->field($model, 'weight_amount') ?>

    <?php // echo $form->field($model, 'weight_measure') ?>

    <?php // echo $form->field($model, 'percentage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
