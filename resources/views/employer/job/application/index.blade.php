@extends('layouts.app')

@section('content')
<div class="w-screen h-20"></div>
<div class="px-28 py-10">
    <div class="font-semibold text-2xl tracking-wider">
        Applications for <span class="text-green-500 font-bold">{{ $job['title'] }}</span>
    </div>
    <div class="mt-10">
        <div class="w-full flex justify-end mb-2">
            <a
                href="{{ route('employer.job.readapplication', $job['id']) }}"
                class="underline">
                View Read Applications
            </a>
        </div>
        <table class="w-full">
            <tr class="font-bold">
                <td>
                    Name
                </td>
                <td>
                    Email
                </td>
                <td class="w-[500px]">
                    Actions
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
                    <td class="flex items-center gap-5">
                        <form
                            action="{{ route('employer.job.application.update', $application['id']) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <button
                                type="submit"
                                class="text-green-500 hover:underline">
                                Mark as read
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection