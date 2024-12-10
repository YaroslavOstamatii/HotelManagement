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
                <div class="col-6">
                    <div>
                        <h1 class="pad text-2xl">Send mail to {{$contact->name}}</h1>
                    </div>
                    <form action="{{url('mail',$contact->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="pad">
                            <label>Greeting</label>
                            <input type="text" name="greeting">
                        </div>

                        <div class="pad">
                            <label>Mail body</label>
                            <textarea name="body"></textarea>
                        </div>

                        <div class="pad">
                            <label>Action text</label>
                            <input type="text" name="action_text">
                        </div>

                        <div class="pad">
                            <label>Action Url</label>
                            <input type="text" name="action_url">
                        </div>

                        <div class="pad">
                            <label>End line</label>
                            <input type="text" name="end_line">
                        </div>

                        <div class="pad">
                            <input class="btn btn-success" type="submit" value="Send Mail">
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
