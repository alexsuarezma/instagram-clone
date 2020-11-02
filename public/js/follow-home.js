$(document).ready(function() {
// FOLLOW
followHome()

function followHome(){
    $('.follow-home').unbind().click(function(){
        
        var followedCount = $('.followed-count').text()
            followedCount = parseInt(followedCount, 10)

        var checkFollow = $(this).text()
        checkFollow = checkFollow.trim()
        
        if(checkFollow == "Seguir" || checkFollow == "Seguir tambien"){
            $.ajax({
                url : `${url}follow/${$(this).data('id')}`,
                type : 'GET',
                success : ()=>{
                    $(this).text("Siguiendo")
                    $('.followed-count').text(followedCount + 1)
                },
                error : (response)=>{
                    console.log(response)
                }
            })
        }else{
            $.ajax({
                url : `${url}disfollow/${$(this).data('id')}`,
                type : 'GET',
                success : ()=>{
                    if(checkFollow == "Seguir tambien"){
                        $(this).text("Seguir tambien")
                    }else{
                        $(this).text("Seguir")
                    }
                    $('.followed-count').text(followedCount - 1)
                },
                error : (response)=>{
                    console.log(response)
                }
            })
        }

        followHome()
    })

}

// END FOLLOW

});
    