<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
  .poppins-thin {
  font-family: "Poppins", sans-serif;
  font-weight: 100;
  font-style: normal;
}

.poppins-extralight {
  font-family: "Poppins", sans-serif;
  font-weight: 200;
  font-style: normal;
}

.poppins-light {
  font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: normal;
}

.poppins-regular {
  font-family: "Poppins", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.poppins-medium {
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-style: normal;
}

.poppins-semibold {
  font-family: "Poppins", sans-serif;
  font-weight: 600;
  font-style: normal;
}

.poppins-bold {
  font-family: "Poppins", sans-serif;
  font-weight: 700;
  font-style: normal;
}

.poppins-extrabold {
  font-family: "Poppins", sans-serif;
  font-weight: 800;
  font-style: normal;
}

.poppins-black {
  font-family: "Poppins", sans-serif;
  font-weight: 900;
  font-style: normal;
}

.poppins-thin-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 100;
  font-style: italic;
}

.poppins-extralight-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 200;
  font-style: italic;
}

.poppins-light-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 300;
  font-style: italic;
}

.poppins-regular-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 400;
  font-style: italic;
}

.poppins-medium-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-style: italic;
}

.poppins-semibold-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 600;
  font-style: italic;
}

.poppins-bold-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 700;
  font-style: italic;
}

.poppins-extrabold-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 800;
  font-style: italic;
}

.poppins-black-italic {
  font-family: "Poppins", sans-serif;
  font-weight: 900;
  font-style: italic;
}

</style>

</head>
<body class="poppins-regular">

<x-navbar>{{ $loginAs }}</x-navbar>
<div class="container">
  {{ $slot }}
</div>
  
  
  
  <script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>