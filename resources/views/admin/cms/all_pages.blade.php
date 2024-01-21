<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Pages</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- MODAL -->



<!-- Modal -->
<div class="modal fade" id="exampleModalLong" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{URL('/').'/cms/new'}}" method="post">
    @csrf
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Add New Page</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

            <div class="form-group">
              <label >Page Name</label>
              <input type="text" class="form-control" name="page_name" placeholder="Please enter your page name">
            </div>
            <div class="form-group">
              <label >Page Slug</label>
              <input type="text" class="form-control" name="page_slug" placeholder="Please enter your page slug">
            </div>

            
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>

    </form>
    </div>
  </div>
</div>




<!-- MODAL END -->
<div class="container">
  <h2>All Pages</h2>


  <div class="text-right">
    <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModalLong" > New Page </button>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Page Name</th>
        <th>Page Slug</th>
        <th>Edit</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>

    @if($all_pages)
    @foreach($all_pages as $record)

    <tr>
        <td>{{ $record->name }}</td>
        <td>{{ $record->slug }}</td>
        <td> <a href="{{URL('').'/cms/edit/'.$record->slug}}"> <button class="btn btn-warning" > Edit</button> </a>  </td>
        <td> <a href="{{URL('').'/'.$record->slug}}"> <button class="btn btn-success"> View</button> </a> </td>

      </tr>


    @endforeach
    @else
<h2> No Pages Found</h2>
    @endif
    
    </tbody>
  </table>
</div>

</body>
</html>
