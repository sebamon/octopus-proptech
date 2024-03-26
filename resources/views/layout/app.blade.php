<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Octopus Proptech Challenge</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="container mx-auto px-4 flex flex-col">
    <section>
        <header class="mb-10">
            <x-NavBar> </x-NavBar>
        </header>
    </section>
    @yield('content')      

    {{-- <x-Footer></x-Footer> --}}
</body>

</html>