$(function(){
    $('#dashboard table.dashboard-item thead th').click(function(){
        $(this).closest('table').find('tbody').toggle();
    });
})
