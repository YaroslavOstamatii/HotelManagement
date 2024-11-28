<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }

        input {
            width: 100%;
        }
    </style>
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


<div class="our_room">
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
                <div id="serv_hover" class="room">
                    <div class="room_img">
                        <img style="height: 200px; width: 60%; margin: auto; padding: 10px;"
                             src="{{asset('storage/' . $room->image)}}" alt="#"/>
                    </div>
                    <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <p class="p-3"> ">{{$room->description}}</p>
                        <h3 class="p-3">Free wifi: {{$room->wifi}}</h3>
                        <h3 class="p-3">Room type: {{$room->room_type}}</h3>
                        <h3 class="p-3">Room price: {{$room->price}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h1 style="font-size: 40px!important;">Book Room</h1>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif

                @if($errors)
                    @foreach($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                @endif
                <form action="{{url('add_booking',$room->id)}}" method="Post">
                    @csrf
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{Auth::user()->name ?? ''}}">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="{{Auth::user()->email ?? ''}}">
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone" value="{{Auth::user()->phone ?? ''}}">
                    </div>
                    <div>
                        <label>Start date</label>
                        <input type="date" name="startDate" id="startDate">
                    </div>
                    <div>
                        <label>End date</label>
                        <input type="date" name="endDate" id="endDate">
                    </div>

                    <div class="pt-3">
                        <input class="btn btn-info" type="submit" value="Book Room">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!--  footer -->
@include('home.footer')
<!-- end footer -->
<script type="text/javascript">
    $(function () {
        let today = new Date().toISOString().split('T')[0];
        $('#startDate, #endDate').attr('min', today);
    });


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
