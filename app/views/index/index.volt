{% extends "templates/base.volt" %}

{% block content %}
<div class="container">

<div class="row">
    <div class="col-md-12 text-center">
        <p>"You are always a student, never a master. You have to keep moving forward."</p>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-4 text-center">
        <a href="https://github.com/mfauveau"><img src="{{ url('img/profile-matt.jpg') }}" class="img-circle" alt="Matt"></a>
    </div>
    <div class="col-md-4 text-center">
        <a href="https://github.com/jream"><img src="{{ url('img/profile-jesse.jpg') }}" class="img-circle" alt="Jesse"></a>
    </div>
    <div class="col-md-4 text-center">
        <a href="https://github.com/dansackett"><img src="{{ url('img/profile-dan.jpg') }}" class="img-circle" alt="Dan"></a>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-4 text-center">
        <a href="https://github.com/mfauveau"><i class="fa fa-github"></i></a>
        <span class="fname">Matthieu</span> Fauveau
    </div>
    <div class="col-md-4 text-center">
        <a href="https://github.com/jream"><i class="fa fa-github"></i></a>
        <span class="fname">Jesse</span> Boyer
    </div>
    <div class="col-md-4 text-center">
        <a href="https://github.com/dansackett"><i class="fa fa-github"></i></a>
        <span class="fname">Dan</span> Sackett
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <h2>Who Art Thou?</h2>
        <p>
            We are all co-workers who formed a small club
            because we are enthusiastic about learning
            new technologies.
        </p>
        <p>
            We are here to adapt and sharpen skills, this is an
            after work hobby project.
        </p>
        <p>
            Some of the technologies we are interested in are, but not
            limited to:
        </p>
        <ul>
            <li>Linux</li>
            <li>SQL/NoSQL</li>
            <li>PHP</li>
            <li>Python</li>
            <li>Ruby</li>
            <li>JavaScript</li>
            <li>CSS/LESS/SASS</li>
        </ul>
        </div>
        <div class="col-md-4 col-md-offset-2">
            <h2>Repositories</h2>

            {% for repo in github %}
                <div class="item">
                    <i class="fa fa-cog"></i> <a href="https://github.com/{{ repo.full_name }}">{{ repo.name }}</a>
                </div>
            {% endfor %}
        </div>
    </div>
</div>
{% endblock %}