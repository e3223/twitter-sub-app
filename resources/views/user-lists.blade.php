<!DOCTYPE html>
<html>
<head>
	<title>Twitter</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>List info table</h2>

   
        {{ csrf_field() }}

        @if(count($errors))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br/>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                <form method="POST" action="{{  route('post.url', ['arr' => $arr[$i]['id_str']]) }}" enctype="multipart/form-data" > 
                {{ csrf_field() }}
                <td>{{ $arr[$i]['name']}}</td>      
                <td>{{ $arr[$i]['id_str']}}</td>                 
                <td>{{ $arr[$i]['slug']}}</td> 
                <td>{{ $arr[$i]['subscriber_count']}}</td>
                <td>{{ $arr[$i]['member_count']}}</td>
                <td>{{ $arr[$i]['description']}}</td>
                <td><input type="file"  required  accept=".csv"   name="users" multiple class="form-control"></td>
                <td><button type='submit' class="btn btn-success">Add New Users</button></td>
                </form>
            </tr>
        @endfor 
           
        </tbody>
    </table>
</div>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div> 
</body>
</html>