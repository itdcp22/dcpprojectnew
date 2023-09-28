<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />


<link rel="stylesheet" href="{{asset('css/app.css')}}">

<div  style="text-align:right">

    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"> Back    </a>

</div>

<div style="text-align:center">
    <img src={{asset('dist/img/dcplogo11.jpg')}}>
</div>



<h3 style="text-align:center">School Booking Calendar</h3>

<div id='calendar'></div>



<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($booking as $booking)
                {
                    title : '{{ $booking->tb_cust_name }} - {{ $booking->tb_time }} - {{ $booking->tb_student_qty }}',
                    start : '{{ $booking->tb_date }}',
                    url : '{{ route('foh.booking.show', $booking->id) }}'
                    
                    
                },
                @endforeach
            ]
        })
    });
</script>