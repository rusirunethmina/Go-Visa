$(document).ready(function() {

    $('#calendar').fullCalendar({
       
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        editable: false,
        droppable: false,
        eventLimit: true,
        eventTextColor: '#fff',
    events: {
            url: AppHelper.baseUrl+'api/get_calendar_events',
            type: 'GET',
            error: function(err) {
                console.log('Error!- This request could not be completed' + err);
            },
            success: function(response) {

            },
    },
    eventMouseover: function (data, event, view) {
        $(this).popover({
            trigger:'hover',
            title: data.title,
            container:"body",
            placement:'auto',
            animation: true,
            html: true,  
            content: function () {
                return '<div class="col-xs-3"><h5 class="popover-content-date-month">'+moment(data.start).format('MMM')+'</h5><p class="popover-content-description text-success">'+moment(data.start).format('DD')+'</p><h5 class="popover-content-date-month">'+moment(data.end).format('MMM')+'</h5><p class="popover-content-description text-warning">'+moment(data.end).format('DD')+'</p></div><div class="col-xs-9 pb-10"></div>';
            }
        });

    },
    
    });
})