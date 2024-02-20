@extends('dashboard.layouts.main')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <style>
        #calendar {
            max-width: 800px;
            margin: 0 auto;
            height: 600px;
        }
    </style>
    <div id='calendar'></div>
    <!-- /.content-wrapper -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                // Konfigurasi FullCalendar
                initialView: 'dayGridMonth', // Tampilan awal pada bulan
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: {!! json_encode($events) !!},
            });
            calendar.render();
        });
    </script>
@endsection
