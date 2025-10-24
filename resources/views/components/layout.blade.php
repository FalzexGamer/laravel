<!DOCTYPE html>
<html lang="en" class="h-full bg-black text-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="h-full bg-black text-white">
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company" class="size-8" />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                                <x-nav-link href="/" :active="request()->is('/')">home</x-nav-link>
                                <x-nav-link href="/jobs" :active="request()->is('about')">jobs</x-nav-link>
                                <x-nav-link href="/contact" :active="request()->is('contact')">contact</x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @auth
                                <form method="POST" action="/logout">
                                    @csrf
                                    <x-form-button>Logout</x-form-button>
                                </form>
                            @endauth
                            @guest
                                <x-nav-link href="/login" :active="request()->is('login')">Log in</x-nav-link>
                                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                            @endguest
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                    </div>
                </div>
            </div>
        </nav>
        <header class="relative bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 ">{{ $heading }}</h1>
                <x-button href="/jobs/create">Create Job</x-button>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
