

/*===Image Itr===================================*/
$('#addImage').click(function () {
    $("#imageContiner").append('<div class="fileinput fileinput-new" data-provides="fileinput">'
        +' <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>'
        +'  <div>'
        +'  <span class="btn red btn-outline btn-file">'
        +'  <span class="fileinput-new"> Select image </span>'
        +'<span class="fileinput-exists"> Change </span>'
        +'  <input type="file" name="imageName[]"> </span>'
        +'  <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>'
        +'<a class="btn default removeItem"> <i class="fa fa-times"></i> </a>'
        +'  </div>'
        +'  </div> <br/>');
});

$(document).on('click', '.removeItem', function () {
    $(this).parent().parent().remove();
});

$(document).on('click', '.removeItemEdit', function () {

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');
    var tableName = $(this).attr('data-tableName');
   // alert(url);
    $.post(url, {tableName :tableName , id: id , _token: CSRF_TOKEN}, function (data) {
        location.reload();
    });
    $(this).parent().parent().remove();
});


/*================================*/

$('#addSocial').click(function () {
   // alert(5555);
    var socialCount = $('#socialCount').val();
    socialCount++;
    $("#productContiner").append('<tr>'
        + '<td> <input type="text" class="form-control" name="name[]" ></td>'
        + ' <td> <input type="text" class="form-control iconClass" name="icon[]"  ></td>'
        + ' <td> <input type="text" class="form-control" name="link[]" ></td>'
        + '<td><a class="btn default removeItem"> <i class="fa fa-times"></i> </a></td> </tr>');

    $('#socialCount').val(socialCount);
    socialCount++;

    $('.iconClass').iconpicker();
});
/*====================================*/
$('.adminActive').click(function () {

    var isActive = $(this).attr('data-isActive');
    var userId = $(this).attr('data-userId');
    var url = $('#url').val();
    //alert(url);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.post(url, {isActive: isActive,userId :userId ,  _token: CSRF_TOKEN}, function (data) {
       // alert(data);
        if(data > 0)
        {
            location.reload();
        }
    });
});

/*================================*/
$('#addItem').click(function () {
   // alert(5555);
    var itemCount = $('#itemCount').val();
    itemCount++;
    $("#productContiner").append('<tr>'
        + '<td> <input type="text" class="form-control" name="name[]" ></td>'
        + '<td> <input type="text" class="form-control" name="details[]" ></td>'
        + '<td><a class="btn default removeItem"> <i class="fa fa-times"></i> </a></td> </tr>');

    $('#itemCount').val(itemCount);
    itemCount++;
});



