<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">

            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                      <h3 class="mb-0">Register</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{route('register-insert')}}" method="POST">
                            @csrf
                            @method('post')
                            <div>
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" >

                                @if($errors->has('name'))
                                    <div class="alert alert-danger mt-2" style="padding: 7px;">
                                        <small>{{$errors->first('name')}}</small>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" >
                                @if($errors->has('email'))
                                    <div class="alert alert-danger mt-2" style="padding: 7px;">
                                        <small>{{$errors->first('email')}}</small>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" >
                                @if($errors->has('password'))
                                    <div class="alert alert-danger mt-2" style="padding: 7px;">
                                        <small>{{$errors->first('password')}}</small>
                                    </div>
                                @endif
                            </div>
                            <a href="{{route('login')}}">Already have an account?</a>
                            <input type="submit" class="btn btn-primary btn-block mt-3" value="Register">
                        </form>
                    </div>
                  </div>
            </div>

            <div class="col-md-3">

            </div>
        </div>
        
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>`
</body>
</html>