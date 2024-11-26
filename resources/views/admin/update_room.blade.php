<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }

        .pad {
            padding: 10px;
        }
    </style>
</head>
<body>
@include('admin.header')
@include('admin.sidebar')

<div class="page-content ">
    <div class="page-header">
        <div class="container-flex ">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-6 ">
                    <div>
                        <h1 class=" pad text-2xl">Update Rooms</h1>
                    </div>
                    <form action="{{route('rooms.update',$id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="pad">
                            <label>Room Title</label>
                            <input type="text" name="room_title" value="{{$id->room_title}}">
                            @error('room_title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="pad">
                            <label>Description</label>
                            <textarea name="description">{{$id->description}}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="pad">
                            <label>Price</label>
                            <input type="number" name="price" value="{{$id->price}}">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="pad">
                            <label>Room type</label>
                            <select name="room_type">
                                <option selected value="{{$id->room_type}}"> {{$id->room_type}} </option>
                                <option value="regular"> Regular</option>
                                <option value="premium"> Premium</option>
                                <option value="deluxe"> Deluxe</option>
                            </select>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="pad">
                            <label>Free WIFI</label>
                            <select name="wifi">
                                <option selected value="{{$id->wifi}}"> {{$id->wifi}} </option>
                                <option value="yes"> Yes</option>
                                <option value="no"> No</option>
                            </select>
                            @error('wifi')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="pad">
                            <label>Current image</label>
                            <img src="{{asset('storage/' . $id->image)}}" style="width: 400px">
                        </div>

                        <div class="pad">
                            <label>Upload image</label>
                            <input type="file" name="image">
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="pad">
                            <input class="btn btn-success" type="submit" value="Update Room">
                        </div>
                    </form>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
    </div>

@include('admin.footer')
</body>
</html>
