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
        location.reload();
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