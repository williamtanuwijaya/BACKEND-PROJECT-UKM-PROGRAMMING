<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Lessons</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>Update Lesson</h3>
            <form action="{{ route('lessons.update', $lesson->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                  value="{{ $lesson->title }}" required>
              </div>
              <button type="submit" class="btn mt-3 btn-primary">Update Lesson</button>
            </form>
          </div>
        </div>
      </div>
</body>
</html>