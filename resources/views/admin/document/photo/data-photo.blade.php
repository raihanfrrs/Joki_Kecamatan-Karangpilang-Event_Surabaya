@if ($model->photo)
    <img src="{{ asset('storage/'. $model->photo) }}" style="width: 20%" />
@endif