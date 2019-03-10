$(document).ready(function (e) {
   //  alert('in js');
    /*================================*/
    
    $('.nested input[type=checkbox]').click(function () {
     //   alert(66);
    $(this).parent().find('li input[type=checkbox]').prop('checked', $(this).is(':checked'));
    var sibs = false;
    $(this).closest('ul').children('li').each(function () {
        if($('input[type=checkbox]', this).is(':checked')) sibs=true;
    })
    $(this).parents('ul').prev().prop('checked', sibs);
});
    
  
    
    /*================================*/
    $('#addItem').click(function () {
        // alert(5555);
        var itemCount = $('#itemCount').val();
        itemCount++;
        $("#itemContiner").append('<tr>'
            + '<td> <input type="text" class="form-control" name="name[]" ></td>'

            + '<td><a class="btn default removeItem"> <i class="fa fa-times"></i> </a></td> </tr>');

        $('#itemCount').val(itemCount);
        itemCount++;
    });

    /****City *****************************/
    $('.getCity').change(function () {
        var cityId = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var url = $(this).attr('data-url');
       // alert(CSRF_TOKEN);
        $.post(url, {cityId: cityId, _token: CSRF_TOKEN}, function (data) {
            
           // alert(data);
            $('#stateId').html(data);

        });
    });


    $('.getSubCity').on("change", function () {
        var cityId = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var url = $(this).attr('data-url');
        $.post(url, {cityId: cityId, _token: CSRF_TOKEN}, function (data) {
            $('#stateId1').html(data);
        });
    });
    
    
    /*Doctor Details********************/
     $('.getDoctorDetails').change(function () {
        // alert(5555);
       /* var cityId = $(this).val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var url = $(this).attr('data-url');
        $.post(url, {cityId: cityId, _token: CSRF_TOKEN}, function (data) {
            $('#stateId').html(data);

        });*/
    });









});