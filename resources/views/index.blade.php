@extends('layouts.app')

@section('content')
<div class="h-screen">
    @if (Auth::user())
        <div class="relative z-30 h-screen w-screen flex flex-col items-center justify-center">
            <div class="text-6xl text-white drop-shadow">
                <span>
                    Welcome
                </span>
                <span class="font-bold">
                    {{ Auth::user()->name }}
                </span>
            </div>
            <div class="mt-10">
                @if (Auth::user())
                    @if (Auth::user()->role==0)
                        <a
                            href="{{ route('employee.index') }}"
                            class="bg-green-500 px-10 py-3 rounded text-white">
                            Go To Dashboard
                        </a>
                    @endif
                    @if (Auth::user()->role==1)
                        <a
                            href="{{ route('employer.index') }}"
                            class="bg-green-500 px-10 py-3 rounded text-white">
                            Go To Dashboard
                        </a>
                    @endif
                @endif
            </div>
        </div>
    @else
    <div id="hero" class="section relative z-0 py-16 md:pt-32 md:pb-20 bg-gray-50">
        <div class="container xl:max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap flex-row -mx-4 justify-center">
                <!-- content -->
                <div class="flex-shrink max-w-full px-4 sm:px-12 lg:px-18 w-full sm:w-9/12 lg:w-1/2 self-center">
                    <img src="{{ asset('images/office.png') }}" class="w-full max-w-full h-auto" alt="creative agency">
                </div><!-- end content -->
    
                <!-- text -->
                <div class="flex-shrink max-w-full px-4 w-full md:w-9/12 lg:w-1/2 self-center lg:pr-12">
                    <div class="text-center lg:text-left mt-6 lg:mt-0">
                        <div class="mb-12">
                            <h1 class="text-4xl leading-normal text-black font-bold mb-4">
                                Find the job that matches your skills.
                            </h1>
                            <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">
                                Using our system, get matched with employers looking for your skillset.
                            </p>
                        </div>
                        <a
                            href="/login"
                            class="py-2.5 px-10 inline-block text-center leading-normal text-gray-900 bg-white border-b border-gray-100 hover:text-black hover:ring-0 focus:outline-none focus:ring-0 mr-4" href="#portfolio">
                            Login
                        </a>
    
                        <a
                            href="/register"
                            class="py-2.5 px-10 inline-block text-center leading-normal text-gray-100 bg-black border-b border-gray-800 hover:text-white hover:ring-0 focus:outline-none focus:ring-0" target="_blank" href="https://aribudin.gumroad.com/l/tailone">
                            Signup
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="services" class="section relative pt-20 pb-8 md:pt-16 md:pb-0 bg-white">
        <div class="container xl:max-w-6xl mx-auto px-4">
          <!-- Heading start -->
            <header class="text-center mx-auto mb-12 lg:px-20">
                <h2 class="text-2xl leading-normal mb-2 font-bold text-black">
                    What We Do
                </h2>
                <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">
                    Save time managing advertising & Content for your business.
                </p>
            </header><!-- End heading -->
    
          <!-- row -->
            <div class="flex flex-wrap flex-row -mx-4 text-center">
                <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6">
                <!-- service block -->
                <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-black">
                        SEO Services
                    </h3>
                    <p class="text-gray-500">
                        This is a wider card with supporting text below as a natural content.
                    </p>
                </div> <!-- end service block -->
                </div>
    
                <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                <!-- service block -->
                <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
    
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-black">
                        Social Content
                    </h3>
                    <p class="text-gray-500">
                        This is a wider card with supporting text below as a natural content.
                    </p>
                </div><!-- end service block -->
                </div>
    
                <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <!-- service block -->
                <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-black">
                        Creative ads
                    </h3>
                    <p class="text-gray-500">
                        This is a wider card with supporting text below as a natural content.
                    </p>
                </div><!-- end service block -->
                </div>
    
                <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s">
                <!-- service block -->
                <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-black">
                        Brand Identity
                    </h3>
                    <p class="text-gray-500">
                        This is a wider card with supporting text below as a natural content.
                    </p>
                </div><!-- end service block -->
                </div>
    
                <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                <!-- service block -->
                <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-black">
                        Budget & Marketing
                    </h3>
                    <p class="text-gray-500">
                        This is a wider card with supporting text below as a natural content.
                    </p>
                </div><!-- end service block -->
                </div>
    
                <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                <!-- service block -->
                <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-black">
                        Optimize conversions
                    </h3>
                    <p class="text-gray-500">
                        This is a wider card with supporting text below as a natural content.
                    </p>
                </div><!-- end service block -->
                </div>
            </div><!-- end row -->
        </div>
    </div>
    @endif
</div>
@endsection

@section('script')
<script>
    document.getElementById('loginTab').addEventListener('click', function () {
      document.getElementById('loginTab').classList.add('bg-blue-500', 'hover:bg-blue-600', 'text-white');
      document.getElementById('registerTab').classList.remove('bg-blue-500', 'hover:bg-blue-600', 'text-white');
      document.getElementById('loginForm').classList.remove('hidden');
      document.getElementById('registerForm').classList.add('hidden');
    });

    document.getElementById('registerTab').addEventListener('click', function () {
      document.getElementById('registerTab').classList.add('bg-blue-500', 'hover:bg-blue-600', 'text-white');
      document.getElementById('loginTab').classList.remove('bg-blue-500', 'hover:bg-blue-600', 'text-white');
      document.getElementById('registerForm').classList.remove('hidden');
      document.getElementById('loginForm').classList.add('hidden');
    });
</script>
@endsection