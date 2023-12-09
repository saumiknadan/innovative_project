<!DOCTYPE html>
<html lang="en">
  <!-- head -->
  <head>
    @include('home.head')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('home.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('home.navbar')
      
        <!-- Main Part-->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <h1>All three modules are done and linked in the sidebar.</h1>
            </div>
          </div>
        </div>
        
        
        <!-- main-panel ends -->
      </div>

      
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('home.script')

    
  </body>
</html>