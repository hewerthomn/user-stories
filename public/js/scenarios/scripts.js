(function(Handlebars, undefined) {

    var app = function() {
        var self = this;
        var counter = 0;

        function _setup() {
            self.containers = {
                given: $('#container-given'),
                when: $('#container-when'),
                then: $('#container-then')
            };

            self.labels = {
                given: $('#container-given-labels'),
                when: $('#container-when-labels'),
                then: $('#container-then-labels')
            };

            self.templates = {
                conditional: Handlebars.compile($('#template-conditional').html()),
                given: Handlebars.compile($('#template-given').html())
            };

        }

        function _clickBtnAddConditional() {
            var $this = $(this);
            var condition = $this.data('condition');
            var situation = $this.data('situation');

            var data = {
                i: counter,
                condition: condition,
                situation: situation
            };

            var htmlConditional = self.templates.conditional(data);
            self.containers[situation].append(htmlConditional);

            var htmlGiven = self.templates.given(data);
            self.labels[situation].append(htmlGiven);

            counter++;
        }

        function _clickBtnRemoveConditional() {
            var $this = $(this);

            if(confirm('Confirm?')) {
                var $container = $this.parent().parent().parent();
                var index = $container.data('i');
                var situation = $container.data('situation');

                $('.'+situation+'-'+index).remove();
                $container.remove();
            }
        }

        function _bindEvents() {

            $('.btn-add-conditional').on('click', _clickBtnAddConditional);
            $(document).on('click', '.btn-remove-conditional', _clickBtnRemoveConditional);
        }

        return {
            init: function() {
                _setup();
                _bindEvents();
                console.info('Init!');
            }
        };
    };

    new app().init();

})(Handlebars);