<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Activity;
use app\models\Day;

class ActivityController extends Controller {
    public function actionIndex() {
        return "Контроллер активностей";
    }

    public function getGreeting() {
        $now = date('H');

        if ($now >= 0 && $now < 6) {
            return 'Доброй ночи!';
        }
        if ($now >= 6 && $now < 12) {
            return 'Доброе утро!';
        }
        if ($now >= 12 && $now < 18) {
            return 'Добрый день!';
        }
        if ($now >= 18 && $now <= 24) {
            return 'Добрый вечер!';
        }  
        
        return 'Доброго времени суток!';
    }

    public function actionCreate() {
        // return "Создание активности";
        $model = new Activity();

        return $this->render('index', [
            'model' => $model,
            'greeting' => $this->getGreeting()
        ]);
    }

    public function actionDay() {
        $model = new Day();
        $model->typeOfDay = Day::WORKDAY;
        $model->addActivity();

        return $this->render('day', [
            'model' => $model,
            'greeting' => $this->getGreeting()
        ]);
    }

}






