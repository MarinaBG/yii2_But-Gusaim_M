<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Calendar;
use app\models\NewEventForm;

class CalendarController extends Controller {
    public function actionIndex() {
        $model = new Calendar();
        $form = new NewEventForm();

        if ( $form->load(Yii::$app->request->post()) ) {
            if ( $form->validate() ) {
                Yii::$app->session->setFlash('success', 'Новое событие добавлено');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка передачи данных');
            }
        }
        
        return $this->render('index', [
            'month' => $model->getMonth($_GET['m'], $_GET['y']),
            'dayEvents' => $model->getDay($_GET['m'], $_GET['y'], $_GET['d']),
            'eventForm' => $form,
        ]);
    }

    public function actionEvent() {
        $model = new Calendar();

        return $model->getEventInfo($_GET['eventId']);
    }
}