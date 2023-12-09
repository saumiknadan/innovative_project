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
                    <h4 class="card-title">Create Products</h4>
                    <p class="text-success"> 
                      @if(session('message'))
                       {{ session('message') }}
                  @endif  
                    </p>
                    <form class="forms-sample" action="{{url('/products/')}}" method="post" enctype="multipart/form-data">
                      
                        @csrf

                      <fieldset>
                        <div class="form-group">
                          <label for="exampleInputName1">Product Name</label>
                          <input type="text" class="form-control" id="exampleInputName1" placeholder="Product Name" name="product_name" required>
                        </div>

                        <div class="form-group">
                          <label for="Description">Description</label>
                          <textarea class="form-control" id="Description" rows="4" name="description"></textarea>
                        </div>

                        <div class="form-group">
                          <label>Thumbnails</label>
                          
                          <div class="input-group col-xs-12">
                            
                            <input class="form-control file-upload-info" type="file" name="thumbnail_image" placeholder="Upload Image">
                            
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="number" class="form-control" id="price" placeholder="Price" name="price" required>
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