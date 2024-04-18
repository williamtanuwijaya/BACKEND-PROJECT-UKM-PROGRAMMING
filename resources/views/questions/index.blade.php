<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Students</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('students.index') }}>CRUD Students</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('students.create') }}>Add Student</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      @foreach ($students as $student)
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">{{ $student->nisn }}</h5>
            </div>
            <div class="card-body">
              <h5 class="card-title">Classroom ID&emsp;: {{ $student->classroom_id }}</h5>
              <h5 class="card-title">Student Name&ensp;: {{ $student->name }}</h5>
              <h5 class="card-title">Gender &emsp;&emsp;&emsp;&ensp;: {{ $student->gender }}</h5>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm">
                  <a href="{{ route('students.edit', $student->id) }}"
            class="btn btn-primary btn-sm">Edit</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
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