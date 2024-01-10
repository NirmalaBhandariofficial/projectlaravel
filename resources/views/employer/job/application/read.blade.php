@extends('layouts.app')

@section('content')
<div class="w-screen h-20"></div>
<div class="px-28 py-10">
    <div class="font-semibold text-2xl tracking-wider">
        Applications for <span class="text-green-500 font-bold">{{ $job['title'] }}</span>
    </div>
    <div class="mt-10">
        <table class="w-full">
            <tr class="font-bold">
                <td>
                    Name
                </td>
                <td>
                    Email
                </td>
            </tr>
            @foreach ($applications as $application)
                <tr>
                    <td>
                        {{ $application->user['name'] }}
                    </td>
                    <td>
                        {{ $application->user['email'] }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection