<!DOCTYPE html>
<html lang="en">
  <!-- head -->
  @include('home.head')
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

              <!-- Form-->
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="text-success"> 
                      @if(session('message'))
                       {{ session('message') }}
                  @endif  
                    </p>
                    <form class="forms-sample" action="{{url('/employees/')}}" method="post" enctype="multipart/form-data">
                      
                        @csrf

                      <fieldset>
                      <div class="form-group">
                        <label for="exampleInputName1">First Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="First Name" name="first_name" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName2">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputName2" placeholder="Last Name" name="last_name" required>
                      </div> 

                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email" required>
                      </div>

                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control" id="phone" placeholder="Mobile" name="phone" required>
                      </div>

                      <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" class="form-control" id="Address" placeholder="Address" name="address" required>
                      </div>

                      

                      <div class="form-group">
                        <label>Picture</label>
                        
                        <div class="input-group col-xs-12">
                          
                          <input class="form-control file-upload-info" type="file" name="image" placeholder="Upload Image">
                          
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="number" class="form-control" id="salary" placeholder="Salary" name="salary" required>
                      </div>

                      <div class="form-group">
                        <label for="DOB">Date of Birth</label>
                        <input type="date" class="form-control" id="DOB" placeholder="Date of Birth" name="dob" required>
                      </div>

                     
                                         
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </fieldset>
                    </form>
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