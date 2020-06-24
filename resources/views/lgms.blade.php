<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{trans('labels.appname')}}</title>
		<script src="{{ asset('/js/jquery.min.js')}}"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="{{ asset('/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{ asset('/js/dataTables.bootstrap.min.js')}}"></script>		
		<link rel="stylesheet" href="{{ asset('/css/dataTables.bootstrap.min.css')}}" />
		<script src="{{ asset('/js/bootstrap.min.js')}}"></script>
	</head>
	<body onload="startTime()">
		<section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container" style="height: 50px">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ asset('/')}}"><img src="{{asset('img/logo.png')}}"  alt="logo" style="height: 60px" /></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav" style="font-size: 20px; font-weight: bold;">
             <li><a href="{{ asset('/ase')}}" class=" @if (request()->path() == 'ase')'btn btn-warning disabled btn-lg btn-block' @endif">ASE</a></li>
                <li><a href="{{ asset('/gmis')}}" class="@if (request()->path() == 'gmis')'btn btn-warning disabled btn-lg btn-block' @endif">GMIS</a></li>
                <li><a href="{{ asset('/lgms')}}" class="@if (request()->path() == 'lgms')'btn btn-warning disabled btn-lg btn-block' @endif">LGMS</a></li>
                <li><a href="{{ asset('/lgps')}}" class="@if (request()->path() == 'lgps')'btn btn-warning disabled btn-lg btn-block' @endif">LGPS</a></li>
                <li><a href="{{ asset('/sdsm')}}" class=" @if (request()->path() == 'sdsm')'btn btn-warning disabled btn-lg btn-block' @endif">SDSM</a></li>
                 <li><a href="{{ asset('/lgpth')}}" class=" @if (request()->path() == 'lgpth')'btn btn-warning disabled btn-lg btn-block' @endif">LGPTH</a></li>
                <li><a href="{{ asset('/hstl')}}" class=" @if (request()->path() == 'hstl')'btn btn-warning disabled btn-lg btn-block' @endif">HOSTEL</a></li>
                <li><a href="{{ asset('/sdham')}}" class=" @if (request()->path() == 'sdham')'btn btn-warning disabled btn-lg btn-block' @endif" >SANSAKARDHAM</a></li>
                <li class="timeclass" id="txt"></li>
                      
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
<div class="container">    
			<div class="table-responsive">
				<table id="user_table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">EMP_NO</th>
				            <th width="30%">Name</th>
				            <th width="20%">Designetion</th>
				            <th width="40%">Action</th>
						</tr>
					</thead>
				</table>
			</div>
			<br />
			<br />
		</div>
		
	</body>
</html>
<input type="hidden" name="ASE" value="ASE">
<script>
$(document).ready(function(){

	$('#user_table').DataTable({
		pageLength: 20,
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ route('sample.index') }}",
			data : {"_token":"{{ csrf_token() }}" ,"site":"LGMS"},
		},
		columns: [
			{
				data: 'employee_no',
				name: 'employee_no'
			},
			{
				data: 'employee_name',
				name: 'employee_name'
			},
			{
				data: 'designation',
				name: 'designation',
			},
			{
				data: 'action',
				name: 'action',
				orderable: false
			}
		]
	});

	$(document).on('click', '.in', function(){
		var id = $(this).attr('id');
		$('#form_result').html('');
		$.ajax({
			url :"/sample/in/"+id,
			dataType:"json",
			type: 'POST',
			data : {"_token":"{{ csrf_token() }}"},
			success:function(data)
			{;
			}
		})
	});
	$(document).on('click', '.breakout', function(){
		var id = $(this).attr('id');
		$('#form_result').html('');
		$.ajax({
			url :"/sample/breakout/"+id,
			dataType:"json",
			type: 'POST',
			data : {"_token":"{{ csrf_token() }}"},
			success:function(data)
			{;
			}
		})
	});
	$(document).on('click', '.breakin', function(){
		var id = $(this).attr('id');
		$('#form_result').html('');
		$.ajax({
			url :"/sample/breakin/"+id,
			dataType:"json",
			type: 'POST',
			data : {"_token":"{{ csrf_token() }}"},
			success:function(data)
			{;
			}
		})
	});
	$(document).on('click', '.out', function(){
		var id = $(this).attr('id');
		$('#form_result').html('');
		$.ajax({
			url :"/sample/out/"+id,
			dataType:"json",
			type: 'POST',
			data : {"_token":"{{ csrf_token() }}"},
			success:function(data)
			{;
			}
		})
	});
});

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

