<?php

namespace backend\modules\products\controllers;

use backend\controllers\AuthController;
use backend\controllers\CRUDController;
use backend\models\Country;
use developeruz\db_rbac\behaviors\AccessBehavior;
use Yii;
use backend\models\Location;
use backend\models\search\LocationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocationsController implements the CRUD actions for Location model.
 */
class LocationsController extends CRUDController
{

    public function init()
    {
        $this->beanClass = Location::className();
        $this->beanSearchClass = LocationSearch::className();
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function actionCreate($extraParams = [])
    {
        $extraParams = [
            'countries' => Country::listAll('id', 'country_name')
        ];
        return parent::actionCreate($extraParams); // TODO: Change the autogenerated stub
    }

    public function actionUpdate($id, $returnModel = false, $extraParams = [])
    {
        $extraParams = [
            'countries' => Country::listAll('id', 'country_name')
        ];
        return parent::actionUpdate($id, $returnModel, $extraParams); // TODO: Change the autogenerated stub
    }

    public function actionTestReportPrice()
    {
        $location = Location::findOne(1);
        $price = Location::getPricePercentageByBullionType(2);
        var_dump($price);
    }

}
