$(document).ready(function(){
    $(document).on('click', 'button[data-action="show"]', function (){
        const url = $(this).data('modal-url');
        $.ajax({
          url,
            success:function(res){

                $('#commonModal').addClass('show');
                $('#commonModal').css('display','block')
                $('#commonModal').find('.modal-dialog').html(res);
            }
        })
    })
});
