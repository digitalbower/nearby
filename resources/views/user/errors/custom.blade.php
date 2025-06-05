

<!DOCTYPE html>
<html>
<head>
    <title>Error {{ $code }}</title>
</head>
<body>
    <h1>Error {{ $code }} - {{ $title }}</h1>
    <p>{{ $message }}</p>
    <a href="{{ url('/') }}">Return to Home</a>
</body>
</html>
