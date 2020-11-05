<div class="border-bottom mb-3 pt-3 pb-2 event-title">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h1 class="h2">{{$event->name}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{route('events.edit', ['event' => $event->id])}}" class="btn btn-sm btn-outline-secondary">Edit event</a>
            </div>
        </div>
    </div>
    <span class="h6">{{$event->dateDisplay()}}</span>
</div>
