 <!doctype html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <title>Tunas Jaya</title>
     {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
     @livewireStyles
 </head>

 <body>
     @include('partials.navbar')
     @yield('container')
     {{ $slot }}
     {{-- </body> --}}
     <script>
         window.addEventListener('close-modal', event => {
             //$('#addCustomerModal').modal('hide');
             // $('#updateCustomerModal').modal('hide');
             // $('#deleteCustomerModal').modal('hide');
             $('.btn-close').click();
         })
     </script>
     @include('sweetalert::alert')

     {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
     @livewireScripts
 </body>

 </html>
