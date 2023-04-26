<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead

    <link rel="stylesheet" href="{{ asset('icon/flower_loading.css') }}">
</head>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src='https://unpkg.com/ml5@latest/dist/ml5.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js'></script>


<body class="font-sans antialiased">

@if (session()->has('successMessage'))

    <div id="successMessage" class="fixed bottom-0 left-1/2 transform -translate-x-1/2 z-9999">
        <div class="bg-white">
            <div class="w-96 rounded-lg overflow-hidden shadow-md py-5 flex">
                <div class="flex-grow-1 my-auto">
                    <p class="text-center ml-12">{{ session()->get('successMessage') }}</p>
                </div>
                <div class="flex items-center ml-auto">
                    <div class="flex flex-col justify-between p-4">
                        <span class="flower-loader h-150"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function(){
            document.getElementById('successMessage').style.display = 'none';
        }, 8000); // 8秒後にメッセージを非表示にする
    </script>
@endif

@if (session()->has('failMessage'))
    <div id="failMessage" class="fixed bottom-0 left-1/2 transform -translate-x-1/2 z-9999">
        <div class="bg-white">
            <div class="w-96 rounded-lg overflow-hidden shadow-md py-5 flex">
                <div class="flex-grow-1 my-auto">
                    <p class="text-center ml-12">{{ session()->get('failMessage') }}</p>
                </div>
                <div class="flex items-center ml-auto">
                    <div class="flex flex-col justify-between p-4">
                        <span class="flower-loader h-150"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function(){
            document.getElementById('failMessage').style.display = 'none';
        }, 8000); // 8秒後にメッセージを非表示にする
    </script>
@endif
@inertia
</body>
</html>
