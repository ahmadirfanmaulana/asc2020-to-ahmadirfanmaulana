@extends('layouts.master')

@section('content')
    @include('layouts.nav1')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        @include('layouts.toolbar3')

        <div class="mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h2 class="h4">Create new event</h2>
            </div>
        </div>

        @include('layouts.errors')

        <form class="needs-validation" novalidate action="{{route('events.store')}}" method="POST">

            @csrf

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="" value="{{old('name')}}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputSlug">Slug</label>
                    <input type="text" class="form-control" id="inputSlug" name="slug" placeholder="" value="{{old('slug')}}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputDate">Date</label>
                    <input type="text"
                           class="form-control"
                           id="inputDate"
                           name="date"
                           placeholder="yyyy-mm-dd"
                           value="{{old('date')}}">
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary" type="submit">Save event</button>
            <a href="{{route('events.index')}}" class="btn btn-link">Cancel</a>
        </form>

    </main>
@endsection
