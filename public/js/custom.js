$(document).ready(function(){
    $(document).on('click', 'button[data-action="show"]', function (){
        const url = $(this).data('modal-url');
        const title = $(this).data('title')
        $.ajax({
          url,
            success:function(res){
                $('#commonModal').modal('show');
                $('#commonModal').find('.modal-dialog').find('.modal-content').find('.modal-header').find('.modal-title').html(title);
                $('#commonModal').find('.modal-dialog').find('.modal-content').find('.modal-body').html(res);
            }
        })
    })
});
