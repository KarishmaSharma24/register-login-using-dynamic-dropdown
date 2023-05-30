<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login</title>
    <style>
     
    </style>
</head>
<body>
   <div class="container">
    <h1>Login</h1>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
        @if ($errors->has('email'))
        @endif
      </div>
    @endif
    <form class="row g-3" action="{{ route('login') }}" method="post">
        @csrf
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control border border-success rounded"  id="inputEmail4" name="email">
            </div>
            <div class="col-md-4">
              <label for="inputPassword4" class="form-label">Password</label>
              <input type="password" class="form-control border border-success rounded" id="inputPassword4" name="password">
            </div>
            <div><p>Not Registered ? <a href="/register">Register Here</a></p></div>
            
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
      </form>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
</body>
</html>