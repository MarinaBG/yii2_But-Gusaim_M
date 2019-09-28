<?
namespace app\models;
use yii\base\Model;


class NewEventForm extends Model{
    public $title;
    public $description;
    public $start_time;
    public $end_time;
    public $day;
    public $month;
    public $year;
    public $author;

    public function attributeLabels() {
        return [
            'title' => 'Название события',
            'description' => 'Описание события',
            'start_time' => 'Начало события',
            'end_time' => 'Окончание события',
            'author' => 'Автор',
        ];
    }

    public function rules() {
        return [
            [ ['title', 'start_time', 'end_time', 'author', ], 'required', 'message' => 'Поле обязательно для заполнения' ],
            [ 'title', 'string', 'min' => 4, 'tooShort' => 'Слишком короткое название'],
            [ 'title', 'string', 'max' => 40, 'tooLong' => 'Слишком длинное название'],
            [ 'author', 'string', 'min' => 4, 'tooShort' => 'Слишком короткое имя'],
            [ 'author', 'string', 'max' => 40, 'tooLong' => 'Слишком длинное имя'],
            [ 'description', 'trim' ],
            [ 'description', 'string', 'max' => 500, 'tooLong' => 'Описание события должно быть менее 500 символов' ],            
        ];
    }
}