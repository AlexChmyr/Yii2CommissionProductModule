<?php

namespace backend\modules\products\controllers;

use backend\controllers\AuthController;
use backend\controllers\CRUDController;
use developeruz\db_rbac\behaviors\AccessBehavior;
use Yii;
use backend\models\BullionType;
use backend\models\search\BullionTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BullionTypeController implements the CRUD actions for BullionType model.
 */
class BullionTypeController extends CRUDController
{

    public function init()
    {
        $this->beanClass = BullionType::className();
        $this->beanSearchClass = BullionTypeSearch::className();
        parent::init(); // TODO: Change the autogenerated stub
        $this->viewPath = "@backend" . "/" . "modules" . "/" . "products" . "/" . "views" . "/" . "bullion_types";
    }

    public function actionCreate($extraParams = [])
    {
        $extraParams = [
            'metalSlugs' => BullionType::getMetalParseSlugs()
        ];
        return parent::actionCreate($extraParams); // TODO: Change the autogenerated stub
    }

    public function  actionUpdate($id, $returnModel = false, $extraParams = [])
    {
        $extraParams = [
            'metalSlugs' => BullionType::getMetalParseSlugs()
        ];
        return parent::actionUpdate($id, $returnModel, $extraParams); // TODO: Change the autogenerated stub
    }
}
