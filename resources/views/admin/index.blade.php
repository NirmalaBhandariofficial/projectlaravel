@extends('layouts.admin')

@section('content')
<div class="px-32">
    <div class="flex justify-end w-full py-5">
        <a
            href="{{ route('logout') }}"
            class="no-underline hover:underline font-semibold text-red-500 text-lg"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
    </div>

    <div class="mt-10">
        <table class="w-full">
            <tr>
                <td>
                    Title
                </td>
                <td>
                    Employer
                </td>
                <td>
                    Action
                </td>
            </tr>
            @foreach ($jobs as $job)
                <tr>
                    <td>
                        {{ $job['title'] }}
                    </td>
                    <td>
                        {{ $job->user['name'] }}
                    </td>
                    <td>
                        <form
                            action="{{ route('admin.job.remove', $job['id']) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="text-red-500 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection