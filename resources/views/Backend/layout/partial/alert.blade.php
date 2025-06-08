@if(session('primary'))
<p class="alert alert-primary">
    {{Session::get('primary' )}}
</p>
@endif

@if(session('secondary'))
<p class="alert alert-secondary">
    {{Session::get('secondary' )}}
</p>
@endif

@if(session('success'))
<p class="alert alert-success">
    {{Session::get('success' )}}
</p>
@endif

@if(session('danger'))
<p class="alert alert-danger">
    {{Session::get('danger' )}}
</p>
@endif

@if(session('warning'))
<p class="alert alert-warning">
    {{Session::get('warning' )}}
</p>
@endif

@if(session('info'))
<p class="alert alert-info">
    {{Session::get('info' )}}
</p>
@endif

@if(session('light'))
<p class="alert alert-light">
    {{Session::get('light' )}}
</p>
@endif

@if(session('dark'))
<p class="alert alert-dark">
    {{Session::get('dark' )}}
</p>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif