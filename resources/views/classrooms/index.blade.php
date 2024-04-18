  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Classrooms</title>
    <style>
      .card {
        margin-bottom: 20px; 
      }

      .bg-custom {
      background-color: #ffeee1; 
    }

    .bg-card-custom {
      background-color: #fffbf8; 
    }

    .bg-nav-custom {
      background-color: #ffcaa5;
    }
    
    .btn-success {
      background-color: #d78a53;
    }
    .btn-success:hover {
      background-color: #ad6f42;
    }
    .btn-success:active {
      background-color: #ad6f42;
    }

    .btn {
      margin-bottom: 5px;
    }

    .btn-primary {
      background-color: #e0b78d;
      border-color: #bb9773;
    }

    .btn-primary:hover {
      background-color: #bf9266;
      border-color: #bb9773;
    }
    .btn-primary:active {
      background-color: #bf9266;
      border-color: #bb9773;
    }


    .btn-delete {
  background-color: #d9534f; 
  color: #fff
  
}

    .card-header {
    background-image: url('https://lh6.googleusercontent.com/proxy/L4JOghvPahJbv5aJds1mB4on0OKgvJcDZCfbCfaHGrq9aK-y-d1fhXVZQuBah_P67YIcjBd4TJriW_tOCYoTlRPhvQhG0UnhTR5tQ6xELVIdhC9Pu2EYC1relMcag-3kNtyy7ROPk9HIEGYsvluCFRk=s0-d');
    background-size: cover;
    background-position: center;
    padding: 40px; /* Sesuaikan sesuai kebutuhan */
    position: relative; /* Menetapkan posisi relatif */
    display: flex; /* Menggunakan flexbox */
    justify-content: center; /* Posisikan elemen ke tengah secara horizontal */
    align-items: center; /* Posisikan elemen ke tengah secara vertikal */
  }

  .card-title {
    margin: 0; /* Menghapus margin default */
    color: #5a3921
  }

    
    </style>  
  </head>   
  <body class="bg-custom">
    <nav class="navbar navbar-expand-lg navbar-light bg-nav-custom">
      <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('classrooms.index') }}>CRUD Classrooms</a>
        <div class="justify-end ">
          <div class="col ">
            <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#create-modal">
              Add Classroom
              <i class="fa-solid fa-plus"></i>
            </a>
          </div>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <h2 class="mb-3">Classroom List</h2> 
      <div class="row">
        @php
          $chunks = $classrooms->chunk(5); 
        @endphp
        @foreach ($chunks as $chunk)
          <div class="row justify-content-start">
            @foreach ($chunk as $classroom)               
              <!-- Modal Edit -->
              <div class="modal fade" id="edit-modal{{ $classroom->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Create New Classroom</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      {{-- INI MERUPAKAN PROGRAM UNTUK EDIT --}}
                      <form action="{{ route('classrooms.update', $classroom->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title"
                            value="{{ $classroom->title }}" required>
                        </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn mt-3 btn-primary">Update Classroom</button> 
                      </form>
                    </div>
                  </form>
                  {{-- AKHIR PROGRAM NYA --}}
                  </div>
                </div>
              </div>

              <div class="col-sm">
                  <div class="card bg-card-custom">
                    <div class="card-header">
                      <h5 class="card-title">{{ $classroom->title }}</h5>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm">  
                          <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-modal{{ $classroom ->id }}">
                            Edit Class
                            <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                        </div>
                        <div class="col-sm">
                          <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                              Delete
                              <i class="fa-solid fa-trash"></i>
                            </button>
                          </form>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>


<!-- Modal Create -->
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create New Classroom</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- INI MERUPAKAN PROGRAM UNTUK CREATE --}}
        <form action="{{ route('classrooms.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <br>
          
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create Classroom</button>
      </div>
    </form>
    {{-- AKHIR PROGRAM NYA --}}
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>
  </html>
