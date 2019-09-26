<?php
namespace app\models;
use yii\base\Model;
use app\models\Activity;

class Day extends Model {
    const WORKDAY = 'Рабочий день';
    const HOLIDAY = 'Выходной день';

    public $typeOfDay;
    public $activities;

    public function attributeLabels() {
        return [
            'typeOfDay' => 'Выходной / рабочий день',
            'activities' => 'События',
        ];
    }

    public function addActivity() {
        $activity = new Activity();

        $activity->title = 'Новое событие';
        $activity->startDate = date("Y-m-d");
        $activity->endDate = date("Y-m-d");
        $activity->idAuthor = 'Автор';
        $activity->body = 'Какое-то описание события';
        $activity->repeat = $activity::NEVER;
        $activity->blocking = false;

        if (!$this->activities) {
            $this->activities = [];
        }

        array_push($this->activities, $activity);
    }

    public function getActivitiesNames() {
        return [
            'typeOfDay' => 'Выходной / рабочий день',
            'activities' => 'События',
        ];
    }
}