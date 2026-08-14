const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

// Cart - Add
function addToCart(id, num = 1) {
    num = parseInt(num) || 1;
    $.post('api/cookie.php', {
        'action': 'add',
        'id': id,
        'num': num
    }, function(res) {
        if (res && res.cartCount !== undefined) {
            $('#num-cart').text(res.cartCount);
        }
        Toast.fire({
            icon: 'success',
            title: 'Added to cart successfully!'
        });
    }, 'json');
}

// Cart - Update
function updateCartNum(id, num) {
    num = parseInt(num) || 0;
    $.post('api/cookie.php', {
        'action': 'update',
        'id': id,
        'num': num
    }, function(res) {
        if (res && res.cartCount !== undefined) {
            $('#num-cart').text(res.cartCount);
        }
        location.reload();
    }, 'json');
}

// Cart - Delete
function deleteCart(id) {
    $.post('api/cookie.php', {
        'action': 'delete',
        'id': id
    }, function(res) {
        if (res && res.cartCount !== undefined) {
            $('#num-cart').text(res.cartCount);
        }
        Toast.fire({
            icon: 'info',
            title: 'Removed item from cart!'
        }).then(() => {
            location.reload();
        });
    }, 'json');
}

// Wishlist - Add
function addToWishList(id, btn) {
    if (btn) {
        $(btn).toggleClass("red-heart");
    }
    $.post('api/cookie.php', {
        'action': 'addW',
        'id': id
    }, function(res) {
        Toast.fire({
            icon: 'success',
            title: 'Added to wishlist! ❤️'
        });
    }, 'json');
}

// Wishlist - Delete
function deleteToWishList(id) {
    $.post('api/cookie.php', {
        'action': 'deleteW',
        'id': id
    }, function(res) {
        location.reload();
    }, 'json');
}