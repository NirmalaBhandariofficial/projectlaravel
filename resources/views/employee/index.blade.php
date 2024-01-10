@extends('layouts.app')

@section('content')
<div class="h-20 w-screen"></div>

<div class="px-28">
    @if ($info)
        <div class="grid grid-cols-4 gap-10 mt-20">
            <div>
                <img
                    src="{{ asset('images/user/'.$info['image']) }}"
                    class="w-full h-[300px] object-cover rounded shadow-lg">
            </div>
            <div class="col-span-3 flex flex-col gap-3">
                <div class="font-semibold text-xl">
                    {{ $user['name'] }}
                </div>
                <div>
                    {{ $user['email'] }}
                </div>
                <div>
                    <a
                        href="{{ route('info.edit', Auth::user()->id) }}"
                        class="underline text-green-500 font-semibold">
                        Edit Profile
                    </a>
                </div>
                @if ($skills)
                    <div class="font-semibold text-xl mt-5">
                        Skills
                    </div>
                    <div class="flex items-center gap-5 flex-wrap">
                        @foreach ($skills as $skill)
                            <div class="min-w-[150px] bg-blue-600 text-white px-2 py-2 text-center rounded">
                                {{ $skill['title'] }}
                            </div>
                        @endforeach
                        <div>
                            <a
                                href="{{ route('employee.account') }}"
                                class="underline text-green-500 font-semibold">
                                Manage More
                            </a>
                        </div>
                    </div>
                @else
                    <div>
                        <a
                            href="{{ route('employee.account') }}"
                            class="underline text-green-500 font-semibold">
                            Manage Skills
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-10">
            @if ($educations)
                <div class="font-semibold text-xl mt-5">
                    Education
                </div>
                <div class="mt-5">
                    <ul>
                        @foreach ($educations as $education)
                            <li>
                                <div class="flex gap-5">
                                    <div class="flex gap-3">
                                        <div>
                                            {{ $education['title'] }}
                                        </div>
                                        <div>
                                            ({{ $education['level'] }})
                                        </div>
                                    </div>
                                    <div>
                                        |
                                    </div>
                                    <div class="flex gap-3">
                                        <div>
                                            {{ $education['start_date']->format('Y-m-d') }}
                                        </div>
                                        <div>
                                            TO
                                        </div>
                                        <div>
                                            @if ($education['end_date']=="")
                                                Present
                                            @else
                                                {{ $education['end_date']->format('Y-m-d') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        <a
                            href="{{ route('employee.account') }}"
                            class="underline text-green-500 font-semibold">
                            Manage Education
                        </a>
                    </div>
                </div>
            @else
                <div>
                    <a
                        href="{{ route('employee.account') }}"
                        class="underline text-green-500 font-semibold">
                        Manage Education
                    </a>
                </div>
            @endif
        </div>
        <div class="mt-10">
            @if ($experiences)
                <div class="font-semibold text-xl mt-5">
                    Experience
                </div>
                <div class="mt-5">
                    <ul>
                        @foreach ($experiences as $experience)
                            <li>
                                <div class="flex gap-5">
                                    <div class="flex gap-3">
                                        <div>
                                            {{ $experience['title'] }}
                                        </div>
                                        <div>
                                            ({{ $experience['position'] }})
                                        </div>
                                    </div>
                                    <div>
                                        |
                                    </div>
                                    <div class="flex gap-3">
                                        <div>
                                            {{ $experience['start_date']->format('Y-m-d') }}
                                        </div>
                                        <div>
                                            TO
                                        </div>
                                        <div>
                                            @if ($experience['end_date']=="")
                                                Present
                                            @else
                                                {{ $experience['end_date']->format('Y-m-d') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        <a
                            href="{{ route('employee.account') }}"
                            class="underline text-green-500 font-semibold">
                            Manage Experience
                        </a>
                    </div>
                </div>
            @else
                <div>
                    <a
                        href="{{ route('employee.account') }}"
                        class="underline text-green-500 font-semibold">
                        Manage Experience
                    </a>
                </div>
            @endif
        </div>
    @else
        <div class="flex flex-col items-center justify-center mt-20">
            <form
                action="{{ route('info.store') }}"
                enctype="multipart/form-data"
                method="POST">
                @csrf
                <div>
                    <label class="block mb-2 text-center text-2xl font-semibold">
                        Choose Your Profile Picture
                    </label>
                    <label class="w-full flex flex-col px-2 py-3 bg-white rounded border border-green-500 cursor-pointer">
                        <img
                            src="{{ asset('images/default.jpg') }}"
                            alt=""
                            id="image-preview"
                            class="rounded cursor-pointer w-full h-72 object-cover object-center">
                        <input
                            type="file"
                            id="image"
                            name="image"
                            class="hidden">
                    </label>
                </div>
                <div class="mt-5">
                    <button
                        type="submit"
                        class="w-full bg-green-500 py-3 text-white rounded">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    @endif
</div>
@endsection

@section('script')
<script>
    $(document).ready(function (e) {

    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#image-preview').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });
    });
</script>
@endsection