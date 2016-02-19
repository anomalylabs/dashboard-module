$(function () {

    $('#dashboard').find('.column').sortable({
        placeholder: '<div class="placeholder"></div>',
        containerSelector: '.column',
        itemSelector: '.widget',
        connectWith: '.column',
        group: 'columns',
        handle: '.handle',
        nested: false,
        afterMove: function ($placeholder) {
            $placeholder.height($placeholder.closest('.column').find('.dragged').height());
        },
        onDrop: function ($item, container, _super) {

            var data = $('#dashboard').find('.column').sortable("serialize").get();

            $.post(APPLICATION_URL + '/admin/dashboard/widgets/save', {
                'columns': JSON.stringify(data, null, ' ')
            });

            _super($item, container);
        }
    });
});
