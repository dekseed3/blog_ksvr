@extends('main')

@section('title', '| โรงพยาบาลค่ายกฤษณ์สีวะรา')

@section('content')
<div class="container">
    <div class="form-spacing-top-index row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (Auth::guard('admin')->check())
                    <p class="text-success">
                        You are Logged In as a <strong>Admin</strong>
                    </p>
                    @else
                    <p class="text-danger">
                        You are Logged Out as a <strong>Admin</strong>
                    </p>
                    @endif
                    @if (Auth::guard('web')->check())
                    <p class="text-success">
                        You are Logged In as a <strong>User</strong>
                    </p>
                    @else
                    <p class="text-danger">
                        You are Logged Out as a <strong>User</strong>
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
