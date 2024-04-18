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
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>Update Student</h3>
            <form action="{{ route('students.update', $student->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="title">Classroom ID</label>
                <input type="text" class="form-control" id="classroom_id" name="classroom_id"
                  value="{{ $student->classroom_id }}" required>
              </div>
              <div class="form-group">
                <label for="title">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn"
                  value="{{ $student->nisn }}" required>
              </div>
              <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                  value="{{ $student->name }}" required>
              </div>
              <div class="form-group">
                <label for="title">Password</label>
                <input type="text" class="form-control" id="password" name="password"
                  value="{{ $student->password }}" required>
              </div>
              <div class="form-group">
                <label for="title">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender"
                  value="{{ $student->gender }}" required>
              </div>
              <button type="submit" class="btn mt-3 btn-primary">Update Student</button>
            </form>
          </div>
        </div>
      </div>
</body>
</html>