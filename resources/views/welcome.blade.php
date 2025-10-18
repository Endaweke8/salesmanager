<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Your Company') }}</title>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

    <!-- Navbar -->
    <header class="w-full bg-white shadow-sm fixed top-0 left-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">
                {{ config('app.name', 'YourCompany') }}
            </h1>
            <nav class="space-x-6 hidden md:block">
                <a href="#about" class="hover:text-indigo-600">About</a>
                <a href="#services" class="hover:text-indigo-600">Services</a>
                <a href="#contact" class="hover:text-indigo-600">Contact</a>
            </nav>
            <div class="space-x-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-5 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-5 py-2 border border-indigo-600 text-indigo-600 rounded-md hover:bg-indigo-50">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-5 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-28 pb-20 bg-gradient-to-r from-indigo-600 to-blue-600 text-white text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-4xl sm:text-5xl font-bold mb-4">Welcome to {{ config('app.name', 'Your Company') }}</h2>
            <p class="text-lg text-indigo-100 mb-8">
                We’re dedicated to delivering innovative digital solutions that transform ideas into success.
                Explore our services and see how we can help you grow.
            </p>
            <a href="#services" class="px-8 py-3 bg-white text-indigo-700 font-medium rounded-md hover:bg-gray-100">
                Explore Our Services
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-900 mb-6">Who We Are</h3>
            <p class="max-w-2xl mx-auto text-gray-600">
                {{ config('app.name', 'Your Company') }} is a forward-thinking technology company focused on crafting
                high-quality digital experiences. From web development to business automation,
                we help clients achieve excellence through innovation and expertise.
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-900 mb-12">Our Services</h3>

            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-gray-50 p-8 rounded-xl shadow hover:shadow-md transition">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-3">Web Development</h4>
                    <p class="text-gray-600">We design and develop responsive, scalable, and modern websites tailored to
                        your business goals.</p>
                </div>
                <div class="bg-gray-50 p-8 rounded-xl shadow hover:shadow-md transition">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-3">Software Solutions</h4>
                    <p class="text-gray-600">Custom software that enhances productivity, automates processes, and drives
                        growth.</p>
                </div>
                <div class="bg-gray-50 p-8 rounded-xl shadow hover:shadow-md transition">
                    <h4 class="text-xl font-semibold text-indigo-600 mb-3">Digital Marketing</h4>
                    <p class="text-gray-600">We help you reach your audience effectively through smart marketing and SEO
                        strategies.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-900 mb-6">Get in Touch</h3>
            <p class="max-w-xl mx-auto text-gray-600 mb-10">
                Have a question or a project in mind? Reach out to us — we’d love to hear from you.
            </p>
            <a href="mailto:info@yourcompany.com"
                class="px-8 py-3 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700">
                Contact Us
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-indigo-700 text-white py-6 text-center">
        <p class="text-sm">
            © {{ date('Y') }} {{ config('app.name', 'Your Company') }}. All rights reserved.
        </p>
    </footer>

</body>

</html>
