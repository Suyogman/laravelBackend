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
    <br>
    <br>
    <h1>Employee Management System Laravel Crud</h1>
    <br>
    <a href="{{ route('employees.create') }}"><button type="button" class="btn btn-success">Create Employee</button></a>
    <br>
    <br>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">emp id</th>
        <th scope="col">Employee Name</th>
        <th scope="col">email</th>
        <th scope="col">Company</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($employees as $employee) 
      <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->emp_id}}</td>
        <td>{{$employee->name}}</td>
        <td>{{$employee->email}}</td>
        <td>{{$employee->company?->name}}</td>
        <td>
        <form action="{{ route('employees.destroy', $employee->emp_id )}}" method ="Post">
            <a class="btn btn-primary" href="{{route('employees.edit', $employee->emp_id )}}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class ="btn btn-danger">Delete</button>
        </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

    </div>

  <script src="script.js"></script>
</body>

</html>