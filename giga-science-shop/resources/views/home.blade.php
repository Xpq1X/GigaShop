@extends('layouts.app')

@section('content')
<style>
    .admin-header {
        background-color: #343a40;
        color: white;
        padding: 1rem;
        text-align: center;
        border-radius: 0.5rem;
        margin-bottom: 2rem;
    }
    .admin-nav {
        display: flex;
        justify-content: center;
        gap: 2rem;
        margin-bottom: 2rem;
    }
    .admin-nav a {
        color: white;
        text-decoration: none;
        background-color: #6c757d;
        padding: 0.5rem 1rem;
        border-radius: 0.3rem;
        transition: background-color 0.2s ease;
    }
    .admin-nav a:hover {
        background-color: #5a6268;
    }
</style>

<div class="container">
    <div class="admin-header">
        <h2>Admin Dashboard</h2>
    </div>

    <div class="admin-nav">
        <a href="{{ route('admin.products') }}">Manage Products</a>
        <a href="{{ route('admin.users') }}">Manage Users</a>
        <a href="{{ route('admin.orders') }}">View Orders</a>
    </div>

    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
    </div>
</div>
@endsection
