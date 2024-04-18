<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Classrooms</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-qmr8anIpCV5Q6sOFBrIKdS1LvcUd+ED0xFXZrUO7rtf4+PY/IWcVTD+LQZG5sG8w1PKtflzYP+IZQQjzS5Xwiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .bg-nav-custom {
      background-color: #ffcaa5;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-nav-custom">
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>Add a Classroom</h3>
            <form action="{{ route('classrooms.store') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <br>
              <button type="submit" class="btn btn-primary">Create Classroom</button>
            </form>
          </div>
        </div>
      </div>
</body>
</html>
