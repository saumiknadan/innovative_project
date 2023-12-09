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
                    <h4 class="card-title">Inverse table</h4>
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
                            <th style="width=10%"> Product Name </th>
                            <th style="width=10%"> Description </th>
                            <th style="width=10%"> Price </th>
                            <th style="width=10%"> Thumbnails </th>
                            <th style="width=10%"> Status </th>
                            <th style="width=35%"> Action </th>
                          </tr>
                        </thead>
                        @foreach($products as $product)
                        <tbody>
                          <tr>
                            <td> {{ $product->id }} </td>
                            <td> {{ $product->product_name }}</td>
                            <td> {{ $product->description }} </td>
                            <td> {{ $product->price }} </td>
                            
                            <td class="py-1">
                              <img src="{{asset('/storage/'.$product->thumbnail_image)}}" alt="image" />
                            </td>

                           <!-- Active/Deactive -->
                           <td class="center">
                            @if($product->status==1)
                              <span class="label text-success">Active</span>
                            @else
                              <span class="label text-danger">Deactive</span>
                              @endif
                            </td>

                            <td class="center">
                              <div class="row">
                                    <!--Status-->
                                    

                                    <div class="span2">
                                      @if($product->status==1)
                                      <a href="{{url('/product-status'.$product->id)}}" class="btn btn-success">
                                        <i class="mdi mdi-thumb-down"></i>  
                                      </a>

                                    @else
                                      <a href="{{url('/product-status'.$product->id)}}" class="btn btn-danger" >
                                        <i class="mdi mdi-thumb-up"></i>  
                                      </a>
                                      @endif
                                  </div>

                                    <!--Edit-->
                                    <div class="span2">
                                      <a href="{{url('/products/'.$product->id.'/edit/')}}" class="btn btn-warning"><i class="mdi mdi-pencil"></i></a>
                                    </div>
                                      
                                    <!--Show-->
                                    <div class="span2">
                                      <a href="{{ url('/products/'.$product->id) }}" class="btn btn-info"><i class="mdi mdi-eye"></i></a>
                                    </div>
  
                                     <!--Delete-->
                                  <form action="{{ url('/products/'.$product->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">
                                          <i class="mdi mdi-delete"></i> 
                                      </button>
                                  </form>
                                  
                              </div>
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