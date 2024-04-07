@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    @if (Auth::user()->isAdmin())
                        <!-- Content for admin dashboard -->
                        <p>Welcome, Admin!</p>
                    @else
                        <!-- Content for regular user dashboard -->
                        <p>Welcome, {{ Auth::user()->name }}!</p>
                        <!-- Add user-specific options or content here -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
