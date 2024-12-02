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
                    <th> Status Update</th>
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
                        <td>
                            @if($booking->status == 'waiting')
                                <span style="color: yellow">{{$booking->status}}</span>
                            @endif
                            @if($booking->status == 'approve')
                                <span style="color: green">{{$booking->status}}</span>
                            @endif
                            @if($booking->status == 'rejected')
                                <span style="color: red">{{$booking->status}}</span>
                            @endif

                        </td>
                        <td>{{$booking->startDate}}</td>
                        <td>{{$booking->endDate}}</td>
                        <td>{{$booking->room->room_title}}</td>
                        <td>{{$booking->room->price}}</td>
                        <td><img src="{{asset('storage/' . $booking->room->image)}}" style="width: 200px"></td>
                        <td>
                            <a onclick="return confirm('are you shure?');" class="btn btn-danger"
                               href="{{url('delete_booking',$booking->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('approve_booking',$booking)}}">Approve</a>
                            <a class="btn btn-warning" href="{{url('reject_booking',$booking)}}">Reject</a>
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

