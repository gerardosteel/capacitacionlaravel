<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>
<body>
    
<h1>index post {{ $post }}</h1>

<form action="{{ url('/post') }}" method="GET">
<input type="text" name="num1" >
<button type="submit">enviar</button>
{{ csrf_field() }}
</form>


</body>
</html>