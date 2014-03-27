{% extends "templates/base.volt" %}

{% block content %}

<div class="ui page grid overview segment">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
        <div class="ui two column  aligned stackable divided grid">
            <div class="column">
                <h2>
                    <a href="https://github.com/mfauveau"><i class="github link circular icon"></i></a>
                    <span class="fname">Matthieu</span> Fauveau
                </h2>
                <h2>
                    <a href="https://github.com/jream"><i class="github link circular icon"></i></a>
                    <span class="fname">Jesse</span> Boyer
                </h2>
                <h2>
                    <a href="https://github.com/dansackett"><i class="github link circular icon"></i></a>
                    <span class="fname">Dan</span> Sackett
                    </h2>
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
            </div>
            <div class="column">
                <em>"You are always a student, never a master. You have to keep moving forward."</em>
            </div>
        </div>
    </div>
</div>

<div class="ui page grid overview segment">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
        <div class="ui two column center aligned stackable  grid">
            <div class="column"></div>
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
{% endblock %}