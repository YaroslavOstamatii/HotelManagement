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
                    <th> id</th>
                    <th> room_id</th>
                    <th> name</th>
                    <th> email</th>
                    <th> phone</th>
                    <th> status</th>
                    <th> startDate</th>
                    <th> endDate</th>
                    <th> room title</th>
                    <th> room price</th>
                    <th> Room Image</th>
                    <th> Delete</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{$booking->id}}</td>
                        <td>{{$booking->room_id}}</td>
                        <td>{{$booking->name}}</td>
                        <td>{{$booking->email}}</td>
                        <td>{{$booking->phone}}</td>
                        <td>{{$booking->status}}</td>
                        <td>{{$booking->startDate}}</td>
                        <td>{{$booking->endDate}}</td>
                        <td>{{$booking->room->room_title}}</td>
                        <td>{{$booking->room->price}}</td>
                        <td><img src="{{asset('storage/' . $booking->room->image)}}" style="width: 200px"></td>
                        <td>
                            <a onclick="return confirm('are you shure?');" class="btn btn-danger" href="{{url('delete_booking',$booking->id)}}">Delete</a>
                        </td>
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

