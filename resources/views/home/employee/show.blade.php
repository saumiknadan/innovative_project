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

              <!-- Employee Info-->
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{$employee->first_name}} {{$employee->last_name}}</h4>
                    <img src="{{ asset('/storage/'.$employee->image) }}" alt="image" class="rounded-circle" style="width: 150px; height: 150px;">


                    <p class="card-text">

                      <strong>Email:</strong> {{ $employee->email }} <br>
                      <strong>Phone:</strong> {{ $employee->phone }} <br>
                      <strong>Address:</strong> {{ $employee->address }} <br>
                      <strong>Salary:</strong>BDT: {{ $employee->salary }} <br>
                      <strong>Date of Birth:</strong> {{ $employee->dob }} <br>
                      <strong>Employment Status:</strong> 
                          @if($employee->status==1)
                          <span class="label label-success">On work</span>
                        @else
                          <span class="label label-danger">Resigned</span>
                          @endif <br>
                    
                    </p>
                   
                  </div>
                </div>
              </div>
              
              
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