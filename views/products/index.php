<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\BreadcrumbHelper;
use common\modules\i18n\Module;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$labels = \backend\models\Product::getLabels();
BreadcrumbHelper::set($this, \yii\helpers\ArrayHelper::merge($labels, [
    'type' => 'index'
]));
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= \backend\widgets\FormButtons::widget([
            'model'      => false,
            'type'       => 'create',
            'modelLabel' => $labels['singular']
        ]); ?>
        <? if (\common\models\User::isCustomer()): ?>
            <a href="<?= \yii\helpers\Url::toRoute(['/customers/customers/generate-confirm-pdf']) ?>"
               class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> <?= Module::t('Generate PDF') ?></a>
        <? endif; ?>
    </p>
    <?
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'customer_number',
            'value'     => function ($model) {
                return $model->getCustomerNumber();
            }
        ],
        'bar_number',
        [
            'attribute' => 'bullion_type_id',
            'label'     => Module::t('Bullion Type'),
            'value'     => function ($model) {
                return $model->bullionType->name;
            },
            'filter'    => Html::activeDropDownList($searchModel, "bullion_type_id",
                ['' => ''] + \backend\models\Product::getBullionTypeDropdown(),
                ['class' => 'form-control'])
        ],
        [
            'attribute' => 'customer_id',
            'label'     => Module::t('Customers'),
            'value'     => function ($model) {
                return $model->getCustomerList();
            },
            'visible'   => !\common\models\User::isCustomer(),
            'filter'    => Html::activeDropDownList($searchModel, "customer_id",
                ['' => ''] + \backend\models\Customer::listAll('id', 'name'),
                ['class' => 'form-control'])
        ],
        [
            'attribute' => 'bullion_description_id',
            'label'     => Module::t('Bullion type description'),
            'value'     => function ($model) {
                return $model->bullionTypeDescription->name;
            },
            'filter'    => Html::activeDropDownList($searchModel, "bullion_description_id",
                ['' => ''] + \yii\helpers\ArrayHelper::map(\backend\models\BullionTypeDescription::find()->all(), 'id', 'name'),
                ['class' => 'form-control'])
        ],

        [
            'attribute' => 'date_registrated',
            'label'     => Module::t('Dateregistrated'),
            'value'     => function ($model) {
                return \common\components\TimeDate::convertFromDB($model->date_registrated);
            },
            'filter'    => \yii\jui\DatePicker::widget([
                'class'     => 'form-control',
                'model'     => $searchModel,
                'attribute' => 'date_registrated',
                'options'   => [
                    'class' => 'form-control'
                ]
            ]),
            'format'    => 'html'
        ],

        [
            'class'    => 'yii\grid\ActionColumn',
            'buttons'  => [
                'hide' => function ($url, $model) {
                    $icon = "dot-circle-o";
                    if (!$model->is_active) {
                        $icon = "circle-o";
                    }
                    return Html::a('<span class="fa fa-' . $icon . '"></span> ', $url);
                }
            ],
            'template' => \backend\components\SiteHelper::getListTemplate([
                'hide', 'view', 'update', 'delete'
            ])
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => $columns,
    ]); ?>
</div>
