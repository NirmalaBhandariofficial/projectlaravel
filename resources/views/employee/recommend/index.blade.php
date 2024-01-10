@extends('layouts.app')

@section('content')
<div class="h-20 w-screen"></div>
<div class="px-28 py-10">
    <div class="text-2xl">
        Company who match your job requirements
    </div>
    <div class="mt-10">
        <div class="grid grid-cols-3 gap-5">
            @foreach ($users as $user )
                <div class="shadow bg-white px-5 py-7">
                    <div>
                        <span>
                            Name:
                        </span>
                        <span>
                            {{ $user['name'] }}
                        </span>
                    </div>
                    <div class="mt-3">
                        <span>
                            Email:
                        </span>
                        <span>
                            {{ $user['email'] }}
                        </span>
                    </div>
                    <div class="mt-10">
                        <a
                            href="{{ route('employer.userprofile', $user['id']) }}"
                            class="bg-green-500 rounded px-10 py-2 text-white">
                            View Profile
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection