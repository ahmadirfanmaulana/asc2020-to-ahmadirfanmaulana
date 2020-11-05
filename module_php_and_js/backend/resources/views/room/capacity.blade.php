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


    </main>
@endsection
