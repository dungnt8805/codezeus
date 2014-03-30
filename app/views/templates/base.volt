<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Code Zeus</title>
    <link rel="stylesheet" type="text/css" href="{{ url('third-party/semantic/css/semantic.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
    <script src="{{ url('third-party/angular/js/angular-1.3.min.js') }}"></script>
    <!-- <script src="/third-party/jquery/js/jquery-2.1.0.min.js"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    {% block head %}
    {% endblock %}
</head>
<body>

{% block intro %}{% endblock %}

<div>{{ flash.output() }}</div>

{% include "partial/header.volt" %}

{% block content %}{% endblock %}

{% include "partial/footer.volt" %}
{% include "analytics.volt" %}
</body>
</html>
