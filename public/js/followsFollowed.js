$(document).ready(function() {

    $('.followed').click(function(){
        $.ajax({
            url : `${url}followers/${$(this).data('id')}`,
            type : 'GET' 
        })
        .done(function(response){
            $(".print-section").html(response);
            $(".text-content").html("Seguidos")
        });
    })

    $('.followers').click(function(){
        $.ajax({
            url : `${url}followed/${$(this).data('id')}`,
            type : 'GET' 
        })
        .done(function(response){
            $(".print-section").html(response);
            $(".text-content").html("Seguidores")
        });
    })
});
    