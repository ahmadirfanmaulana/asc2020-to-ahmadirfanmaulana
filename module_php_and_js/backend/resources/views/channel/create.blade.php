@extends('layouts.master')

@section('content')
    @include('layouts.nav2')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    @include('layouts.toolbar2')

        <div class="mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h2 class="h4">Create new channel</h2>
            </div>
        </div>

        @include('layouts.errors')

        <form class="needs-validation" novalidate action="{{route('channels.store', ['event' => $event->id])}}" method="POST">

            @csrf

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="" value="{{old('name')}}">
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary" type="submit">Save channel</button>
            <a href="{{route('events.show', ['event' => $event->id])}}" class="btn btn-link">Cancel</a>
        </form>

    </main>
@endsection
