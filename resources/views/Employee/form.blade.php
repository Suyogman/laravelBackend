<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Form</title>
  <!-- Add Bootstrap CDN -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 50px;
    }

    .card {
      border: 1px solid #17a2b8;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #17a2b8;
      color: #fff;
      text-align: center;
      padding: 15px;
      border-radius: 10px 10px 0 0;
    }

    .btn-primary {
      background-color: #17a2b8;
      border: 1px solid #17a2b8;
    }

    .btn-primary:hover {
      background-color: #138496;
      border: 1px solid #138496;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3>Employee Form</h3>
        </div>
        <div class="card-body">
          <form action = "{{ route('form')}}" method ="POST">
          @csrf
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"  placeholder="Enter your name" >
              @error('name')
            <div class="alert aleart-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" placeholder="Enter your email">
              @error('email')
            <div class="alert aleart-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="company">Password:</label>
              <input type="password" class="form-control" name="password" placeholder="Enter your password" >
              @error('password')
            <div class="alert aleart-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="">Confirm new password:</label>
              <input type="password" class="form-control" name="confirm"  placeholder="Confirm new password" >
              @error('confirm')
            <div class="alert aleart-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Bootstrap JS and Popper.js CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
