<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Twitter API</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Laravel 5 - Twitter API</h2>

   
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

        <!--<div class="form-group">
            <label>Add Tweet Text:</label>
            <textarea class="form-control" name="tweet"></textarea>
        </div>-->

        <!--<div class="form-group">
            <button class="btn btn-success">Add New Tweet</button>
        </div>-->
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>List Id</th>
                <th>Slug</th>
                <th>List Name</th>
                <th>Subscribers Count</th>
                <th>Member Count</th>
                <th>Description</th>
            </tr>
        </thead>
        
    
                    @for($i = 0; $i<count($arr); $i++)
                    <tr>
                      <td>{{ $arr[$i]['id_str']}}</td>                 
                      <td>{{ $arr[$i]['slug']}}</td> 
                      <td>{{ $arr[$i]['name']}}</td>
                      <td>{{ $arr[$i]['subscriber_count']}}</td>
                      <td>{{ $arr[$i]['member_count']}}</td>
                      <td>{{ $arr[$i]['description']}}</td>
                    </tr>
                    @endfor 
         
                
            
        </tbody>
    </table>
</div>
        <div class="form-group">
            <label>Add Multiple Images:</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>
</body>
</html>