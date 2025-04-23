<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Vmarket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav a { margin-right: 15px; text-decoration: none; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border: 1px solid #ccc; text-align: left; }
        form { margin-top: 20px; }
        label { display: block; margin-top: 10px; }
        input, select, button { margin-top: 5px; padding: 6px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('fornecedores.index') }}">Fornecedores</a>
        <a href="{{ route('produtos.index') }}">Produtos</a>
    </nav>

    <hr>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @yield('content')
</body>
</html>
