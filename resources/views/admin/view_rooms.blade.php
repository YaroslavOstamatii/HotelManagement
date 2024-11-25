</html>
<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
</head>
<body>
@include('admin.header')
@include('admin.sidebar')
<div class="page-content">
    <div class="page-header">
        <div class="container-fluid d-flex justify-content-between">

            <table class="table">
                <thead>
                <tr>
                    <th> room_title</th>
                    <th> image</th>
                    <th> description</th>
                    <th> price</th>
                    <th> wifi</th>
                    <th> room_type</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{$room->room_title}}</td>
                    <td><img src="{{asset('storage/' . $room->image)}}" style="width: 200px"></td>
                    <td>{{$room->description}}</td>
                    <td>{{$room->price}}</td>
                    <td>{{$room->wifi}}</td>
                    <td>{{$room->room_type}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>


@include('admin.footer')
</body>
</html>

