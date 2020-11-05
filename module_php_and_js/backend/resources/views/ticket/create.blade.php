@extends('layouts.master')

@section('content')
    @include('layouts.nav2')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    @include('layouts.toolbar2')

        <div class="mb-3 pt-3 pb-2">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                <h2 class="h4">Create new ticket</h2>
            </div>
        </div>

        @include('layouts.errors')

        <form class="needs-validation" novalidate action="{{route('tickets.store', ['event' => $event->id])}}" method="POST">

            @csrf

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="" value="{{old('name')}}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputCost">Cost</label>
                    <input type="number" class="form-control" id="inputCost" name="cost" placeholder="" value="{{old('cost')}}">
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="selectSpecialValidity">Special Validity</label>
                    <select class="form-control" id="selectSpecialValidity" name="special_validity" onchange="update()">
                        <option value="" selected>None</option>
                        <option value="amount" {{old('special_validity') == 'amount' ? 'selected' : ''}}>Limited amount</option>
                        <option value="date" {{old('special_validity') == 'date' ? 'selected' : ''}}>Purchaseable till date</option>
                    </select>
                </div>
            </div>

            <div class="row input-option d-none" id="input-amount">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputAmount">Maximum amount of tickets to be sold</label>
                    <input type="number" class="form-control" id="inputAmount" name="amount" placeholder="" value="{{old('amount')}}">
                </div>
            </div>

            <div class="row input-option d-none" id="input-date">
                <div class="col-12 col-lg-4 mb-3">
                    <label for="inputValidTill">Tickets can be sold until</label>
                    <input type="text"
                           class="form-control"
                           id="date"
                           name="date"
                           placeholder="yyyy-mm-dd HH:MM"
                           value="{{old('date')}}">
                </div>
            </div>


            <hr class="mb-4">
            <button class="btn btn-primary" type="submit">Save ticket</button>
            <a href="{{route('events.show', ['event' => $event->id])}}" class="btn btn-link">Cancel</a>
        </form>

    </main>
@endsection

@section('js')
    <script>
        function update () {
            const a = document.getElementById('selectSpecialValidity');

            Array.from(document.getElementsByClassName('input-option')).forEach(row => row.classList.add('d-none')); document.getElementById(`input-${a.value}`).classList.remove('d-none');
        }
        update();
    </script>
@endsection
