<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{trans('labels.appname')}}</title>
    <link rel="stylesheet" href="{{ asset('css/components.css')}}">
    <link rel="stylesheet" href="{{ asset('css/icons.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsee.css')}}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('owl-carousel/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lightcase.css')}}">
    
    <!-- CUSTOM STYLE -->      
    <link rel="stylesheet" href="{{ asset('css/template-style.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,700,900&amp;subset=latin-ext" rel="stylesheet"> 
  
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>

  </head>

  <body class="size-1280" onload="startTime()">
    
   
    <!-- HEADER -->
    <header role="banner" class="position-absolute">    
      <!-- Top Navigation -->
      <nav class="background-transparent background-primary-dott full-width sticky">          
        <div class="top-nav"> 
          <!-- mobile version logo -->              
          <div class="logo hide-l hide-xl hide-xxl">
             <a href="index.html" class="logo">
              <!-- Logo White Version -->
              <img class="logo-white" src="img/logo.png" alt="">
              <!-- Logo Dark Version -->
              <img class="logo-dark" src="img/logo.png" alt="">
            </a>
          </div>                  
          <p class="nav-text"></p>
          
          <!-- left menu items -->
          <div class="top-nav left-menu">
             <ul class="right top-ul chevron">
                <li><a href="{{ asset('/ase')}}" class=" <?php if (request()->path() == 'ase') {echo 'active';} ?>">ASE</a></li>
                <li><a href="{{ asset('/gmis')}}" class=" <?php if (request()->path() == '/gmis') {echo 'active';} ?>">GMIS</a></li>
                <li><a href="{{ asset('/lgms')}}" class=" <?php if (request()->path() == '/lgms') {echo 'active';}?> ">LGMS</a></li>
                <li><a href="{{ asset('/lgps')}}" class=" <?php if (request()->path() == '/lgps') {echo 'active';}?>">LGPS</a></li>
                <li><a href="{{ asset('/sdsm')}}" class=" <?php if (request()->path() == '/sdsm') {echo 'active';}?>">SDSM</a></li>
             </ul>
          </div>
          <!-- logo -->
          <ul class="logo-menu">
            <a href="{{ asset('/')}}" class="logo">
              <!-- Logo White Version -->
              <img class="logo-white" src="img/logo.png" alt="">
              <!-- Logo Dark Version -->
              <img class="logo-dark" src="img/logo.png" alt="">
            </a>
          </ul>          
          <!-- right menu items -->
          <div class="top-nav right-menu">
             <ul class="top-ul chevron">
                 <li><a href="{{ asset('/lgpth')}}">LGPTHT</a></li>
                <li><a href="{{ asset('/hstl')}}">Hostel</a></li>
                <li><a href="{{ asset('/sdham')}}">Sanskardham</a></li>
                <li class="timeclass" id="txt"></li>

             </ul>
              
          </div>
        </div>
      </nav>
    </header>
    @yield('content')
    
    <script type="text/javascript" src="{{ asset('js/responsee.js')}}"></script>
    <script type="text/javascript" src="{{ asset('owl-carousel/owl.carousel.js')}}"></script>
  

    <script type="text/javascript" src="{{ asset('js/template-scripts.js')}}"></script> 
    
  </body>
</html>