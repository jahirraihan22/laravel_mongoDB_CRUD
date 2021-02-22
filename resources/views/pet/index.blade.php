<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Pet List</title>
    <link rel="stylesheet" href="{{  asset('css/app.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="container">
      <div class="row p-5">
        <a href="{{ route('car') }}" class="btn btn-success">Car</a>
        <a href="{{ route('pet') }}" class="btn btn-success">Pet</a>
      </div>
    </div>
    <div class="container">
    <br />
    @if (Session::has('success'))
      <div class="alert alert-success">
        <p>{{Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Number</th>
        <th>Edit</th>
        <th colspan="2">Delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach($pets as $pet)
      <tr>
        <td>{{$pet->id}}</td>
        <td>{{$pet->name}}</td>
        <td>{{$pet->number}}</td>
        <td><a href="{{ route('pet.edit',$pet->id) }}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{ route('pet.delete',$pet->id) }}" method="post">
            @csrf
            @method("delete")
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
    <a href="{{ route('pet.create') }}" class="btn btn-success">Add a new pet</a>
  </div>
  </body>
</html>
