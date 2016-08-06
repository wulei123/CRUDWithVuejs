<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="token" id="token" value="{{csrf_token()}}">
	<title>CRUD with Vue js</title>
    <link href="//cdn.bootcss.com/bootstrap/4.0.0-alpha.3/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">
    @yield('content')
</div>
<script src="/js/vendor.js"></script>
@stack('scripts')
</body>
</html>