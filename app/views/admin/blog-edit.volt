{% extends "templates/admin.volt" %}

{% block content %}

<div class="ui one column grid">
    <div class="column">
        <div class="ui basic form segment">

            <div class="ui fluid form segment">
                <h3 class="ui header">Blog Edit</h3>
                <form method="post" action="{{ url('user/dologin') }}">
                    <div class="field">
                        <label>Title</label>
                        <input placeholder="Username" type="text">
                    </div>
                    <div class="field">
                        <textarea></textarea>
                    </div>
                    <input type="submit" class="ui blue submit button" value="Save">
                </form>
            </div>

        </div>
    </div>
</div>

{% endblock %}