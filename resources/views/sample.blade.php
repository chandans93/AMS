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
                <li><a href="{{ asset('/gmis')}}" class=" <?php if (request()->path() == '/gmis') {echo 'btn btn-warning disabled btn-lg btn-block';} ?>">GMIS</a></li>
                <li><a href="{{ asset('/lgms')}}" class=" <?php if (request()->path() == '/lgms') {echo 'btn btn-warning disabled btn-lg btn-block';}?> ">LGMS</a></li>
                <li><a href="{{ asset('/lgps')}}" class=" <?php if (request()->path() == '/lgps') {echo 'btn btn-warning disabled btn-lg btn-block';}?>">LGPS</a></li>
                <li><a href="{{ asset('/sdsm')}}" class=" <?php if (request()->path() == '/sdsm') {echo 'btn btn-warning disabled btn-lg btn-block';}?>">SDSM</a></li>
                 <li><a href="{{ asset('/lgpth')}}">LGPTHT</a></li>
                <li><a href="{{ asset('/hstl')}}">HOSTEL</a></li>
                <li><a href="{{ asset('/sdham')}}">SANSAKARDHAM</a></li>
                <li class="timeclass" id="txt"></li>
                      
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
@yield('content')
		
	</body>
</html>

<script>
$(document).ready(function(){

	$('#user_table').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ route('sample.index') }}",
			data:"{{'ASE'}}",
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

	$('#create_record').click(function(){
		$('.modal-title').text('Add New Record');
		$('#action_button').val('Add');
		$('#action').val('Add');
		$('#form_result').html('');

		$('#formModal').modal('show');
	});

	$('#sample_form').on('submit', function(event){
		event.preventDefault();
		var action_url = '';

		if($('#action').val() == 'Add')
		{
			action_url = "{{ route('sample.store') }}";
		}

		if($('#action').val() == 'Edit')
		{
			action_url = "{{ route('sample.update') }}";
		}

		$.ajax({
			url: action_url,
			method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			success:function(data)
			{
				var html = '';
				if(data.errors)
				{
					html = '<div class="alert alert-danger">';
					for(var count = 0; count < data.errors.length; count++)
					{
						html += '<p>' + data.errors[count] + '</p>';
					}
					html += '</div>';
				}
				if(data.success)
				{
					html = '<div class="alert alert-success">' + data.success + '</div>';
					$('#sample_form')[0].reset();
					$('#user_table').DataTable().ajax.reload();
				}
				$('#form_result').html(html);
			}
		});
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		$('#form_result').html('');
		$.ajax({
			url :"/sample/"+id+"/edit",
			dataType:"json",
			success:function(data)
			{
				$('#first_name').val(data.result.first_name);
				$('#last_name').val(data.result.last_name);
				$('#hidden_id').val(id);
				$('.modal-title').text('Edit Record');
				$('#action_button').val('Edit');
				$('#action').val('Edit');
				$('#formModal').modal('show');
			}
		})
	});

	var user_id;

	$(document).on('click', '.delete', function(){
		user_id = $(this).attr('id');
		$('#confirmModal').modal('show');
	});

	$('#ok_button').click(function(){
		$.ajax({
			url:"sample/destroy/"+user_id,
			beforeSend:function(){
				$('#ok_button').text('Deleting...');
			},
			success:function(data)
			{
				setTimeout(function(){
					$('#confirmModal').modal('hide');
					$('#user_table').DataTable().ajax.reload();
					alert('Data Deleted');
				}, 2000);
			}
		})
	});

});function startTime() {
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

