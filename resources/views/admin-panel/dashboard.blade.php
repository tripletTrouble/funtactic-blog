@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <h1 class="menu-title">Ini halaman dashboard</h1>
        <p>{{ $user['name'] ?? 'Guest' }}</p>
    </div>
@endsection
