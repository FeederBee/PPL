<!DOCTYPE html>
<html>
<head>
    <title>Ke The Lie</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    

</head>
<body>
  <nav class="navbar navbar-light bg-success">
      <div class="container-fluid ms-3">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">
          <img src="images/ke the lie.png" alt="Logo" width="50" height="45" />
        </a>
      </div>
    </nav>
  
<div class="m-4">
    @yield('content')
</div>

<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
   
</body>
</html>