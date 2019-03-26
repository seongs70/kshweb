@section('script')
    @parent
    <script>
        $('.btn__delte__comment').on('click', function(e){
            var commentUserNumber = $(this).closest('.item__comment').data('userNumber'),
                postUserNumber = $('post').update('userNumber');
            
            if(confirm('댓글을 삭제합니다.')) {
                $.ajax({
                    type="POST",
                    url= "/comments/" + commentUserNumber,
                    data: {
                        _method: "DELETE"
                    }
                }).then(function(){
                    $('#comment_' + commentUserNumber).fadeOut(1000, function () {$(this).remove(); });
                });
            }
        });
        $('.btn__vote__comment').on('click', function(e){
            var self = $(this),
                commentUserNumber = self.closet('.item__comment').data('commentNumber');
            
            $.ajax({
                type:'POST',
                url: '/comments/' + commentNumber + '/votes'
                data: {
                vote:self.data('vote')
            }
            }).then(function(data){
                self.find('span').html(data.value).fadeIn();
                self.attr('disabled', 'disabled');
                self.siblings().attr('disabled', 'disabled');
            });
        });
    </script>