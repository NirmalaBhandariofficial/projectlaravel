@extends('layouts.app')

@section('content')
<div class="h-20 w-screen"></div>
<div class="px-28 py-10">
    <div class="w-full">
        <form
            action="{{ route('employee.job.search') }}"
            method="GET"
            class="flex items-center gap-5">
            @csrf
            <input
                type="text"
                name="query"
                placeholder="Search For Jobs..."
                class="focus:ring-0 border-0 bg-white w-full p-3 rounded">
            <button
                type="submit"
                class="px-4 py-2.5 bg-green-500 text-white rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
        </form>
    </div>
    <div class="grid grid-cols-3 gap-10 mt-10">
        @foreach ($jobs as $job)
            <div class="grid grid-cols-3 gap-0 shadow">
                <div class="col-span-2 p-5">
                    <div class="font-semibold text-lg">
                        {{ $job['title'] }}
                    </div>
                    <div class="font-semibold text-gray-400 flex items-center gap-1">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                            </svg>
                        </div>
                        <div class="text-sm">
                            {{ $job->user->name }}
                        </div>
                    </div>
                </div>
                <div class="bg-blue-500">
                    <a
                        href="{{ route('employee.job.view', $job['id']) }}"
                        class="w-full h-full flex items-center justify-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
        <form
        action="{{ route('employee.recommend') }}"
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
    </div>
</div>
@endsection