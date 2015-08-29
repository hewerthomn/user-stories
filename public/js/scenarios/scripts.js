var app = function() {
    var self = this;
    var counter = 0;

    function _setup(lang) {

        self.lang = lang;

        self.containers = {
            given: $('#container-given'),
            when: $('#container-when'),
            then: $('#container-then')
        };

        self.labels = {
            when: $('#container-when-labels'),
            then: $('#container-then-labels')
        };

        self.templates = {
            conditional: Handlebars.compile($('#template-conditional').html())
        };

    }

    function _clickBtnAddConditional() {
        var $this = $(this);
        var condition = $this.data('condition');
        var situation = $this.data('situation');

        var data = {
            i: counter,
            condition: condition,
            conditionLabel: self.lang[condition],
            situation: situation
        };

        var htmlConditional = self.templates.conditional(data);
        self.containers[situation].append(htmlConditional);

        counter++;
    }

    function _clickBtnRemoveConditional() {
        var $this = $(this);

        if(confirm(self.lang.confirm)) {
            var $container = $this.parent().parent().parent();
            var index = $container.data('i');

            $container.remove();
        }
    }

    function _bindEvents() {

        $('.btn-add-conditional').on('click', _clickBtnAddConditional);
        $(document).on('click', '.btn-remove-conditional', _clickBtnRemoveConditional);
    }

    return {
        init: function(lang) {
            _setup(lang);
            _bindEvents();
        }
    };
};
