<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\modules\i18n\Module;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?
                $model->customer_number = $model->getCustomerNumber();
                echo $form->field($model, 'customer_number')->textInput(['class' => 'form-control']);
                ?>
                <div id="customer-name"></div>
            </div>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'date_registrated')->widget(\yii\jui\DatePicker::className(),
                [
                    'options' => [
                        'class' => 'form-control'
                    ]
                ]
            )->label(Module::t('Dateregistrated')) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'location_id')->dropDownList($dropdowns['locations']) ?>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label><?= Module::t('VAT')?></label>
                <div>
                    <span id="vat-from-location"></span> %
                </div>
                <div>
                    <? $isCustomVAT = isset($model->vat); ?>
                    <label for="checkbox-set-vat"><?= Module::t('Set VAT manually:') ?></label>
                    <?= Html::checkbox('', $isCustomVAT, ['id' => 'checkbox-set-vat']) ?>
                    <div class="<?= $isCustomVAT ? '' : 'hidden' ?>">
                        <?= $form->field($model, 'vat')->textInput()->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'bullion_type_id')->dropDownList($dropdowns['bullionTypes'], ['id' => 'product-bullion_type_id']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'amount')->textInput() ?>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'bullion_description_id')->dropDownList([], ['class' => 'form-control']) ?>
            <?= Html::hiddenInput('', $model->bullion_description_id, ['id' => 'pick-bullion_description_id']); ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'brand_id')->dropDownList($dropdowns['brands']) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'pallet')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'bar_number')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'percentage')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'weight_amount')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'weight_measure')->dropDownList($dropdowns['weightMeasures']) ?>
        </div>
    </div>

    <?= \backend\widgets\FormButtons::widget([
        'model' => $model
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
