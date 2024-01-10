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
<div class="w-scree h-20"></div>

<div class="px-28 py-10">
    <div class="font-bold text-3xl mb-5">
        Edit Job Post
    </div>
    <form
        action="{{ route('job.update', $job['id']) }}"
        method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label>
                Enter Title
            </label>
            <input
                type="text"
                name="title"
                value="{{ $job['title'] }}"
                class="w-full">
        </div>
        <div class="mt-5">
            <label>
                Enter Years of Experience Required
            </label>
            <input
                type="number"
                name="experience"
                value="{{ $job['experience'] }}"
                class="w-full">
        </div>
        <div class="mt-5">
            <label>
                Enter Job Description
            </label>
            <textarea
                name="description"
                rows="10"
                class="w-full">{{ $job['description'] }}</textarea>
        </div>
        <div class="mt-5">
            <label>
                Select Job Type
            </label>
            <select
                name="job_type"
                class="w-full">
                <option value="">-- SELECT Type --</option>
                <option value="Full Time" {{ $job['job_type']=="Full Time"?'selected':'' }}>Full Time</option>
                <option value="Part Time" {{ $job['job_type']=="Part Time"?'selected':'' }}>Part Time</option>
                <option value="Internship" {{ $job['job_type']=="Internship"?'selected':'' }}>Internship</option>
                <option value="Contract" {{ $job['job_type']=="Contract"?'selected':'' }}>Contract</option>
            </select>
        </div>
        <div class="mt-5">
            <label>
                Enter Education Level required
            </label>
            <select
                name="education_level"
                class="w-full">
                <option value="">-- SELECT Education Level --</option>
                <option value="High School" {{ $job['education_level']=="High School"?'selected':'' }}>High School</option>
                <option value="Intermediate" {{ $job['education_level']=="Intermediate"?'selected':'' }}>Intermediate</option>
                <option value="Bachelors" {{ $job['education_level']=="Bachelors"?'selected':'' }}>Bachelors</option>
                <option value="Masters" {{ $job['education_level']=="Masters"?'selected':'' }}>Masters</option>
                <option value="PHD" {{ $job['education_level']=="Masters"?'selected':'' }}>PHD</option>
            </select>
        </div>
        <div class="mt-5">
            <label>
                Enter Salary
            </label>
            <input
                type="text"
                name="salary"
                value="{{ $job['salary'] }}"
                class="w-full">
        </div>
        <div class="mt-5">
            <button
                type="submit"
                class="bg-green-500 px-8 py-3 text-white rounded">
                Update Job
            </button>
        </div>
    </form>
</div>
@endsection