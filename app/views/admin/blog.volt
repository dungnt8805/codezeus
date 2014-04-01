{% extends "templates/admin.volt" %}

{% block content %}

<div class="ui one column grid">
    <div class="column">
        <div class="ui basic form segment">

            <a href="{{ url('admin/blog/create') }}" class="ui labeled green icon button"><i class="add sign icon"></i>New Post</a>

            <table class="ui large table segment">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Modified At</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>Blah Blah Blah</td>
                      <td>John</td>
                      <td>0000</td>
                      <td>0000</td>
                      <td>
                          <a href="{{ url('admin/blog/edit') }}" class="ui labeled mini icon green button"><i class="pencil icon"></i> Edit</a>
                          <a href="#" class="ui right labeled mini icon black button"><i class="remove icon"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Blah Blah Blah</td>
                      <td>Jamie</td>
                      <td>0000</td>
                      <td>0000</td>
                      <td>
                          <a href="{{ url('admin/blog/edit') }}" class="ui labeled mini icon green button"><i class="pencil icon"></i> Edit</a>
                          <a href="#" class="ui right labeled mini icon black button"><i class="remove icon"></i> Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <td>Blah Blah Blah</td>
                      <td>Jill</td>
                      <td>0000</td>
                      <td>0000</td>
                      <td>
                          <a href="{{ url('admin/blog/edit') }}" class="ui labeled mini icon green button"><i class="pencil icon"></i> Edit</a>
                          <a href="#" class="ui right labeled mini icon black button"><i class="remove icon"></i> Delete</a>
                      </td>
                    </tr>
                </tbody>
                <tfoot>
                <tr>
                    <th>3 People</th>
                    <th>2 Approved</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

{% endblock %}