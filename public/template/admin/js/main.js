$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url)
{
    if(confirm('Bạn có muốn xóa vĩnh viễn không?')){
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success : function(result){
                if(result.error === false){
                    alert(result.message);
                    location.reload();
                } else{
                    alert('Xoá lỗi vui lòng thử lại');
                }
            }
        })
    }
}

// uploadFile
$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (result) {
            if (result.error === false) {
                $('#img_show').html('<a href="'+ result.url +'" target="_blank"><img src="'+ result.url +'" style="width: 100px"></a>')
                $('#hinhanh').val(result.url)
            }
            else {
                alert('Upload file lỗi')
            }
        }
    })
});

// uploadFile Đăng kí
$('#upload1').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/upload/services',
        success: function (result) {
            if (result.error === false) {
                $('#img_show').html('<a href="'+ result.url +'" target="_blank"><img src="'+ result.url +'" style="width:100px; border-radius: 50%; margin: 10px;"></a>')
                $('#hinhanh').val(result.url)
            }
            else {
                alert('Upload file lỗi')
            }
        }
    })
});

// Viết bình luận
$('#send_comment').click(function(ev) {
    ev.preventDefault();
    let user_id = $('#user_id').val();
    let comment_product_id = $('#comment_product_id').val();
    let hinhanh = $('#hinhanh').val();
    let username = $('#username').val();
    let message = $('#message').val();
    let rating = $('#rating').val();
    let currentDate = new Date();
    let formattedDate = `${currentDate.getFullYear()}-${currentDate.getMonth() + 1}-${currentDate.getDate()}`;
    
    $.ajax({
        type: 'POST',
        data: {
            comment_product_id: comment_product_id,
            username: username,
            hinhanh: hinhanh,
            message: message,
            user_id: user_id,
            rating: rating
        },
        url: '/send_comment',
        success: function(res) {
            if(res.error === false) {
                $('#message').val('')
                $('#comment_show').append(
                    '<div class="media mb-4">'+
                        '<img src="'+res.hinhanh+'" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px; border-radius: 50%;">'+
                        '<div class="media-body">'+
                            '<h6>'+res.username+'<small> - <i>'+formattedDate+'</i></small></h6>'+
                            '<div class="text-primary mb-2">'+
                                generateStarIcons(res.rating)+
                            '</div>'+
                            '<p>'+res.message+'</p>'+
                        '</div>'+
                    '</div>')
                function generateStarIcons(rating) {
                    var stars = '';
                    for (var i = 1; i <= 5; i++) {
                        if (i <= rating) {
                            stars += '<i class="zmdi zmdi-star" style="margin-right: 5px;"></i>';
                        } else {
                            stars += '<i class="zmdi zmdi-star-outline" style="margin-right: 3px;"></i>';
                        }
                    }
                    return stars;
                }
            }
            else {
                $('#erorr').append('Mỗi tài khoản chỉ được bình luận một lần!!!');
                $('#erorr').css('display', 'block')
                $('#erorr').css('margin', '10px')
                $('#erorr').css('color', 'red')
                $('#erorr').fadeOut(5000);
                // alert('Mỗi tài khoản chỉ được bình luận một lần')
            }
        }
    })
});
