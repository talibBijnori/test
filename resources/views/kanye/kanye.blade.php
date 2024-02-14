<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanye Quotes</title>
</head>
<body>
<h1>Random Kanye Quotes</h1>
    <ul>
        @foreach ($randVal as $quote)
            <li>{{ $quote }}</li>
        @endforeach
    </ul>
    </div>
    <form method="post" action="{{ url('/api/showData')}}">
    @csrf
    <input type="submit">
</form>
</body>
</html>
