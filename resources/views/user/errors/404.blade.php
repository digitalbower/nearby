{{-- resources/views/errors/404.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Not Found - 404</title>
    @vite('resources/css/app.css') {{-- Or your compiled Tailwind CSS --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>
<body class="bg-white text-gray-900">

    {{-- Include the Header --}}
    @include('partials.header')

    {{-- Main Error Content --}}
    <main class="min-h-[60vh] flex items-center justify-center text-center p-8">
        <div>
            <h1 class="text-6xl font-bold text-cyan-800 mb-4">404</h1>
            <p class="text-xl mb-6">Oops! The page you are looking for doesn’t exist.</p>
            <a href="{{ url('/') }}" class="inline-block bg-[#58af0838] text-black px-6 py-2 rounded hover:bg-cyan-600 transition">Go to Homepage</a>
        </div>
    </main>

    {{-- Include the Footer --}}
    @include('partials.footer')

</body>
</html>

