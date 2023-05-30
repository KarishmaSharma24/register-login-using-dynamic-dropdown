<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Register</title>
    <style>
     
    </style>
</head>
<body>
   <div class="container">
    <h1>Registration</h1>
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
    <form class="row g-3" action="{{ route('register') }}" method="post">
      @csrf
          <div class="col-md-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control border border-success rounded" id="name" name="name">
          </div>
          
          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control border border-success rounded"  id="inputEmail4" name="email">
          </div>
          <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control border border-success rounded" id="inputPassword4" name="password">
          </div>
          
          <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="state"  class="form-select border border-success rounded" name="state">
              <option selected>Choose...</option>
              {{-- <option >{{ $states }}</option> --}}
              @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label for="city" class="form-label">City</label>
            <select id="city" class="form-select border border-success rounded" name="city">
              <option selected>Choose...</option>
            </select>
          </div>
          <div><p>Already Registered ? <a href="/login">Login</a></p></div>
          
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign up</button>
          </div>
    </form>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
    $(document).ready(function () {
      $('#state').on('change', function(){
        $state_id = $(this).val();
        $('#city').empty();
        $.ajax({
          type: "get",
          url: "/city/"+$state_id,
          dataType: "json",
          success: function (response) {
            $response = response.data;
            $.each($response, function (index, value) { 
              $('#city').append('<option value = '+ index +'>'+ value.name +'</option>');
             
            });
            
          }
        });
      })
    });
   </script>
</body>
</html>