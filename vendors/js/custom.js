
// $('#cmntForm').on('submit', function(e){
//     $('#doComment').attr('disabled', true);
//     $('#comment_msg').html('Please Wait...');
//     $.ajax({
//         url: SITE_PATH+'comment_submit.php',
//         type: 'POST',
//         data: $('#cmntForm').serialize(),
//         success: function(result){
//             $('#comment_msg').html('');
//             $('#doComment').attr('disabled', false);
//             var data = $.parseJSON(result);
//             if(data.status == 'error'){
//                 $('#comment_msg').html(data.msg);
//             }
//             if(data.status == 'success'){
//                 $('#comment_msg').html(data.msg);
//                 $('#cmntForm')[0].reset();
//                 //window.location.href = window.location.href;
//             }
//         }
//     });
//     e.preventDefault();
// });

// $('.replybtn').on('click', function(){
//     $('#cmntForm #cmnt').focus();
// });
// setInterval(function(){ 
//     getComment();
// }, 1000);
// getComment();
$('#cmntForm').on('submit', function(e){
    var form_data = $(this).serialize();
    $.ajax({
        url: SITE_PATH+'comment_submit.php',
        method: 'POST',
        data: form_data,
        success: function(result){
        var data = $.parseJSON(result);
            if(data.status == 'success'){
                $('#cmntForm')[0].reset();
                $('#comment_msg').html(data.msg);
                //window.location.href = window.location.href;
            }
            if(data.status == 'error'){
                $('#comment_msg').html(data.msg);
            }
        }
    });
   
    e.preventDefault();
    
});

// function getComment(){
    
//     $.ajax({
//         url: SITE_PATH+'comment_fetch.php',
//         method: 'POST',
//         success: function(result){
//            $('#commentsall').html(result);
//         }
//     });
// }

$(document).on('click','.replybtn', function(){
    var comment_id = $(this).attr('id');
    $('#comment_id').val(comment_id);
    $('#cmntForm #comment_content').focus();

});