@if ($message = Session::get('success'))
<div class="alert alert-success d-flex align-items-center px-5 py-3">
    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
    <div class="d-flex flex-column">
        <h5 class="mb-1 text-success">{{ $message }}</h5>
    </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger d-flex align-items-center px-5 py-3">
    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
    <div class="d-flex flex-column">
        <h5 class="mb-1 text-danger">{{ $message }}</h5>
    </div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning d-flex align-items-center px-5 py-3">
    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
    <div class="d-flex flex-column">
        <h5 class="mb-1 text-warning">{{ $message }}</h5>
    </div>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info d-flex align-items-center px-5 py-3">
    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
    <div class="d-flex flex-column">
        <h5 class="mb-1 text-info">{{ $message }}</h5>
    </div>
</div>
@endif

@if ($message = Session::get('primary'))
<div class="alert alert-primary d-flex align-items-center px-5 py-3">
    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
    <div class="d-flex flex-column">
        <h5 class="mb-1 text-primary">{{ $message }}</h5>
    </div>
</div>
@endif
