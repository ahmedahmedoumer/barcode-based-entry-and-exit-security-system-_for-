@extends('guard.security_guard')
@section('guard_content')
@if (isset($success_attend))
<div class="alert alert-success alert-dismissible">
    {{$success_attend}}
</div>
@else
<div class="alert alert-danger alert-dismissible">
    {{$error_message}}
</div>
@endif
@endsection
