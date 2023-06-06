@if (session('success'))
    <div class="alert alert-success alert-dismissable alert-style-1">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="zmdi zmdi-check"></i>{{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-warning alert-dismissable alert-style-1">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="zmdi zmdi-alert-circle-o"></i>{{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-info alert-dismissable alert-style-1">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="zmdi zmdi-info-outline"></i>{{ session('warning') }}
    </div>
@endif

