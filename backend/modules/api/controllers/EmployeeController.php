<?php

namespace backend\modules\api\controllers;

use backend\modules\api\models\Employee;
use yii\web\Response;

class EmployeeController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionCreate(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $employee = new Employee();
        $employee->scenario = Employee::SCENARIO_CREATE;
        $employee->attributes = \Yii::$app->request->post();
        if ($employee->save()){
            return [
                'status' => true,
                'message' => 'OK'
            ];
        } else {
            return [
                'status' => false,
                'data' => $employee->errors
            ];
        }
    }

}
