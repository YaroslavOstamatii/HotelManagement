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
        </div>
        <table class="table">
            <thead>
            <tr>
                <th> id </th>
                <th> Name </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Messages </th>
                <th> Send Email </th>
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
                    <td> <a class="btn btn-success text-white" href="{{url('send_mail',$item->id)}}"> Send mail</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.footer')
</body>
</html>
