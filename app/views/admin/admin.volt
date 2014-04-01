{% extends "templates/admin.volt" %}

{% block content %}
<div class="ui three column grid">
    <div class="column"></div>
    <div class="column">
        <div class="ui fluid form segment">
            <h3 class="ui header">Admin Log-in</h3>
            <form method="post" action="{{ url('user/dologin') }}">
                <div class="field">
                    <label>Username</label>
                    <input placeholder="Username" type="text">
                </div>
                <div class="field">
                    <label>Password</label>
                    <input type="password">
                </div>
                <input type="submit" class="ui blue submit button" value="Login">
            </form>
        </div>
    </div>
    <div class="column"></div>
</div>
{% endblock %}