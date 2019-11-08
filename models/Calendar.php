<?php
namespace app\models;
use yii\base\Model;
// use yii\base\Activities;

class Calendar extends Model {
    public $months;
    public $days;

    public function init() {
        parent::init();
        $this->months = $this->getMonths();
        $this->days = $this->getDays();
    }

    public function getMonths() {
        $months = [
            ['Январь', 'января'],
            ['Февраль', 'февраля'],
            ['Март', 'марта'],
            ['Апрель', 'апреля'],
            ['Май', 'мая'],
            ['Июнь', 'июня'],
            ['Июль', 'июля'],
            ['Август', 'августа'],
            ['Сентябрь', 'сентября'],
            ['Октябрь', 'октября'],
            ['Ноябрь', 'ноября'],
            ['Декабрь', 'декабря']
        ];
        return $months;
    }

    public function getDays() {
        $days = [
            'Вс',
            'Пн',
            'Вт',
            'Ср',
            'Чт',
            'Пт',
            'Сб'            
        ];
        return $days;
    }

    
    public function getDayEvents($getDayStr) {
        // $day = [];
        // array_push($day, [ 'id' => 1, 'start_time' => '10:00', 'end_time' => '12:00', 'day' => '25', 'month' => '9', 'monthName' => 'сентября', 'year' => '2019', 'title' => 'Собрание', 'author' => 'Иванов', 'description' => 'Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа форм развития. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение форм развития. Задача организации, в особенности же рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям.']);
        // array_push($day, [ 'id' => 2, 'start_time' => '12:00', 'end_time' => '13:00', 'day' => '25', 'month' => '9', 'monthName' => 'сентября', 'year' => '2019', 'title' => 'Бизнес-Ланч', 'author' => 'Иванов', 'description' => 'Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа форм развития. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение форм развития. Задача организации, в особенности же рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям.']);
        // array_push($day, [ 'id' => 3, 'start_time' => '15:00', 'end_time' => '17:00', 'day' => '25', 'month' => '9', 'monthName' => 'сентября', 'year' => '2019', 'title' => 'Презентация проекта', 'author' => 'Иванов', 'description' => 'Разнообразный и богатый опыт укрепление и развитие структуры требуют от нас анализа форм развития. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение форм развития. Задача организации, в особенности же рамки и место обучения кадров влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям.']);
        // return $day;
        $dayEvents = Activities::find()->with('users')->asArray()->where(['like', 'date_start', $getDayStr])->all();
        return $dayEvents;
    }

    
    public function getEventInfo($id, $day, $month, $year) {
        $event = Activities::find()->with('users')->asArray()->where(['id_activity' => $id])->one();

        $event['eventDate'] = $day.' '.$this->getMonthName($month)[1].' '.$year;
        $event['date_start'] = substr((explode(" ", $event['date_start']))[1], 0, 5);
        $event['date_end'] = substr((explode(" ", $event['date_end']))[1], 0, 5);       

        return json_encode($event);
        //return $event;
    }

    public function getMonth($month, $year) {
        $dayofmonth = date('t');
        $day_count = 1;

        $num = 0;

        for($i = 0; $i < 7; $i++) {
            $dayofweek = date('w', mktime(0, 0, 0, $month, $day_count, $year));

            $dayofweek = $dayofweek - 1;

            if($dayofweek == -1) $dayofweek = 6;

            if($dayofweek == $i) {
                $weeks[$num][$i] = $day_count;
                $day_count++;
            } else {
                $weeks[$num][$i] = "";
            }
        }

        while(true) {
            $num++;

            for($i = 0; $i < 7; $i++) {
                $weeks[$num][$i] = $day_count;
                $day_count++;

                if($day_count > $dayofmonth) {
                    if ($i < 7) {
                        $i++;
                        while ($i < 7) {
                            $weeks[$num][$i] = "";
                            $i++;
                        }
                    }
                    break;
                }
            }
            if($day_count > $dayofmonth) break;
        }
        
        return [$weeks, $this->getMonthName($month), $month, $year];
    }
    
    public function getMonthName($month) {
        $monthNum = $month - 1;

        foreach ($this->months as $key => $value) {
            if ($key == $monthNum) {
                return $value;
            }
        }
    }

    public function getDayName($day, $month, $year) {
        $dayofweek = date('w', mktime(0, 0, 0, $month, $day, $year));
        foreach ($this->days as $key => $value) {
            if ($key == $dayofweek) {
                return $value;
            }
        }
    }

    public function getDateStr($month, $year, $day) {
        $dayStr = $year.'-';

        if ($month < 10) {
            $dayStr.='0'.$month.'-';
        }
        else {
            $dayStr.=$month.'-';
        }

        if ($day < 10) {
            $dayStr.='0'.$day;
        }
        else {
            $dayStr.=$day;
        }

        return $dayStr;
    }


    public function getDay($month, $year, $day) {
        if ($month && $year && $day) {
            $getDayStr = $this->getDateStr($month, $year, $day);
            $dayEvents = $this->getDayEvents($getDayStr);
            // return $dayEvents;
            if ($dayEvents) {
                return [ $dayEvents, $this->getMonthName($month), $day, $this->getDayName($day, $month, $year), $month, $year ] ;
            }
            else {
                return [ 0, $this->getMonthName($month), $day, $this->getDayName($day, $month, $year), $month, $year ] ;
            }
        }
    }

 
}