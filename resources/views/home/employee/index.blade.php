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
                    <p class="card-description"> Add class <code>.table-dark</code>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th style="width=5%">ID</th>
                            <th style="width=10%"> Name </th>
                            <th style="width=10%"> Salary </th>
                            <th style="width=10%"> Email </th>
                            <th style="width=10%"> Address </th>
                            <th style="width=10%"> Image </th>
                            <th style="width=10%"> Status </th>
                            <th style="width=35%"> Action </th>
                          </tr>
                        </thead>
                        @foreach($employees as $employee)
                        <tbody>
                          <tr>
                            <td> {{ $employee->id }} </td>
                            <td> {{ $employee->first_name }} {{ $employee->last_name }} </td>
                            <td> {{ $employee->salary }} </td>
                            <td> {{ $employee->email }} </td>
                            <td> {{ $employee->address }} </td>

                            <td class="py-1">
                              <img src="{{asset('/storage/'.$employee->image)}}" alt="image" />
                            </td>

                           <!-- Active/Deactive -->
                           <td class="center">
                            @if($employee->status==1)
                              <span class="label label-success">Employee</span>
                            @else
                              <span class="label label-danger">Resigned</span>
                              @endif
                            </td>

                            <td class="center">
                              <div class="row">
                                    <!--Status-->
                                    

                                    <div class="span2">
                                      @if($employee->status==1)
                                      <a href="{{url('/employee-status'.$employee->id)}}" class="btn btn-success">
                                        <i class="halflings-icon white thumbs-down"></i>  
                                      </a>

                                    @else
                                      <a href="{{url('/employee-status'.$employee->id)}}" class="btn btn-danger" >
                                        <i class="halflings-icon white thumbs-up"></i>  
                                      </a>
                                      @endif
                                  </div>

                                    <!--Edit-->
                                    <div class="span2">
                                      <a href="#" class="btn btn-danger"><i class="halflings-icon white eye-open"></i></a>
                                    </div>
                                      
                                    <!--Show-->
                                    <div class="span2">
                                      <a href="{{ url('/employees/'.$employee->id) }}" class="btn btn-primary"><i class="halflings-icon white eye-open"></i></a>
                                    </div>
  
                                     <!--Delete-->
                                  <form action="{{ url('/employees/'.$employee->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">
                                          <i class="halflings-icon white trash"></i> 
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