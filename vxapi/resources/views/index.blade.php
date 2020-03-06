<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="my_app"></div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
