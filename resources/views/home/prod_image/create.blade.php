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

              <!-- Form-->
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Products Images</h4>
                    <p class="text-success"> 
                       @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                    </p>
                    
                    <form class="forms-sample" action="{{url('/productimages/')}}" method="post" enctype="multipart/form-data">
                      
                        @csrf

                      <fieldset>
                        <div class="form-group">
                          <label for="exampleInputName1">Product Name</label>
                          <select name="product" >
                            <option selected>Open this select menu</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                           @endforeach
                        </select>
                        </div>

                        

                        <div class="form-group">
                          <label>Images</label>
                          
                          <div class="input-group col-xs-12">
                            
                            <input class="form-control file-upload-info" type="file" name="file[]" multiple placeholder="Upload Image" required>
                            
                          </div>
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