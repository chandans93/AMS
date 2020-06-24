 @extends('vms')
@section('content')
    <main role="main">    
      <!-- Header -->
      <header class="section-top-padding background-image text-center" style="background-image:url(img/img-05.jpg)">

        
        <div class="container text-extra-thin text-line-height-1 margin-bottom-40 margin-top-130" style="  font-size: 20px;text-transform: uppercase;color:#a53636" >
          <div class="row" >
            <div class="col-md-1 col-lg-1">
              Emp_No
            </div>
             <div class="col-md-3 col-lg-3">
              Name
            </div>
             <div class="col-md-2 col-lg-2">
              Designetion
            </div>
             <div class="col-md-2 col-lg-2">
              In-time
            </div>
             <div class="col-md-1 col-lg-1">
              Break Start
            </div>
             <div class="col-md-1 col-lg-1">
               Break end
            </div>
             <div class="col-md-2 col-lg-2">
              Out-Time
            </div>
          </div>
           @foreach ($staffdetail as $key => $value)
            <form style="  font-size: 14px;color:black; text-align: left; ">
            <div class="row" style=" border-style: solid;" >
            <div class="col-md-1 col-lg-1">
              {{$value->employee_no}}
            </div>
             <div class="col-md-3 col-lg-3">
              {{$value->employee_name}}
            </div>
             <div class="col-md-2 col-lg-2">
              {{$value->designation}}
            </div>
             <div class="col-md-2 col-lg-2">
             <button type="submit" class="btn btn-success btn-block">IN</button>
            </div>
             <div class="col-md-1 col-lg-1">
              <button type="submit" class="btn btn-primary ">Break Out</button>
            </div>
             <div class="col-md-1 col-lg-1">
               <button type="submit" class="btn btn-primary ">Break In</button>
            </div>
             <div class="col-md-2 col-lg-2">
              <button type="submit" class="btn btn-danger btn-block">OUT</button>
            </div>
          </div>
        </form>
        @endforeach
        </div>

              

       
        <!-- Image -->
       
        <!-- dark full width arrow object -->
       
      </header>
      
    </main>