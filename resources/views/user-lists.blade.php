<!DOCTYPE html>
<html>
<head>
	<title>Twitter</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<a href="create-list" class="action-button shadow animate blue">Create new list</a>
<div class="container">
    <h2>List info table</h2>   
        {{ csrf_field() }}


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>List Name</th>
                <th>List Id</th>
                <th>Slug</th>
                <th>Subscribers Count</th>
                <th>Member Count</th>
                <th>Description</th>
                <th>the .csv file</th>
                <th>Add users</th>
            </tr>
        </thead>     
                
        @for($i = 0; $i<count($arr); $i++)
            <tr>
                <form method="POST" action="{{  route('post.url', ['arr' => $arr[$i]['id_str']]) }}"  enctype="multipart/form-data" > 
                {{ csrf_field() }}
                <td>{{ $arr[$i]['name']}}</td>      
                <td>{{ $arr[$i]['id_str']}}</td>                 
                <td>{{ $arr[$i]['slug']}}</td> 
                <td>{{ $arr[$i]['subscriber_count']}}</td>
                <td>{{ $arr[$i]['member_count']}}</td>
                <td>{{ $arr[$i]['description']}}</td>
                <td><input type="file" accept=".csv" name="users" multiple class="form-control"></td>
                <td><button type='submit' name="create" class="btn btn-success">Add New Users</button><button type='submit' name="delete" class="btn btn-danger delete-object">Delete list</button></td>
                </form>
            </tr>
        @endfor 
           
        </tbody>
    </table>         
</div>
        @if(count($errors))
            <div class="alert alert-danger">
                <strong>Whoops!</strong>
                <br/>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<div class="flash-message">
    @foreach (['danger', 'error', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">
      {{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </p>
      @endif
    @endforeach
  </div> 
<style>
    
.animate
{
	transition: all 0.1s;
	-webkit-transition: all 0.1s;
}

.action-button
{
	position: relative;
	padding: 10px 40px;
  margin: 10px 115px 10px 20px;
  float: right;
	border-radius: 10px;
	font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;;
	font-size: 25px;
	color: #FFF;
	text-decoration: none;	
}

.blue
{
	background-color: #3498DB;
	border-bottom: 5px solid #2980B9;
	text-shadow: 0px -2px #2980B9;
}

.action-button:active
{
	transform: translate(0px,5px);
        -webkit-transform: translate(0px,5px);
	border-bottom: 1px solid;
}
a:hover{text-decoration: none;}
</style>
</body>
</html>