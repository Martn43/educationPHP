<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba nueva view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <main class='container'>
        <h1>Vista de prueba</h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate voluptas optio molestias natus nulla quisquam eveniet dolorum porro, atque quasi delectus beatae consequuntur, dolores dolore nobis ullam repudiandae. Praesentium, corporis.
        </p>
    
        <ul class="list-group">
            @for ($i=1; $i<=5;++$i)
            <li class="list-group-item">item de lista {{$i}} </li>
            @endfor
        </ul>
</body>
</html>