<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
</head>
<!-- body -->
<body class="main-layout">
<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#"/></div>
</div>
<!-- end loader -->
<!-- header -->
<header>
    @include('home.header')
</header>
<!-- end header inner -->


<div  class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div id="serv_hover"  class="room">
                        <div class="room_img">
                            <img style="height: 200px; width: 60%; margin: auto;" src="{{asset('storage/' . $room->image)}}" alt="#"/>
                        </div>
                        <div class="bed_room">
                            <h3>{{$room->room_title}}</h3>
                            <p class="p-3"> ">{{$room->description}}</p>
                            <h3 class="p-3">Free wifi: {{$room->wifi}}</h3>
                            <h3 class="p-3">Room type: {{$room->room_type}}</h3>
                            <h3 class="p-3">Room price: {{$room->price}}</h3>
                            <a class="btn btn-info text-white mt-3" href="{{route('room.details')}}?room_id={{ $room->id }}">Room Details</a>
                        </div>
                    </div>
                </div>
        </div>

    </div>
</div>




<!--  contact -->
@include('home.contact')
<!-- end contact -->
<!--  footer -->
@include('home.footer')
<!-- end footer -->
</body>
</html>
