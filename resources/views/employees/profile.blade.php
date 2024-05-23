@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <p>Name: {{ $employee->name }}</p>
    <p>Email: {{ $employee->email }}</p>
</div>
@endsection

@if($role == 'admin')
    <p>You are an admin.</p>
@else
    <p>You are not an admin.</p>
@endif
