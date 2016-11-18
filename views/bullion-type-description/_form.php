<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\modules\i18n\Module;

/* @var $this yii\web\View */
/* @var $model backend\models\BullionTypeDescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bullion-type-description-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bullion_type_id')->dropDownList($bullions)->label(Module::t('Bullion Type')) ?>

    <?
    echo \backend\widgets\FormButtons::widget([
        'model' => $model
    ]);
    ?>

    <?php ActiveForm::end(); ?>

</div>
