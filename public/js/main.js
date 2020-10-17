// const url = 'http://localhost:8080/'
const url = 'http://instagram-clone-as.herokuapp.com/'

$(document).ready(function() {
// LIKE 
likes()

function likes(){
    $('.icons').unbind().click(function(){
    
        var check_like = $(this).children().hasClass('like')
        
        if(check_like){
            $(this).children().removeClass('fas like').addClass('far dislike')
            console.log('like');

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
            $.ajax({
                url : `${url}dislike/${$(this).children().data('id')}`,
                type : 'GET',
                success : (response)=>{
                    console.log(response)
                }
            })
        }

        likes()
    })

}
// END LIKE
    $('#users').keyup(function(){
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val()
            $.ajax({
                url : `${url}autocomplete`,
                type : 'POST',
                data : {
                    query : query,
                    _token: _token
                },
                success: function(data){
                    $('#list').fadeIn()
                    $('#list').html(data)
                }
            })
        }
    })

    $('#users').focus(function(){
        $(this).removeClass('text-center').addClass('pl-4')
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val()
            $.ajax({
                url : `${url}autocomplete`,
                type : 'POST',
                data : {
                    query : query,
                    _token: _token
                },
                success: function(data){
                    $('#list').fadeIn()
                    $('#list').html(data)
                }
            })
        }
    })

    $('#users').blur(function(){
        $(this).removeClass('pl-4').addClass('text-center')
        $('#list').fadeOut()
    })

});
    