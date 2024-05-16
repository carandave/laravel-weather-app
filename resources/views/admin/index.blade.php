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
        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Welcome, {{Auth::user()->name}}</h3>
            </div>

            <div class="col-md-6 d-flex justify-content-end">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="LogOut">
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card w-50 mx-auto mt-5">
                    <div class="card-header">
                        Weather App {{Auth::id()}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('weather-search')}}" method="post" class="d-flex">
                            @csrf
                            @method('post')
                            <input type="text" name="search" class="form-control mr-3 w-75" placeholder="Search for Location">
                            <input type="submit" class="btn btn-primary btn-block ml-3 w-25" value="Search">
                        </form>

                        <div class="mt-3">
                            @if(isset($weatherData))
                                <div>
                                    <div>
                                        <label for="city">City Name: {{$weatherData['name']}}</label>
                                    </div>

                                    <div>
                                        <label for="city">Country: {{$weatherData['sys']['country']}}</label>
                                    </div>
                                </div>

                                <div>
                                    <label for="city">Temperature: 
                                        {{
                                            $weatherData['main']['temp'];
                                        }}
                                    </label>
                                </div>

                                <div>
                                    @php
                                        $iconUrl = "http://openweathermap.org/img/wn/" . $weatherData['weather'][0]['icon'] . ".png";
                                    @endphp
                                    <label for="city">Weather: <img src="{{$iconUrl}}" alt="Weather Icon"> {{$weatherData['weather'][0]['main']}}</label>
                                </div>

                                <div>
                                    <label for="city">Description: 
                                        {{
                                            $weatherData['weather'][0]['description']
                                        }}
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="city">Humidity: 
                                        {{
                                            $weatherData['main']['humidity']
                                        }}
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="city">Feels Like: 
                                        {{
                                            $weatherData['main']['feels_like']
                                        }}
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="city">Pressure: 
                                        {{
                                            $weatherData['main']['pressure']
                                        }}
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="city">Wind: 
                                            {{
                                                $weatherData['wind']['speed']
                                            }}
                                            </label>
                                    </div>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>`
</body>
</html>