 @extends('website.category')

 @section('left_content')
{{--
 <div class="col-xs-12 col-sm-6 col-md-12 hvr-float-shadow mb-sm-30">
    <div class="section-content">
         <div class="row"> --}}
           {{--  <section>  --}}
            <div class="col-md-9 hvr-float-shadow mb-sm-30">
                <h4>Click on the Schedule to book an appointment with the consultant
                <div id='calendar-container'>
                    <div id='calendar'></div>
                </div>

             </div>
  {{--  </section>  --}}

  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        height: 'parent',
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'dayGridMonth',
        defaultDate: '<?php echo date("Y-m-d"); ?>',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
        @foreach ($schedules as $schedule)
        {
          
            title: '{{ $schedule->user->name }} ({{ $schedule->user->category->name }}), {{ $schedule->availability->availability_type }} ',
            url: '{{ route('book_appointment', $schedule->id) }}',
            start: '{{ $schedule->date_available }}'+'T'+'{{ $schedule->from_time }}',
            end: '{{ $schedule->date_available }}'+'T'+'{{ $schedule->to_time }}'
          },
        @endforeach


        ]
      });

      calendar.render();
    });

  </script>
    @endsection
    @section('page-title','Schedules')
    @section('css')
<link href="{{ asset('packages/core/main.css') }}" rel='stylesheet' />
<link href="{{ asset('packages/daygrid/main.css') }}" rel='stylesheet' />
<link href="{{ asset('packages/timegrid/main.css') }}" rel='stylesheet' />
<link href="{{ asset('packages/list/main.css') }}" rel='stylesheet' />
<script src="{{ asset('packages/core/main.js') }}"></script>
<script src="{{ asset('packages/interaction/main.js') }}"></script>
<script src="{{ asset('packages/daygrid/main.js') }}"></script>
<script src="{{ asset('packages/timegrid/main.js') }}"></script>
<script src="{{ asset('packages/list/main.js') }}"></script>

<style>

  html, body {

    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }



  .fc-header-toolbar {
    /*
    the calendar will be butting up against the edges,
    but let's scoot in the header's buttons
    */
    padding-top: 1em;
    padding-left: 1em;
    padding-right: 1em;
  }

</style>

@endsection
