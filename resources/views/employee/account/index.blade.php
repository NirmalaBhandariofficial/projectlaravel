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
<div class="h-20 w-screen"></div>

<div class="px-28">
    Account
    <div id="tabs" class="mt-10">
        <ul>
          <li><a href="#tab1">Skills</a></li>
          <li><a href="#tab2">Education</a></li>
          <li><a href="#tab3">Experience</a></li>
        </ul>
        <div id="tab1">
            <form
                action="{{ route('skill.store') }}"
                method="POST"
                class="">
                @csrf
                <div>
                    <label for="title">Enter Title</label>
                    <input
                        type="text"
                        name="title"
                        class="w-full">
                </div>
                <div class="mt-5">
                    <button
                        type="submit"
                        class="bg-green-500 px-8 py-3 text-white rounded">
                        Add Skill
                    </button>
                </div>
            </form>
        </div>
        <div id="tab2">
            <form
                action="{{ route('education.store') }}"
                method="POST"
                class="">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="title">Enter Courese Title</label>
                        <input
                            type="text"
                            name="title"
                            class="w-full">
                    </div>
                    <div>
                        <label for="level">Select Level</label>
                        <select
                            name="level"
                            class="w-full">
                            <option value="">-- SELECT LEVEL --</option>
                            <option value="High School">High School</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Bachelors">Bachelors</option>
                            <option value="Masters">Masters</option>
                            <option value="PHD">PHD</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mt-5">
                    <div>
                        <label for="start date">Enter Start Date</label>
                        <input
                            type="date"
                            name="start_date"
                            class="w-full">
                    </div>
                    <div>
                        <label for="end date">Enter End Date (Leave Blank if Not Completed)</label>
                        <input
                            type="date"
                            name="end_date"
                            class="w-full">
                    </div>
                </div>
                <div class="mt-5">
                    <button
                        type="submit"
                        class="bg-green-500 px-8 py-3 text-white rounded">
                        Add Education
                    </button>
                </div>
            </form>
        </div>
        <div id="tab3">
            <form
                action="{{ route('experience.store') }}"
                method="POST"
                class="">
                @csrf
                <div class="grid grid-cols-3 gap-5">
                    <div>
                        <label for="title">Enter Company Name</label>
                        <input
                            type="text"
                            name="title"
                            class="w-full">
                    </div>
                    <div>
                        <label for="position">Enter Job Position</label>
                        <input
                            type="text"
                            name="position"
                            class="w-full">
                    </div>
                    <div>
                        <label for="level">Select Employment Type</label>
                        <select
                            name="type"
                            class="w-full">
                            <option value="">-- SELECT Type --</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Internship">Internship</option>
                            <option value="Contract">Contract</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mt-5">
                    <div>
                        <label for="start date">Enter Start Date</label>
                        <input
                            type="date"
                            name="start_date"
                            class="w-full">
                    </div>
                    <div>
                        <label for="end date">Enter End Date (Leave Blank if Still Working)</label>
                        <input
                            type="date"
                            name="end_date"
                            class="w-full">
                    </div>
                </div>
                <div class="mt-5">
                    <label>
                        Enter total years of experience
                    </label>
                    <input
                        type="number"
                        name="experience"
                        class="w-full">
                </div>
                <div class="mt-5">
                    <button
                        type="submit"
                        class="bg-green-500 px-8 py-3 text-white rounded">
                        Add Experience
                    </button>
                </div>
            </form>
        </div>
      </div>

      <div class="mt-10">
        <div class="grid grid-cols-3 gap-10">
            <div class="shadow rounded pb-5">
                <div class="font-bold text-xl bg-blue-400 px-5 text-white rounded-t py-2">
                    Skills
                </div>
                @foreach ($skills as $skill)
                    <div class="flex justify-between px-5 mt-5">
                        <div>
                            {{ $skill['title'] }}
                        </div>
                        <div>
                            <form
                                action="{{ route('skill.destroy', $skill['id']) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="shadow rounded pb-5">
                <div class="font-bold text-xl bg-blue-400 px-5 text-white rounded-t py-2">
                    Educations
                </div>
                @foreach ($educations as $education)
                    <div class="flex justify-between items-center px-5 mt-5">
                        <div>
                            <div>
                                {{ $education['title'] }}
                            </div>
                            <div class="text-xs">
                                {{ $education->start_date->format('Y/m/d') }}
                                -
                                @if ($education['end_date']=="")
                                    Present
                                @else
                                    {{ $education['end_date'] }}
                                @endif
                            </div>
                        </div>
                        <div>
                            <form
                                action="{{ route('education.destroy', $education['id']) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="shadow rounded pb-5">
                <div class="font-bold text-xl bg-blue-400 px-5 text-white rounded-t py-2">
                    Experiences
                </div>
                @foreach ($experiences as $experience)
                    <div class="flex justify-between items-center px-5 mt-5">
                        <div>
                            <div>
                                {{ $experience['title'] }}
                            </div>
                            <div class="text-xs">
                                {{ $experience->start_date->format('Y/m/d') }}
                                -
                                @if ($experience['end_date']=="")
                                    Present
                                @else
                                    {{ $experience['end_date'] }}
                                @endif
                            </div>
                        </div>
                        <div>
                            <form
                                action="{{ route('experience.destroy', $experience['id']) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
      </div>
</div>
@endsection