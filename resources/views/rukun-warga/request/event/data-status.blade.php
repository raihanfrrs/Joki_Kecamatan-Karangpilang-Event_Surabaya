@if ($model->status == 'proses')
    <span class="badge rounded-pill bg-warning text-dark">Process</span>
@elseif ($model->status == 'terima' || $model->status == 'selesai')
    <span class="badge rounded-pill bg-success">{{ $model->status == 'terima' ? 'Accept' : 'Done' }}</span>
@elseif ($model->status == 'tolak')
    <span class="badge rounded-pill bg-danger">Reject</span>
@endif