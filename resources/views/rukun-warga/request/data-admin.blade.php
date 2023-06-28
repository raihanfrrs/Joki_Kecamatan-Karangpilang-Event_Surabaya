@if ($model->admin_id)
    {{ $model->admin->name }}
@else
    <span class="text-danger">Admin has not confirmed</span>
@endif