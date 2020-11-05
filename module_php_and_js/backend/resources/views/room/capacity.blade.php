@extends('layouts.master')

@section('content')
    @include('layouts.nav3')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        @include('layouts.toolbar2')

        <div class="mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h2 class="h4">Room Capacity</h2>
            </div>
        </div>

        <!-- TODO create chart here -->
        <canvas id="myChart" width="400" height="200"></canvas>


    </main>
@endsection


@section('js')
    <script src="{{url('plugins/chartjs/dist/Chart.bundle.min.js')}}"></script>
    <script>
        var labels = {!! json_encode(collect($event->sessions())->map(function($session) { return $session->title; })) !!};
        var datasets = [];

        // capacity
        datasets.push({
            label: 'Capacity',
            data: {!! json_encode(collect($event->sessions())->map(function($session) { return $session->room->capacity; })) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
        });

        @php
            $backgroundColors = collect($event->sessions())->map(function($session) {
                if ($session->session_registrations->count() > $session->room->capacity) {
                    return  'rgba(255, 99, 132, 0.2)';
                } else {
                    return  'rgba(75, 192, 192, 0.2)';
                }
            })


        @endphp

        // attendees
        datasets.push({
            label: 'Attendee',
            data: {!! json_encode(collect($event->sessions())->map(function($session) { return $session->session_registrations->count(); })) !!},
            backgroundColor: {!! json_encode($backgroundColors) !!},
        });

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels,
                datasets
            },
            options: {
                legend: {
                  display: true,
                  position: 'right',
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
