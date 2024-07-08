@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <a href="{{ route('getHolidays') }}" class="">View Holidays screen</a>
    <div id="calendar"></div>
@endsection



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/events', // URL to fetch events
                editable: false,
                eventClick: function(info) {
                    // Handle event click if needed
                    //console.log(info.event);
                }
            });

            calendar.render();
        });
    </script>
