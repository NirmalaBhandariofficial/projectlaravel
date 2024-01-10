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
    <div class="text-2xl">
        Edit Skills for
        <span class="font-semibold underline">
            {{ $job['title'] }}
        </span>
    </div>
    <div class="mt-10">
        <form
            action="{{ route('jobskill.update', $skill['id']) }}"
            method="POST"
            class="">
            @csrf
            @method('PATCH')
            <div class="flex justify-between gap-10 items-center">
                <div class="w-full">
                    <label for="title">Enter Title</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ $skill['title'] }}"
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
                        Update Skill
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection