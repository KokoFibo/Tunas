 <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <title>Tunas Jaya</title>
    
        <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        
        @livewireStyles
        
      </head>
      <body>
      @include('partials.navbar')
      @yield('container')
      {{ $slot }}  
        
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
      </body>
    </html>
    <script>
      window.addEventListener('close-modal', event => {
          //$('#addCustomerModal').modal('hide');
          $('.btn-close').click();
          // $('#updateCustomerModal').modal('hide');
          // $('#deleteCustomerModal').modal('hide');
      })

      Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
})
      </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    @stack('scripts')
    @livewireScripts
</body>
</html>