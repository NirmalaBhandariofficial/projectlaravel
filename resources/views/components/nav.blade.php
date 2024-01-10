@if (Auth::user())
@php
$jobs = \App\Models\Job::where('employer_id', Auth::user()->id)->get();
$applicationlist = array();

foreach ($jobs as $job) {
    $application = \App\Models\Application::where('job_id', $job->id)->first();

    if ($application) {
        $applicationlist[] = $application->id;
    }
}

$applications = \App\Models\Application::whereIn('id', $applicationlist)->take(10)->get();
@endphp
@endif

<nav class="bg-white dark:bg-gray-900 fixed w-full z-40 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center">
        {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo"> --}}
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">JOB VISION</span>
    </a>
    <div class="flex md:order-2 gap-5">
        @if (Auth::user())
          @if (Auth::user()->role==0)
          <a
            href="{{ route('employee.job') }}"
            class="focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 border-2 border-gray-200 hover:bg-gray-200">
            Jobs
          </a>
          <a
            href="{{ route('employee.account') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Account
          </a>
          <a
            href="/employee"
            class="text-white bg-green-600 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3">
            Dashboard
          </a>
        @endif
        @if (Auth::user()->role==1)
          <a
            href="{{ route('job.index') }}"
            class="font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 border-2 border-gray-200 hover:bg-gray-200">
            Jobs
          </a>
          <a
            href="{{ route('employer.account') }}"
            class="text-white bg-blue-700 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3">
            Account
          </a>
          <div class="dropdown-container">
            <a
                class="dropdown-button cursor-pointer flex items-center mt-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
            </a>
            <div class="mt-2 py-3 hidden dropdown-menu absolute bg-primary rounded z-50 px-5 w-fit right-10">
                <div class="w-[400px] h-[500px] overflow-scroll flex flex-col items-start bg-green-500">
                  @foreach ($applications as $application)
                    <div class="p-5 border-b border-white text-white">
                      You have a new job application from user <span class="font-semibold">{{ $application->user->name }}</span> for job <span class="font-semibold">{{ $application->job->title }}</span>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
        @endif
        @endif
        @if (Auth::user())
        <a
        href="{{ route('logout') }}"
        class="no-underline hover:underline font-semibold text-black-500 text-lg"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        </a>
        @endif
    </div>
  </nav>
  