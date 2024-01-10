@extends('layouts.app')

@section('content')
<div class="h-20 w-screen"></div>

<div class="px-28">
    <div class="mt-20">
        <form
            action="{{ route('info.update', Auth::user()->id) }}"
            enctype="multipart/form-data"
            method="POST">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-3 gap-10">
                <div>
                    <label class="block mb-2 text-xl font-semibold">
                        Select Your Profile Picture
                    </label>
                    <label class="w-full flex flex-col px-2 py-3 bg-white rounded border border-green-500 cursor-pointer">
                        <img
                            src="{{ asset('images/user/'.$info['image']) }}"
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
                <div class="col-span-2">
                    <div>
                        <label class="block mb-2 text-xl font-semibold">
                            Name
                        </label>
                        <input
                            type="text"
                            name="name"
                            value="{{ $user['name'] }}"
                            class="w-full rounded focus:ring-0 border-0 bg-white">
                    </div>
                    <div class="mt-10">
                        <label class="block mb-2 text-xl font-semibold">
                            Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            value="{{ $user['email'] }}"
                            class="w-full rounded focus:ring-0 border-0 bg-white">
                    </div>
                    <div class="mt-10">
                        <button
                            type="submit"
                            class="w-full bg-green-500 py-3 text-white rounded">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection