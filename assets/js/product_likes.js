$(document).ready(function(){
    // when the user clicks on like
    $('.like').on('click', function(){
        var product_id = $(this).data('id');
            $product = $(this);

        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'liked': 1,
                'product_id': product_id
            },
            success: function(response){
                $post.parent().find('span.likes_count').text(response + " likes");
                $post.addClass('hide');
                $post.siblings().removeClass('hide');
            }
        });
    });

    // when the user clicks on unlike
    $('.unlike').on('click', function(){
        var product_id = $(this).data('id');
        $product = $(this);

        $.ajax({
            url: 'index.php',
            type: 'post',
            data: {
                'unliked': 1,
                'product_id': product_id
            },
            success: function(response){
                $post.parent().find('span.likes_count').text(response + " likes");
                $post.addClass('hide');
                $post.siblings().removeClass('hide');
            }
        });
    });
});