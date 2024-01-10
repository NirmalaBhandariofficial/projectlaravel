@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="toast fixed z-50 bottom-0 left-0 w-full h-fit py-3 px-5 text-center bg-green-500 text-white">
        {{ session('success') }}
    </div>
    {{ session()->forget('success') }}
@endif
<div class="h-20 w-screen"></div>
<div class="px-28 py-10">
    <div class="font-semibold text-3xl text-blue-500">
        {{ $job['title'] }}
    </div>
    <div class="grid grid-cols-3 gap-20 mt-10">
        <div>
            <div>
                <table class="job-table w-full">
                    <tr>
                        <td>
                            Employer
                        </td>
                        <td>
                            {{ $job->user['name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            {{ $job->user['email'] }}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mt-10">
                <form
                    action="{{ route('employee.application.store') }}"
                    method="POST">
                    @csrf
                    <div class="hidden">
                        <input
                            type="number"
                            name="job_id"
                            value="{{ $job['id'] }}">
                    </div>
                    <button
                        type="submit"
                        class="bg-blue-500 rounded px-10 py-3 text-white">
                        Apply Now
                    </button>
                </form>
            </div>
        </div>
        <div class="col-span-2">
            <table class="w-full">
                <tr>
                    <td>
                        Experience Required
                    </td>
                    <td>
                        Job Type
                    </td>
                    <td>
                        Education Required
                    </td>
                    <td>
                        Salary
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ $job['experience'] }} Years
                    </td>
                    <td>
                        {{ $job['job_type'] }}
                    </td>
                    <td>
                        {{ $job['education_level'] }}
                    </td>
                    <td>
                        {{ $job['salary'] }}
                    </td>
                </tr>
            </table>
            <div class="mt-10 leading-normal tracking-wider text-justify">
                {{ $job['description'] }}
            </div>
        </div>
    </div>
</div>
@endsection