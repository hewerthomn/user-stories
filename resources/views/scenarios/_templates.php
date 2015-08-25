<script id="template-conditional" type="text/x-handlebars-template">
<div class="conditional" data-i="{{i}}">
    <input type="hidden" name="details[{{i}}][condition]" value="{{condition}}">
    <input type="hidden" name="details[{{i}}][situation]" value="{{situation}}">
    <div class="input-group">
        <input type="text" class="form-control" name="details[{{i}}][detail]" required>
        <div class="input-group-btn">
            <button type="button" class="btn btn-sm btn-default text-danger btn-remove-conditional">Remove</button>
        </div>
    </div>
</div>
</script>

<script id="template-given" type="text/x-handlebars-template">
<div class="given-{{i}}"><br>{{condition}}</div>
</script>