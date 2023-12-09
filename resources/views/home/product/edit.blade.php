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
                    <h4 class="card-title">Update Products</h4>
                    <p class="text-success"> 
                      @if(session('message'))
                       {{ session('message') }}
                  @endif  
                    </p>
                    <form class="forms-sample" action="{{url('/products/'.$product->id)}}" method="post" enctype="multipart/form-data">
                      
                        @csrf
                        @method('PUT')
                      <fieldset>
                        <div class="form-group">
                          <label for="exampleInputName1">Product Name</label>
                          <input type="text" class="form-control" id="exampleInputName1" name="product_name" value="{{ $product->product_name }}" >
                        </div>

                        <div class="form-group">
                          <label for="Description">Description</label>
                          <textarea class="form-control" id="Description" rows="4" name="description">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                          <label>Thumbnails</label>
                          
                          <div class="input-group col-xs-12">
                            
                            <input class="form-control file-upload-info" type="file" name="thumbnail_image" placeholder="Upload Image">
                            
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                        </div>

                     
                                         
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
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