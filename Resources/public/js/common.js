$(function(){
    $('#dashboard table.dashboard-item thead th').click(function(){
        $(this).closest('table').find('tbody').toggle();
    });

    $('#modal-filter').modal({
      keyboard: true,
      backdrop: true
    });

    $('#modal-filter').bind('show', function() {
        $('.modal-body', $(this)).css('max-height', Math.min($(window).height() - 210, 470));
    });
})
