<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .closebtnsuccess , .closebtndanger {
            margin-left: 15px;
            color: rgb(48, 38, 38);
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        .closebtnsuccess:hover {
            color: black;
            scale: 2;
        }

        .closebtndanger:hover {
            color: red;
            scale: 2;
        }

    </style>
</head>

<body style="background: url('https://images.unsplash.com/photo-1633647517075-3bdafbc7b68c?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&dl=arcode-acd-BKwECQ5MxM0-unsplash.jpg&w=1920');">

    @if (isset($status))
        <div class="alert alert-success">
            <span class="closebtnsuccess" onclick="this.parentElement.style.display='none';">&times</span>
            {{ $status }}
        </div>
    @elseif (isset($error))
        <div class="alert alert-danger">
            <span class="closebtndanger" onclick="this.parentElement.style.display='none';">&times</span>
            {{ $error }}
        </div>
    @endif

    <div class="main"
        style="width: 500px; margin:20px auto; border: 5px solid #4165b4; padding: 20px; border-radius: 10px; background-color: rgb(59, 59, 59)">
        <div class="row">
            <div class="col-lg-12 margin-tb" style="padding-bottom: 15px">
                <div class="pull-left" style="color: rgb(255, 247, 247); border-bottom: 3px solid #4165b4; width: 40%">
                    <h2 style="color: rgb(255, 247, 247); text-align: center; ">Contact us</h2>
                </div>
            </div>
        </div>

        <form action="{{ url('/contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:20px 20px 0px 20px">
                    <div class="form-group">
                        <strong style="color: white">Name:</strong>
                        <input type="text"
                            style="margin-top:10px; font-size:14px; padding:8px; border: 3px solid #4165b4"
                            name="name" value="@if(isset($input["name"])){{ $input["name"] }}@endif"
                            class="form-control" placeholder="Your Name Please">

                            @if (isset($validationErrors))
                                <div style="color: red">
                                    {{ $validationErrors->first('name') }}
                                </div>
                            @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:20px 20px 0px 20px">
                    <div class="form-group">
                        <strong style="color: white">Email:</strong>
                        <input type="email"
                            style="margin-top:10px; font-size:14px; padding:8px; border: 3px solid #4165b4"
                            name="email" value="@if (isset($input["email"]))
                            {{ $input["email"] }}
                        @endif" class="form-control" placeholder="Your Valid Email">
                        @if (isset($validationErrors))
                            <div style="color: red">
                                {{ $validationErrors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="padding:20px 20px 20px 20px">
                    <div class="form-group">
                        <strong style="color: white">Message:</strong>
                        <textarea style="margin-top:10px; font-size:14px; padding:8px; border: 3px solid #4165b4" name="message" maxlength="100" class="form-control" placeholder="Your Query">@if(isset($input["message"])){{ $input["message"] }}@endif</textarea>
                        @if (isset($validationErrors))
                            <div style="color: red">
                                {{ $validationErrors->first('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" style="background-color:#4165b4">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
