<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app"></div>
<script src="{{ mix('/js/components/app.js') }}"></script>
</body>
</html>
