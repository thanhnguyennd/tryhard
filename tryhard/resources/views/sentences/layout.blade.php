<!DOCTYPE html>
<html>
<head>
    <title>thanhnguyen.com</title>
    <link href = {{ asset("css/bootstrap/bootstrap.css") }} rel="stylesheet" />
    <link href = {{ asset("css/bootstrap/bootstrap.min.css") }} rel="stylesheet" />
    
   	<script src={{ asset("js/jquery/jquery-3.4.1.min.js") }} ></script>
    <script src={{ asset("js/bootstrap/bootstrap.bundle.min.js") }}></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
</head>
<body>
 
<div class="container">
    @yield('content')
</div>
</body>
</html>