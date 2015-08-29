<script id="template-conditional" type="text/x-handlebars-template">
<div class="conditional" data-i="{{i}}" data-situation="{{situation}}">
    <input type="hidden" name="details[{{i}}][condition]" value="{{condition}}">
    <input type="hidden" name="details[{{i}}][situation]" value="{{situation}}">
    <label class="given-{{i}}"><b>{{conditionLabel}}</b></label>
    <div class="input-group">
        <input type="text" class="form-control" name="details[{{i}}][detail]" placeholder="{{conditionLabel}}" required>
        <div class="input-group-btn">
            <button type="button" class="btn btn-xs btn-default btn-remove-conditional"><i class="fa fa-trash-o text-danger"></i></button>
        </div>
    </div>
</div>
</script>