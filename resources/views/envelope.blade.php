<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cheyo House - El regreso del bolo</title>
  <link href="{{ asset('css/envelope.css') }}" rel="stylesheet">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="envlope-wrapper">
    <div id="envelope" class="close">
        <div class="front flap"></div>
        <div class="front pocket"></div>
        <div class="letter">
           <img src="{{ asset('img/chje.jpeg') }}" width="100%" height="95%" />
        </div>
        <div class="hearts">
            <div class="heart a1"></div>
            <div class="heart a2"></div>
            <div class="heart a3"></div>
        </div>
    </div>
</div>
<div class="reset">
    <button id="open">Abrir</button>
    <button id="reset">Cerrar</button>
    <div>
          <span id="msg" style="color:red"></span>
    </div>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src="{{ asset('js/envelope.js') }}" defer></script>

</body>
</html>
