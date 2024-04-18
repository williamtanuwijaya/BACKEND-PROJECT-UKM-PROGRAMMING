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
            <h3>Add a Student</h3>
            <form action="{{ route('lessons.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="title">Classroom ID</label>
                <input type="text" class="form-control" id="classroom_id" name="classroom_id" required>
              </div>
              <div class="form-group">
                <label for="title">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" required>
              </div>
              <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="title">Password</label>
                <input type="text" class="form-control" id="password" name="password" required>
              </div>
              <div class="form-group">
                <label for="title">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" required>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Create Student</button>
            </form>
          </div>
        </div>
      </div>
</body>
</html>