<table border="2">
    <thead>
        <tr>
        <td>Name</td>
        <td>Age</td>
        <td>Email</td>
        <td>Phone</td>
        <td>City</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            @empty($student->age)
                <td>{{'Null'}}</td>
            @else
            <td>{{$student->age}}</td>
            @endempty
            <td>{{$student->email}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->city_id}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
