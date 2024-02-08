<footer class="sticky-footer bg-white 
                @if(Route::current()->getName() === 'login' || Route::current()->getName() === 'register')
                  d-none
                @else
                ''
                @endif
              ">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>copyright &copy; <script>
          document.write(new Date().getFullYear());
        </script> - developed by
        <b><a href="https://github.com/Bagora2020/" target="_blank">Gora BA</a></b>
      </span>
    </div>
  </div>
</footer>