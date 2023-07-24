@if ($model->status == 'proses')
    <span class="badge rounded-pill bg-warning text-dark">Process</span>
@elseif ($model->status == 'terima')
    <span class="badge rounded-pill bg-success">Accept</span>
@elseif ($model->status == 'tolak')
    <span class="badge rounded-pill bg-danger">Reject</span>
@endif