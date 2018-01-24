<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Editor</title>

  <link href="{{ asset('vendor/legal/css/legal.css') }}" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Legal Editor</a>
  <ul class="navbar-nav mr-auto">

    <li class="nav-item">
      <a class="nav-link" href="/">Your site</a>
    </li>

  </ul>
</nav>
<div id="legalApp" class="container-fluid">

  <editor></editor>

</div>

<script src="{{ asset('vendor/legal/js/legal.js') }}"></script>
</body>
</html>