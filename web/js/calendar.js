class Calendar {
	constructor() {
        this.setEventsShowDay();
        this.setEventsShowEvent();
        this.setEventsAddEvent();
    }
    
    requestGetEventInfo(data) {
        $.ajax({
            method: "GET",
            url: 'index.php?r=calendar/event',
            data: data,
            context: this,
            dataType: "json",
            error: function (request, status, error) {
                console.log(error);
            },
        }).done(function(response) {
            let str = this.createEvent(response);
            //console.log(response);
            // this.showMessage(str, 'popup'); 
            $('.modal-body').empty();
            $('.modal-body').append(str);

        });
    }

	setEventsShowDay() {
		$('.day').on('click', function(event) {
            let data = {};

            data.year = parseInt($(event.target).attr('year'));
            data.month = parseInt($(event.target).attr('month'));
            data.day = parseInt($(event.target).attr('day'));
            // console.log(data);

            document.location.href = 'index.php?r=calendar/index&m='+ data.month + '&y=' + data.year + '&d=' + data.day;
            
        });
    }

    setEventsShowEvent() {
        let self = this;
        if($('.showEvent')) {
            $('.showEvent').on('click', function(event) {
                let data = {};
    
                data.eventId = parseInt($(event.currentTarget).attr('id'));
                data.day = parseInt($(event.currentTarget).attr('day'));
                data.month = parseInt($(event.currentTarget).attr('month'));
                data.year = parseInt($(event.currentTarget).attr('year'));
                self.requestGetEventInfo(data);
            });
        }              
    }
    // setEventsShowEvent() {
    //     let self = this;
    //     if($('.eventItemWrapper')) {
    //         $('.eventItemWrapper').on('click', function(event) {
    //             let data = {};
    
    //             data.eventId = parseInt($(event.currentTarget).attr('id'));
    //             data.day = parseInt($(event.currentTarget).attr('day'));
    //             data.month = parseInt($(event.currentTarget).attr('month'));
    //             data.year = parseInt($(event.currentTarget).attr('year'));
    //             self.requestGetEventInfo(data);
    //         });
    //     }      
        
    // }

    setEventsAddEvent() {
        let self = this;
        if($('.addEvent')) {
            $('.addEvent').on('click', function(event) {
                self.showMessage('', 'addEventFormWrapper'); 
            });
        }       
    }

    

    createEvent(obj) {
        let str = `<div class="eventTitle">
            <h3>`+ obj['activity_name'] +`</h3>
        </div>
        <div class="modEventTime">
            <p class="hour">` + obj['date_start'] + ` - ` +  obj['date_end'] + `</p>
            <p class="date">` + obj['eventDate'] + `</p>
        </div>
        <div class="modEventAuthor">
            <p class="authorTitle">Автор:</p>
            <p class="authorName">` + obj['users']['user_name'] + `</p>
        </div>
        <div class="modEventDescription">
            <p class="descriptionTitle">Описание события:</p>
            <p class="descriptionText">`
                 + obj['comment'] +
            `</p>
        </div>
        <button type="button" class="btn btn-primary editEvent" id="` + obj['id_activity'] + `">Редактировать событие</button>`;

        // let a = arr;
        // alert(arr);

        return str;

    }

    showMessage(str, className) {     
        if (str) {
            $('.' + className + '_text').html(str);
        } 

        $('.' + className).fadeIn(400); 

        $('.' + className + '_cancel').click(function(){	  
            $('.' + className).fadeOut(400);	
				setTimeout(function() {	
				$('.' + className).css('display', 'none'); 
                }, 400);
        });         
    }
}

$(document).ready(function(){
	window.cart = new Calendar();
});