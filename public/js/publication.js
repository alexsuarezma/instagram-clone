$(document).ready(function() {
    // FOLLOW
    follow()

    function follow(){
        $('.follow').unbind().click(function(){

            var checkFollow = $(this).text()
            checkFollow = checkFollow.trim()
            
            if(checkFollow == "Seguir"){
                $.ajax({
                    url : `${url}follow/${$(this).data('id')}`,
                    type : 'GET',
                    success : (response)=>{
                        console.log(response)
                    }
                })
                $(this).text("Siguiendo")
                console.log('follow');
            }else{
                $(this).text("Seguir")
                console.log('disfollow');
                $.ajax({
                    url : `${url}disfollow/${$(this).data('id')}`,
                    type : 'GET',
                    success : (response)=>{
                        console.log(response)
                    }
                })
            }

            follow()
        })
    
    }

    // END FOLLOW

     // LIKE 
    likePublication()

    function likePublication(){
        $('.publication').unbind().click(function(){
            var likesCount = $('.likesCount').text()
            likesCount = parseInt(likesCount, 10)

            var check_like = $(this).children().hasClass('like')
            
            if(check_like){
                $(this).children().removeClass('fas like').addClass('far dislike')
                console.log('like');
                $('.likesCount').text(likesCount+1)
                $(`.likes-count-${$(this).children().data('id')}`).text(likesCount+1)
                $(`#image-icons-${$(this).children().data('id')}`).removeClass('fas like').addClass('far dislike')

                $.ajax({
                    url : `${url}like/${$(this).children().data('id')}`,
                    type : 'GET',
                    success : (response)=>{
                        console.log(response)
                    }
                })
            }else{
                $(this).children().removeClass('fas dislike').addClass('far like')
                console.log('dislike');
                $('.likesCount').text(likesCount - 1)
                $(`.likes-count-${$(this).children().data('id')}`).text(likesCount - 1)
                $(`#image-icons-${$(this).children().data('id')}`).removeClass('fas dislike').addClass('far like')

                $.ajax({
                    url : `${url}dislike/${$(this).children().data('id')}`,
                    type : 'GET',
                    success : (response)=>{
                        console.log(response)
                    }
                })
            }

            likePublication()
        })
    
    }
    // END LIKE
    // ADD COMMENT
        comentSave = (event) => {
            event.preventDefault()
            var _token = $('input[name="_token"]').val()

            $.ajax({
                url : `${url}comment/save`,
                type : 'POST',
                data : {
                    comment : $(event.target).find('input[id=comment]')[0].value,
                    image_id : $(event.target).find('input[id=image_id]')[0].value,
                    type_comment : 'publication',
                    _token: _token
                },
                success: function(data){
                    $("#new-comment").append(data);
                    $('#card-comment').scrollTop($('#card-comment')[0].scrollHeight); 
                    $(event.target).find('input[id=comment]')[0].value = ''
                    $(`#${event.target.id}`).focus()
                    deleteComment()
                }
            })
        }
    // END SAVE COMMENT

    // DELETE COMMENT
    deleteComment()

    function deleteComment(){
        $('.deletecomments').unbind().click(function(){
            console.log(`delete comment ${$(this).children().data('id')}`);

            $.ajax({
                url : `${url}comment/delete/${$(this).children().data('id')}`,
                type : 'GET',
                success : (response)=>{
                    console.log(response)
                    // remove fill
                    $(`#comment-${$(this).children().data('id')}`).fadeOut()
                    $(`#comment-home-${$(this).children().data('id')}`).fadeOut()
                }
            })

            deleteComment()
        })
    
    }
    // END DELETE COMMENT
    $('.likes-publication-modal').click(findLikes)
});
    