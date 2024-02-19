<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">

  <form action="{{ route('employees.store')}}" method ="POST">
    @csrf
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employee name :</strong>
            <input type="text" name="name" placeholder="name">
            @error('name')
            <div class="alert aleart-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employee email :</strong>
            <input type="email" name="email" placeholder="email">
            @error('email')
            <div class="alert aleart-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Company :</strong>
            <select name="emp_id" class="form-control">
                <option value="">[--select--]</option>
                @foreach ($companies as $company)
                  <option value="{{ $company->id }}"> {{$company->name}} </option>
                @endforeach
            </select>
            @error('emp_id')
            <div class="alert aleart-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
      
        <button type ="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


    </div>


  <script src="script.js"></script>
</body>

</html>