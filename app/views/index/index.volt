{% extends "templates/base.volt" %}

{% block content %}

<div class="ui piled segment aligned center">
  <p>"You are always a student, never a master. You have to keep moving forward."</p>
</div>

<div class="ui page grid segment">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
        <div class="ui two column  aligned stackable divided grid">
            <div class="column">

                <div class="ui segment row">
                    <a href="https://github.com/mfauveau"><img class="ui image small floated left circular" src="{{ url('img/profile-matt.jpg') }}" alt="Matt"></a>
                    <h2><span class="fname">Matthieu</span> Fauveau</h2>
                    CTO @ Eonian
                </div>

                <div class="ui segment row">
                    <a href="https://github.com/jream"><img class="ui image small floated left circular" src="{{ url('img/profile-jesse.jpg') }}" alt="Jesse"></a>
                    <h2><span class="fname">Jesse</span> Boyer</h2>
                    Full Stack Developer @ Eonian
                </div>

                <div class="ui segment row">
                    <a href="https://github.com/dansackett"><img class="ui image small floated left circular" src="{{ url('img/profile-dan.jpg') }}" alt="Dan"></a>
                    <h2><span class="fname">Dan</span> Sackett</h2>
                    Full Stack Developer @ Eonian
                </div>
            </div>
            <div class="column main-github">
                <a href="http://github.com/codezeus">
                    <i class="circular huge github icon link black"></i>
                    <h2>CodeZeus Github</h2>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="ui page grid overview segment">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
        <div class="ui two column center aligned stackable  grid">
            <div class="column">
            <h2 class="ui header">
                    <i class="users icon"></i>
                    <div class="content">
                        Who Art Thou?
                    </div>
                </h2>
                <div class="ui basic segment aligned left">
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
            </div>
            <div class="column">
                <h2 class="ui header">
                    <i class="settings icon"></i>
                    <div class="content">
                        Repositories
                    </div>
                </h2>
                <div class="ui divided list">
                {% for repo in github %}
                    <div class="item">
                        <a href="https://github.com/{{ repo.full_name }}" class="right floated tiny black ui button">View Repository</a>
                        <div class="content">
                        <div class="header">{{ repo.name }}</div>
                        </div>
                    </div>
                {% endfor %}
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}