<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, {{ $username ?? 'Guest' }}!</h1>
    <h1>Age = {{ $age }}</h1>
</body>
</html>