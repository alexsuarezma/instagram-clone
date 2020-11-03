
$(document).ready(function() {

    $('.modal-publication').click(function(){
        
        $.ajax({
            url : `${url}publication/${$(this).data('id')}`,
            type : 'GET' 
        })
        .done(function(response){
            $("#print-publication").html(response);
        });
    })
});
    