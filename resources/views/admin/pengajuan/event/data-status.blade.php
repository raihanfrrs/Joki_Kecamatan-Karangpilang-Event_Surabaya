<select name="status" id="statusEvent" class="default-select form-control wide text-center" data-key="{{ $model->slug }}">
    <option value="selesai" {{ $model->status == 'selesai' ? 'selected' : '' }}>Done</option>
    <option value="terima" {{ $model->status == 'terima' ? 'selected' : '' }}>Accept</option>
    <option value="proses" {{ $model->status == 'proses' ? 'selected' : '' }}>Process</option>
    <option value="tolak" {{ $model->status == 'tolak' ? 'selected' : '' }}>Reject</option>
</select>