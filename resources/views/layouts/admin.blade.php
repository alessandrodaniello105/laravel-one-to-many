<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Font-Awesome 6.4.2 free --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==' crossorigin='anonymous'/>

    <title>Admin - @yield('title')</title>
    <!-- Usando Vite -->
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
</head>
<body>

    @include('admin.partials.header')

    <div class="main-wrapper d-flex">
        @include('admin.partials.sidebar')

        <div class="section-container pt-3 px-3">
            <div class="section">
                @yield('content')
            </div>
        </div>
    </div>


</body>
</html>
