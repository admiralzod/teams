@extends("layout")
@section("content")
<head>
    <title>Approved Leave | Time and Electronic Attendance Monitoring System</title>
</head>
      <br><br><br>
  
<div class="container"> 
@if (Session::has('message11'))
         <div class="alert alert-warning">{{ Session::get('message11') }}</div><br>
@endif
 @if (Session::has('message10'))
         <div class="alert alert-warning">{{ Session::get('message10') }}</div><br>
 @endif
<h2>Approved Leaves for Excecution</h2>
<br>
<div class="label_white"><table class="table table-bordered">
	<thead>
		<tr style="color:white">
                <th>Employee Number</th>
                <th>First Name</th>
                <th>Last Name</th>
				<th>Request date</th>
				<th>Request type</th>
				<th>Start date</th>
				<th>End date</th>
                <th>Days Leave</th>
				<th>Message</th>
                <th>Action</th>
		</tr>
	</thead>
 <?php $a=0; ?>
	<tbody>
     @foreach ($create_requests as $create_request)
		<tr style="color:white">
           
                                <td>{{{ $create_request->employee_number }}}</td>
                                <td>{{{ $create_request->fname}}}</td>
                                <td>{{{ $create_request->lname }}}</td>
            					<td>{{{ $create_request->request_date }}}</td>
            					<td>{{{ $create_request->request_type }}}</td>
            					<td>{{{ $create_request->start_date }}}</td>
            				
            					<td>{{{ $create_request->end_date }}}</td>
            				    <td>{{{ $diff[$a]}}}</td>
            					<td>{{{ $create_request->message }}}</td>
                                
                                
                                @if ($create_request->request_type == 'Sick Leave' or $create_request->request_type == 'Vacation Leave' or $create_request->request_type == 'Force Leave')
                                  {{ Form::open(array('url' => 'deduct', 'method' => 'post', 'autocomplete' => 'off')) }}  
                                {{ Form::hidden('id', $create_request->id) }}
                                {{ Form::hidden('emp_id', $create_request->employee_id) }}
                                {{ Form::hidden('days', $diff[$a]) }}
                                 {{ Form::hidden('start_date', $create_request->start_date) }}
                                    {{ Form::hidden('end_date', $create_request->end_date) }}
                                {{ Form::hidden('type', $create_request->request_type) }}
                                <td>  {{ Form::submit('Execute Leave', array('class' => 'btn btn-info')) }}</td>
                                {{Form::close()}}
                                @endif
                                 @if ($create_request->request_type != 'Sick Leave' and $create_request->request_type != 'Vacation Leave' and $create_request->request_type != 'Force Leave')
                                 {{ Form::open(array('url' => 'leavesummary', 'method' => 'post', 'autocomplete' => 'off')) }}
                                 {{ Form::hidden('id', $create_request->id) }} 
                                    {{ Form::hidden('emp_id', $create_request->employee_id) }}
                                    {{ Form::hidden('start_date', $create_request->start_date) }}
                                    {{ Form::hidden('end_date', $create_request->end_date) }}
                                    {{ Form::hidden('type', $create_request->request_type) }}   
                                       <td>  {{ Form::submit('Execute Leave', array('class' => 'btn btn-danger')) }}</td>
                                    {{Form::close()}}
                                 @endif
                         
		</tr>
      
                                  <?php $a++; ?> 
        @endforeach

	</tbody>
</table></div>
            </div>


                </div>
            </div>
</div>
            <div class = "container" style = "position: fixed; bottom: 0px; width: 100%;  height: 60px; background-color: #2c3e50; padding: 25px 0; text-align:center;">
                  <p style = "color:white;">Copyright &copy; pending. Fare Matrix</p>
            </div>

<script type="text/javascript">


    $(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('b', this).toggleClass("caret caret-up");                
            });
    });
    
</script>