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
            <div class="text-center">
            <h1 style="font-size: 32px;">Messages</h1>
{{--            <form action="{{url('upload_gallary')}}" method="post" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="p-3">--}}
{{--                    <label>Upload image</label>--}}
{{--                    <input type="file" name="image">--}}
{{--                    @error('image')--}}
{{--                    <div class="text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="pad">--}}
{{--                    <input class="btn btn-success" type="submit" value="Add Image">--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>
        <table class="table">
            <thead>
            <tr>
                <th> id </th>
                <th> Name </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Messages </th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->message}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.footer')
</body>
</html>
