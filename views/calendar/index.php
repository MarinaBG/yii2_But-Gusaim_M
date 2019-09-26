<?
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\datetime\DateTimePicker;
?>

<h2>Календарь событий</h2>

<div class="calendarWrapper">
    

    <div class="monthWrapper" month="<?= $month[2] ?>" year="<?= $month[3]?>">        
        <div class="calendarHeader">
            <svg class="arrow" month="<?= $month[2]?>" year="<?= $month[3]?>" id="arrow-left" x="0px" y="0px" viewBox="0 0 31.494 31.494">
                <path d="M10.273,5.009c0.444-0.444,1.143-0.444,1.587,0c0.429,0.429,0.429,1.143,0,1.571l-8.047,8.047h26.554
                    c0.619,0,1.127,0.492,1.127,1.111c0,0.619-0.508,1.127-1.127,1.127H3.813l8.047,8.032c0.429,0.444,0.429,1.159,0,1.587
                    c-0.444,0.444-1.143,0.444-1.587,0l-9.952-9.952c-0.429-0.429-0.429-1.143,0-1.571L10.273,5.009z"/>
            </svg>
        
            <h3><?= $month[1][0] ?> <?= $month[3]?></h3>
            <svg class="arrow" month="<?= $month[2]?>" year="<?= $month[3]?>" id="arrow-right" x="0px" y="0px" viewBox="0 0 31.49 31.49">
                <path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111
                    C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587
                    c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
            </svg>
        </div>

        <table class="table table-bordered table-responsive monthTable" month="<?= $month[2] ?>" year="<?= $month[3]?>">
            <thead>
                <tr>
                    <th scope="col" class="workingDay">Понедельник</th>
                    <th scope="col" class="workingDay">Вторник</th>
                    <th scope="col" class="workingDay">Среда</th>
                    <th scope="col" class="workingDay">Четверг</th>
                    <th scope="col" class="workingDay">Пятница</th>
                    <th scope="col" class="holiday">Суббота</th>
                    <th scope="col" class="holiday">Воскресенье</th>
                </tr>
            </thead>
            <tbody>
                <? foreach( $month[0] as $weeks ): ?>
                    <tr class="week">
                        <? foreach( $weeks as $day ): ?>
                            <? if($day == date('j')) : ?>
                                <td>
                                    <div class="day active" day="<?= $day?>" month="<?= $month[2]?>" year="<?= $month[3]?>"><?= $day?></div>
                                </td>
                            <? else: ?>
                                <td>
                                    <? if($day != '') : ?>
                                        <div class="day" day="<?= $day?>" month="<?= $month[2]?>" year="<?= $month[3]?>"><?= $day?></div>
                                    <? endif; ?>
                                </td>
                            <? endif; ?>
                        <? endforeach; ?>
                    </tr>  
                <? endforeach; ?>
            </tbody>
        </table>
    </div>

    <? if($dayEvents != 0) : ?>        
        <div class="dayEventsWrapper" year="" month="" day="">
            <div class="dayEvents">
                <h3><?= $dayEvents[3] ?>, <?= $dayEvents[2] ?> <?= $dayEvents[1][1] ?></h3>
                <div class="dayEvent">
                    <? foreach( $dayEvents[0] as $event ): ?>
                        <div class="eventItemWrapper" id="<?= $event['id'] ?>">
                            <div class="eventLine"></div>
                            <div class="eventTime"><?= $event['start_time'] ?></div>
                            
                            <div class="eventDescription">
                                <p class="eventTitle"><?= $event['title'] ?></p>
                                <p class="eventAuthor"><?= $event['author'] ?></p>
                            </div>                            
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
            <button type="button" class="btn btn-primary addEvent" year="<?= $dayEvents[5] ?>" month="<?= $dayEvents[4] ?>" day="<?= $dayEvents[2] ?>">Добавить событие</button>
        </div>
    <? endif; ?>
</div> 

<div class="popup" style="display: none"><div class="popup_bg"><div class="popup_wrapper">
    <div class="popup_text">
    </div>
    <svg class="popup_cancel" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.9 21.9" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 21.9 21.9" fill="#fefefe">
        <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z"/>
    </svg>
</div></div></div>

<div class="addEventFormWrapper" style="display: none"><div class="addEventFormWrapper_bg"><div class="addEventFormWrapper_wrapper">
    <? $form = ActiveForm::begin(['options' => ['id' => 'newEventForm']]) ?>
        
    
    <div class="addEventFormWrapper_text">
        <div class="eventTitle">
            <?= $form->field($eventForm, 'title')->textInput()?>
        </div>

        <div class="eventTime">
            <?= $form->field($eventForm, 'start_time')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Начало'],
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                    ]
                ]);?>
            <?= $form->field($eventForm, 'end_time')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Окончание'],
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                    ]
                ]);?>
        </div>

        <div class="eventAuthor">
            <?= $form->field($eventForm, 'author')?>
        </div>

        <div class="eventDescription">
            <?= $form->field($eventForm, 'description')->textarea(['rows' => 10])?>
        </div>
        
        <?= Html::submitButton('Добавить событие', ['class' => 'btn btn-success']) ?>
    </div>
    <? ActiveForm::end() ?>
    
    <svg class="addEventFormWrapper_cancel" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.9 21.9" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 21.9 21.9" fill="#fefefe">
        <path d="M14.1,11.3c-0.2-0.2-0.2-0.5,0-0.7l7.5-7.5c0.2-0.2,0.3-0.5,0.3-0.7s-0.1-0.5-0.3-0.7l-1.4-1.4C20,0.1,19.7,0,19.5,0  c-0.3,0-0.5,0.1-0.7,0.3l-7.5,7.5c-0.2,0.2-0.5,0.2-0.7,0L3.1,0.3C2.9,0.1,2.6,0,2.4,0S1.9,0.1,1.7,0.3L0.3,1.7C0.1,1.9,0,2.2,0,2.4  s0.1,0.5,0.3,0.7l7.5,7.5c0.2,0.2,0.2,0.5,0,0.7l-7.5,7.5C0.1,19,0,19.3,0,19.5s0.1,0.5,0.3,0.7l1.4,1.4c0.2,0.2,0.5,0.3,0.7,0.3  s0.5-0.1,0.7-0.3l7.5-7.5c0.2-0.2,0.5-0.2,0.7,0l7.5,7.5c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.4-1.4c0.2-0.2,0.3-0.5,0.3-0.7  s-0.1-0.5-0.3-0.7L14.1,11.3z"/>
    </svg>
    
</div></div></div>



