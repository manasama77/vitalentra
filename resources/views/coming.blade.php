<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VITALENTRA - Coming Soon</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-950 to-gray-800 text-white min-h-screen flex items-center justify-center px-4">
    <div class="flex flex-col items-center justify-center text-center">
        <div>
            <img src="{{ asset('logo_white.png') }}" alt="Logo" class="mx-auto w-100" />
        </div>
        <div>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4">
                VITALENTRA
            </h1>
        </div>
        <div>
            <p class="text-lg md:text-xl text-gray-400 mb-6">
                Something amazing is coming soon.
            </p>
        </div>
    </div>
</body>

</html>
