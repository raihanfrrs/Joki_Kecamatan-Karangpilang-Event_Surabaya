@if ($model->video)
    <video controls class="w-25">
        <source src="{{ asset('storage/'. $model->video) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
@endif