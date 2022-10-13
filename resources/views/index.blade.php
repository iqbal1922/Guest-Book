<!doctype html>
<?Php
$ArrContextOptions=Array(
    "Ssl"=>Array(
        "Verify_peer"=>False,
        "Verify_peer_name"=>False,
    ),
);
$LinkAPI = "https://d.kapanlaginetwork.com/banner/test/province.json";
$Response = File_get_contents($LinkAPI, False, Stream_context_create($ArrContextOptions));
// Mendecode Prov.Json
$Data = Json_decode($Response, True);

$ArrContextOptions=Array(
    "Ssl"=>Array(
        "Verify_peer"=>False,
        "Verify_peer_name"=>False,
    ),
);
$LinkAPI = "https://d.kapanlaginetwork.com/banner/test/city.json";
$Response = File_get_contents($LinkAPI, False, Stream_context_create($ArrContextOptions));
// Mendecode Prov.Json
$dataCity = json_decode($Response, True);

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Guest Book!</title>
  </head>
  <body>
    <header class="mb-auto">
      <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
              <div class="container">
                  <a class="navbar-brand" href="#">
                      {{ config('Guest Book', 'Guest Book') }}
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav mr-auto">

                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->name }}
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest

                      </ul>
                  </div>
              </div>
          </nav>
      </div>
    </header>

<br>
    <div class="container">
      <div class="card">
          <div class="card-header">Guestbook form:</div>
          <div class="card-body">

    <form action="{{route('create')}}" method="post">
      {{ csrf_field() }}
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">First Name</label>
           <input type="text" class="form-control" placeholder="First name" name="first_name">
        </div>

        <div class="form-group col-md-6">
          <label for="inputPassword4">Last Name</label>
          <input type="text" class="form-control" placeholder="Last name" name="last_name">
        </div>
      </div>

      <div class="form-group">
        <label for="inputAddress">Organization</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Organization" name="organization">
      </div>

      <div class="form-group">
        <label for="inputAddress2">Address</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Address" name="address">
      </div>

      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputState">Province</label>
        <select id="inputState" class="form-control" name="province">
          <option selected>Choose...</option>
          @foreach ($Data as $view)
              <option value="{{$view["kode"]}}">{{$view["nama"]}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="inputState">City</label>
        <select id="inputState" class="form-control" name="city">
          <option selected>Choose...</option>
          @foreach ($dataCity as $view)
              <option value="{{$view["kode"]}}">{{$view["nama"]}}</option>
          @endforeach
        </select>
      </div>
    </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputState">Guest Type</label>
          <select id="inputState" class="form-control" name="jenistamu_id">
            <option selected>Choose...</option>
                @foreach ($jns_tamu as $view)
                    <option value="{{$view->id}}">{{$view->jenistamu}}</option>
                @endforeach
          </select>
        </div>

        <div class="form-group col-md-6">
          <label for="Phone">Phone</label>
          <input type="number" class="form-control" id="Phone" name="phone">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    @include('sweetalert::alert')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
