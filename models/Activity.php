<?php
namespace app\models;
use yii\base\Model;

class Activity extends Model {
    const NEVER = 'Никогда';
    const EVERY_DAY = 'Каждый день';
    const EVERY_WEEK = 'Каждую неделю';
    const EVERY_MONTH = 'Каждый месяц';

    public $title;
    public $startDate;
    public $endDate;
    public $idAuthor;
    public $body;
    public $repeat;
    public $blocking;

    public function attributeLabels() {
        return [
            'title' => 'Название события',
            'startDate' => 'Дата начала события',
            'endDate' => 'Дата завершения события',
            'idAuthor' => 'ID автора',
            'body' => 'Описание события',
            'repeat' => 'Повторять событие',
            'blocking' => 'Блокирующее событие'
        ];
    }
}
