<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Classrooms</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('classrooms.index') }}>CRUD Classrooms</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('classrooms.create') }}>Add Classroom</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      @foreach ($classrooms as $classroom)
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">{{ $classroom->title }}</h5>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm">
                  <a href="{{ route('classrooms.edit', $classroom->id) }}"
            class="btn btn-primary btn-sm">Edit</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</body>
</html>