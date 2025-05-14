function show_toast(title, message){
    console.log("Toast Work");

    let color = '';
    if(title == "Success"){
        color = "bg-success"
    }
    else{
        color = "bg-danger"
    }
    $('.toast').addClass('show');
    $('.toast').addClass(color)
    $('.toast-header strong').text(title);
    $('.toast-body').text(message)
}
