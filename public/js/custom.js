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
function show_toast(type, message){
    if(type === "Success"){
        $('.toast').addClass('bg-success');
    } else if(type === "Error"){
        $('.toast').addClass('bg-danger');
    }
    $('.toast').addClass('show');
    $('.toast-message').html(message);
    setTimeout(function (){
        $('.toast').removeClass('show');
    }, 6000);

}
