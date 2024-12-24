<!-- <html>
<div>
    <div>@yield('content');

</div>
<thead> 
    <tr>
      <th>Student</th>

    </tr>

</thead>
<tbody>
    {{$students}}

</tbody>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h1>Danh sách Sinh Viên</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Lớp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
