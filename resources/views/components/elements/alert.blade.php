<div class="alert alert-{{ $type ?? 'success' }} alert-dismissible fade show" role="alert">
    <strong>{{ $title ?? 'Success' }}</strong>
    {{ $slot }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>