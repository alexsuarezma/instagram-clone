$(document).ready(function() {
    // ADD COMMENT
        comentSaveHome = (event) => {
            event.preventDefault()
            // alert($(event.target).find('input[id=image_id]')[0].value)
            const comment = $(event.target).find('input[id=comment]')[0].value
            var _token = $(event.target).find('input[name=_token]')[0].value

            if(comment != "" || comment != NULL){
                $.ajax({
                    url : `${url}comment/save`,
                    type : 'POST',
                    data : {
                    comment : comment,
                    image_id : $(event.target).find('input[id=image_id]')[0].value,
                    type_comment : 'home',
                    _token: _token
                    },
                    success: function(data){
                        $(`#new-comment-${$(event.target).find('input[id=image_id]')[0].value}`).append(data)
                        $(event.target).find('input[id=comment]')[0].value = ''
                        $(`#${event.target.id}`).focus()
                    }
                })
            }
        }
    // END SAVE COMMENT
});
    