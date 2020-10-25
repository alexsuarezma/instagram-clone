$(document).ready(function() {
// FOLLOW
followHome()

function followHome(){
    $('.follow-home').unbind().click(function(){

        var checkFollow = $(this).text()
        checkFollow = checkFollow.trim()
        
        if(checkFollow == "Seguir"){
            $.ajax({
                url : `${url}follow/${$(this).data('id')}`,
                type : 'GET',
                success : ()=>{
                    $(this).text("Siguiendo")
                }
            })
        }else{
            $.ajax({
                url : `${url}disfollow/${$(this).data('id')}`,
                type : 'GET',
                success : ()=>{
                    $(this).text("Seguir")
                }
            })
        }

        followHome()
    })

}

// END FOLLOW

});
    