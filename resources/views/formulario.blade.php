<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Formulario</title>
</head>
<body>
    <main class="container">
        <h1>Formulario de envío</h1>

        <div class="alert bg-light shadow-sm p-4">
            <form action='/proceso' method='post'>
                @csrf
                Frase: <br>
                <input type="text" name="frase" class="form-control">
                <br>
                <button class="btn btn-dark">Enviar frase</button>
            </form>
        </div>

    </main>
</body>
</html>
