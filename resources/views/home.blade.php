@extends('layouts.app')

@section('content')
@if(Auth::check() && Auth::user()->role==2)
    @php
        header("Location: " . URL::to('/admin'));
        exit();
    @endphp
@endif
<div class="w-screen h-screen flex justify-center items-center">
    @if (Auth::user()->role==0)
        <a
            href="{{ route('employee.index') }}"
            class="bg-green-500 px-10 py-3 rounded text-white">
            Go To Dashboard
        </a>
    @endif
    @if (Auth::user()->role==1)
        <a
            href="{{ route('employer.index') }}"
            class="bg-green-500 px-10 py-3 rounded text-white">
            Go To Dashboard
        </a>
    @endif
</div>
@endsection
