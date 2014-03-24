<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    {{ get_title() }}
    <link rel="stylesheet" href="/third-party/bootstrap/css/bootstrap.min.css">
    <script src="/third-party/angular/js/angular-1.3.min.js"></script>
    <script src="/third-party/jquery/js/jquery-2.1.0.min.js"></script>
    <script src="/third-party/bootstrap/js/bootstrap.min.js"></script>
    {% block head %}
    {% endblock %}
</head>
<body>

<div id="header">

<div class="navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url() }}">
                    CodeZeus
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                {% include "partial/nav-public.volt" %}
            </div><!-- /navbar-collapse -->
        </div>
    </div>
</div>

{% block intro %}{% endblock %}

<div class="container container-fluid">
    <div class="col-md-12">
        {{ flash.output() }}
    </div>
</div>

<div class="container container-fluid">
    <div class="col-md-12">
        {% block content %}{% endblock %}
    </div>
</div>

{% include "footer.volt" %}
{% include "analytics.volt" %}
</body>
</html>
