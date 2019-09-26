<?php
namespace app\controllers;
use yii\web\Controller;

class TaskController extends Controller {
    public function actionIndex() {
        echo 'Index';
        exit;
    }

    public function actionTest() {
        echo 'Hello, World!';
        exit;
    }
}
