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
                    <h4 class="card-title">Image Summary</h4>
                    <a href="{{url('/productimages/create')}}"><button type="button" class="btn btn-success btn-fw">+ Add Image</button></a>
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
                     <p class="text-success"> 
                        @if(session('message'))
                         {{ session('message') }}
                    @endif  
                      </p>

                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th style="width=5%">ID</th>
                            <th style="width=10%"> Name </th>
                            <th style="width=10%"> Image </th>
                            <th style="width=35%"> Action </th>
                          </tr>
                        </thead>
                        @foreach($productimages as $productimage)
                            @php
                                $productimage['image']=explode("|",$productimage->image)
                            @endphp
                        <tbody>
                          <tr>
                            <td> {{ $productimage->id }} </td>
                            <td> {{ $productimage->product->product_name }} </td>
                           <td>
                            @foreach ($productimage->image as $images )
                                <img src="{{ asset('/prod_image/'.$images) }}" alt="image" >
                            @endforeach
                           </td>
                           <td>
                            <form action="{{ url('/productimages/'.$productimage->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="mdi mdi-delete"></i> 
                                </button>
                            </form>
                           </td>
                          </tr>
                          
                        </tbody>
                        @endforeach
                      </table>
                    </div>
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