@if (isset($model->request_event_id))
    {{ $model->request_event->event }}
@else
    <span class="text-danger">Event Deleted!</span>
@endif