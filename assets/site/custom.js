/*======addCart=======================*/
//alert(5555);
$(document).on('click', '.addCart', function () {
    var baseUrl = $('#baseUrl').val();
    var userId = $(this).attr('data-userId');
    // alert(baseUrl);
    if (userId.length == 0 || userId == '') {
        //login
        $('#loginError').css('display', 'block');
        window.location.href = baseUrl + "/userLogin";

    }
    else {
        //addToCart
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var price = $(this).attr('data-price');

        var url = $(this).attr('data-url');
        var type = $(this).attr('data-type');
        var storeId = $(this).attr('data-itemStore');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // alert(url);
        $.post(url, {
            storeId: storeId,
            id: id,
            name: name,
            price: price,
            type: type,
            _token: CSRF_TOKEN
        }, function (data) {
            //  alert(data);
            $('#cartCount').html(data['count']);
            //$('#cartTotal').html(data['total']);

        });

    }
});

/*======Remove Item=======================*/
$(document).on('click', '.removeItemEdit', function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');
    var tableName = $(this).attr('data-tableName');
    $.post(url, {tableName: tableName, id: id, _token: CSRF_TOKEN}, function (data) {
        location.reload();
    });
    $(this).parent().parent().remove();
});

/*======getQuantity=======================*/
$(".getQuantity").keyup(function () {
   // alert(77);
    var quantity = $(this).val();
    var itr = $(this).attr('data-itr');
    var price = $(this).attr('data-price');

    var total = quantity * price;
    $('#total_' + itr).html(total);
    $('#total' + itr).val(total);

    var sum = 0;
// iterate through each td based on class and add the values
    $(".sTotal").each(function () {
        var value = $(this).val();
        //  alert(value);
        // add only if the value is number
        if (!isNaN(value) && value.length != 0) {
            sum += parseFloat(value);
        }
        $('#mainTotal').html(sum);
        $('#mainTotalVal').val(sum);
    });
});

/*==============================*/
$('#buyBtn').click(function () {


        //Update Order data
        var url = $(this).attr('data-url');
        var baseUrl = $('#baseUrl').val();

        $.post(url,  $( "#orderForm" ).serialize(), function (data) {
            if(data > 0)
            {
                window.location.href = baseUrl+"/orders";
            }
        });



});