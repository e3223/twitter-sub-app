<html>
<head>
	<title>Twitter</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    
<div class="container">
 

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>List Name</th>
                <th>List mode</th>
                <th>Description</th>
                <th>Click to create</th>
            </tr>
        </thead>     

            <tr>
            <form method="POST" action="{{  route('post.create') }}"  enctype="multipart/form-data" > 
                {{ csrf_field() }}
                <td><input type="text"    name="name"></td>      
                <td><input type="radio"   name="public" value="public" checked>Public<br>
                    <input type="radio"   name="public" value="private" >Private</td>                 
                <td><input type="text"    name="desc" ></td> 
                <td><button type='submit' name="create" class="btn btn-success">Create new list! </button></td>
                </form>
            </tr>
           
        </tbody>
    </table>
<div class="flash-message">
    @foreach (['danger', 'error', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">
      {{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </p>
      @endif
    @endforeach
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
</div>
    
    
    
    
    
    
    
    
    
    
    
</body>
</html>