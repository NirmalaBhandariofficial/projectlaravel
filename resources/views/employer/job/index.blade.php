@extends('layouts.app')

@section('content')
<div class="w-screen h-20"></div>
<div class="px-28 py-10">
    <a
        href="{{ route('job.create') }}"
        class="bg-green-500 text-white px-8 py-3 rounded">
        Post Job
    </a>
    <div class="mt-10">
        <table class="w-full">
            <tr class="font-bold">
                <td>
                    Title
                </td>
                <td class="w-[500px]">
                    Actions
                </td>
            </tr>
            @foreach ($jobs as $job)
                <tr>
                    <td>
                        {{ $job['title'] }}
                    </td>
                    <td class="flex items-center gap-5 w-[600px]">
                        <a
                            href="{{ route('job.skill', $job['id']) }}">
                            Add Skills
                        </a>
                        <a
                            href="{{ route('job.edit', $job['id']) }}"
                            class="text-green-500">
                            Edit
                        </a>
                        <form
                            action="{{ route('job.destroy', $job['id']) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="text-red-500 hover:underline">
                                Delete
                            </button>
                        </form>
                        <form
                            action="{{ route('employer.recommend') }}"
                            method="POST">
                            @csrf
                            <div class="hidden">
                                <input
                                    type="number"
                                    name="job_id"
                                    value={{ $job['id'] }}>
                            </div>
                            <button
                                type="submit"
                                class="text-blue-500">
                                Get Recommendation
                            </button>
                        </form>
                        <a
                            href="{{ route('employer.job.application', $job['id']) }}">
                            View Applications
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection