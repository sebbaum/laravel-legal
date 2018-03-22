<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Editor</title>

  <link href="{{ asset('vendor/legal/css/legal.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand" href="#">Legal Editor</a>
  <ul class="navbar-nav">

    <li class="nav-item mr-sm-2">
      <a class="nav-link btn btn-dark" href="/">&times;</a>
    </li>

  </ul>
</nav>
<div id="legalApp" class="container-fluid">

  <editor></editor>

</div>

<script src="{{ asset('vendor/legal/js/legal.js') }}"></script>
</body>
</html>