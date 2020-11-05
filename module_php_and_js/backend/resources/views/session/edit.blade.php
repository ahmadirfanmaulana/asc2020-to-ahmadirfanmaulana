@extends('layouts.master')

@section('content')
    @include('layouts.nav2')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    @include('layouts.toolbar2')

        <div class="mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h2 class="h4">Edit session</h2>
            </div>
        </div>

        @include('layouts.errors')

        <form class="needs-validation" novalidate action="{{route('sessions.update', ['event' => $event->id, 'session' => $session->id])}}" method="POST">

            @csrf
            @method('put')

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="selectType">Type</label>
                    <select class="form-control" id="selectType" name="type">
                        <option value="talk" {{(old("type") ? old("type") : $session->type) == 'talk' ? 'selected' : ''}}>Talk</option>
                        <option value="workshop" {{(old("type") ? old("type") : $session->type) == 'workshop' ? 'selected' : ''}}>Workshop</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputTitle">Title</label>
                    <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
                    <input type="text" class="form-control" id="inputTitle" name="title" placeholder="" value="{{old('title') ? old('title') : $session->title }}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputSpeaker">Speaker</label>
                    <input type="text" class="form-control" id="inputSpeaker" name="speaker" placeholder="" value="{{old('speaker') ? old('speaker') : $session->speaker}}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="selectRoom">Room</label>
                    <select class="form-control" id="selectRoom" name="room">
                        @foreach($event->rooms as $room)
                        <option value="{{$room->id}}" {{(old("room") ? old('room') : $session->room_id) == $room->id ? 'selected' : ''}}>{{$room->name}} / {{$room->channel->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputCost">Cost</label>
                    <input type="number" class="form-control" id="inputCost" name="cost" placeholder="" value="{{old('cost') ? old('cost') : ($session->cost == null ? 0 : $session->cost)}}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6 mb-3">
                    <label for="inputStart">Start</label>
                    <input type="text"
                           class="form-control"
                           id="inputStart"
                           name="start"
                           placeholder="yyyy-mm-dd HH:MM"
                           value="{{old('start') ? old('start') : $session->start}}">
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <label for="inputEnd">End</label>
                    <input type="text"
                           class="form-control"
                           id="inputEnd"
                           name="end"
                           placeholder="yyyy-mm-dd HH:MM"
                           value="{{old('end') ? old('end') : $session->end}}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="textareaDescription">Description</label>
                    <textarea class="form-control" id="textareaDescription" name="description" placeholder="" rows="5">{{old('description') ? old('description') : $session->description}}</textarea>
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary" type="submit">Save session</button>
            <a href="{{route('events.show', ['event' => $event->id])}}" class="btn btn-link">Cancel</a>
        </form>

    </main>
@endsection
