// Cart
function addToCart(id) {
    $.post('api/cookie.php', {
        'action': 'add',
        'id': id,
        'num': 1
    }, function(data) {
        location.reload();
    })
}
function deleteCart(id) {
    $.post('api/cookie.php', {
        'action': 'delete',
        'id': id,
         
    }, function(data) {
        location.reload();
    })
}

// wish list
function addToWishList(id) {

    $.post('api/cookie.php', {
        'action': 'addW',
        'id': id,
       
    }, function(data) {
        // alert('');
        $(".btn.btn-success.heart").click(function() {
            $(this).toggleClass("red-heart");
          });
          
    }).then(function() 
    {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Added success !',
            showConfirmButton: false,
            timer: 1000
          })
    }) 


    
}
function deleteToWishList(id) {
    $.post('api/cookie.php', {
        'action': 'deleteW',
        'id': id,
         
    }, function(data) {
        location.reload();
    })
}