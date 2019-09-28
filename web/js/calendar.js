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
            this.showMessage(str, 'popup'); 
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
        if($('.eventItemWrapper')) {
            $('.eventItemWrapper').on('click', function(event) {
                let data = {};
    
                data.eventId = parseInt($(event.currentTarget).attr('id'));
                self.requestGetEventInfo(data);
            });
        }      
        
    }

    setEventsAddEvent() {
        let self = this;
        if($('.addEvent')) {
            $('.addEvent').on('click', function(event) {
                self.showMessage('', 'addEventFormWrapper'); 
            });
        }       
    }

    

    createEvent(arr) {
        let str = `<div class="eventTitle">
            <h3>`+ arr['title'] +`</h3>
        </div>
        <div class="eventTime">
            <p class="hour">` + arr['start_time'] + ` - ` +  arr['end_time'] + `</p>
            <p class="date">` + arr['day'] + ` ` + arr['monthName'] + ` ` + arr['year'] + `</p>
        </div>
        <div class="eventAuthor">
            <p class="authorTitle">Автор:</p>
            <p class="authorName">` + arr['author'] + `</p>
        </div>
        <div class="eventDescription">
            <p class="descriptionTitle">Описание события:</p>
            <p class="descriptionText">`
                 + arr['description'] +
            `</p>
        </div>
        <button type="button" class="btn btn-primary" id="` + arr['id'] + `">Редактировать событие</button>`;

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