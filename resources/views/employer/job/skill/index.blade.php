@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div id="errors" class="text-red-500 fixed bottom-10 right-10 z-50">
        <ul class="flex flex-col gap-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="w-screen h-20"></div>
<div class="px-28 py-10">
    <div>
        <a
            href="{{ route('job.index') }}"
            class="flex gap-1 items-center hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>
            <span>
                Go Back
            </span>
        </a>
    </div>
    <div class="text-2xl mt-5">
        Add Skills for
        <span class="font-semibold underline">
            {{ $job['title'] }}
        </span>
    </div>
    <div class="mt-10">
        <form
            action="{{ route('jobskill.store') }}"
            method="POST"
            class="">
            @csrf
            <div class="flex justify-between gap-10 items-center">
                <div class="w-full">
                    <label for="title">Enter Title</label>
                    <input
                        type="text"
                        name="title"
                        class="w-full mt-1">
                </div>
                <div class="hidden">
                    <input
                        type="number"
                        name="job_id"
                        value="{{ $job['id'] }}">
                </div>
                <div class="mt-5 w-full">
                    <button
                        type="submit"
                        class="bg-green-500 px-8 py-3 text-white rounded">
                        Add Skill
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-10">
        <table class="w-full">
            <tr class="font-bold">
                <td>
                    Skill
                </td>
                <td class="w-[200px]">
                    Actions
                </td>
            </tr>
            @foreach ($skills as $skill)
                <tr>
                    <td>
                        {{ $skill['title'] }}
                    </td>
                    <td class="flex gap-5">
                        <a
                            href="{{ route('jobskill.edit', $skill['id']) }}"
                            class="text-green-500">
                            Edit
                        </a>
                        <form
                            action="{{ route('jobskill.destroy', $skill['id']) }}"
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