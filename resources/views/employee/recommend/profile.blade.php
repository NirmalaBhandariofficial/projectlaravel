@extends('layouts.app')

@section('content')
<div class="w-screen h-20"></div>
<div class="px-28 py-10">
    <div>
        <div>
            <span class="font-semibold">
                Name:
            </span>
            <span>
                {{ $user['name'] }}
            </span>
        </div>
        <div class="mt-3">
            <span class="font-semibold">
                Email:
            </span>
            <span>
                {{ $user['email'] }}
            </span>
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
                @endforeach
            </div>
        </div>
    </div>
    <div class="mt-10">
        <a
            href="mailto:{{ $user['email'] }}"
            class="bg-green-500 text-white px-10 py-2 rounded">
            Send Email
        </a>
    </div>
</div>
@endsection