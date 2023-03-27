$('.select_movie').on('click',function () {
    $('#bookMovieForm select').val('');
    $.ajax({
        type: 'GET',
        url: 'getMovie/'+this.id,
        dataType: 'json',
        success: function(response){
            $("#booking-errors").html('');
            $('.movie_title').html('Title: '+response.data.title);
            $('#movie_id').val(response.data.movie_id);
            $('#cinema').attr('for',response.data.movie_id);

            $('#cinema').html('<option selected disabled value="">Select preferred cinema</option>');
            $.each(response.cinema,function(i,cinema){
                $('#cinema').append('<option value="'+cinema.cinema_id+'">'+cinema.name+' '+cinema.location+'</option>');
            });
            $('.movie_img').attr('src','../images/'+response.data.image);

        }
    });

    $('#view_movie').modal('show');
});

$('#cinema').on('change',function () {

    $.ajax({
        type: 'GET',
        url: 'filterByCinema/'+this.value+'/'+$(this).attr('for'),
        dataType: 'json',
        success: function(response){

            if(response.slots.length !=0){
                $('#slots').html('<option selected disabled value="">Select preferred slot</option>');
                $.each(response.slots,function(i,slot){
                    var checkSpace =30;

                    if(response.seats_left.length !=0){
                        $.each(response.seats_left,function(i,seats){

                            if(seats.slot==slot.slot_datetime){
                                checkSpace-=seats.no_of_tickets;
                            }
                        });
                    }

                    var d2 = new Date(slot.slot_datetime);
                    var addMlSeconds = 60 * 60 * 1000;
                    var newDateObj = new Date(d2.getTime() - addMlSeconds);
                    if(newDateObj.getTime() > new Date().getTime()){
                        var select =checkSpace < 1?" disabled": "";
                        $('#slots').append('<option '+select+' value="'+slot.slot_datetime+'">'+slot.slot_datetime+' ('+checkSpace+' seat(s) left)</option>');
                    }
                });
            }else{
                $('#slots').html('<option selected disabled value="">No slots found</option>');
            }

            $("#no_of_tickets").val('');

            $('.movie_img').attr('src','../images/'+response.data.image);

        }
    });

    $('#view_movie').modal('show');
});


$('#bookMovie').on('click',function () {
    var checkFill = true;
    $.each($('#bookMovieForm select'), function (i,input) {
       if(input.value==""){
           $(this).focus();
           checkFill = false;
       }
    });
    var formData = $('#bookMovieForm').serialize();
    if(checkFill){
        $.ajax({
            type: 'POST',
            url: '/bookMovie',
            data: formData,
            dataType: 'json',
            success: function(response){
               if(response.success){
                   $('#view_movie').modal('hide');
                   $('#movie_booked .modal-body').html(
                       '<p class="fa fa-check-circle text-success" style="font-size: 200px"></p>'+
                       '<p>Reference Number: <strong>'+response.ticket+'</strong></p>'
                   );
                   $('#movie_booked').modal('show');
               }else{
                   $("#booking-errors").html('<div class="alert alert-danger" role="alert" style="margin: 0px 15px;"><i class="fa fa-close"></i> '+response.error+'</div>');
               }
            },error:function (error){
                console.log(error);
            }
        });
    }


});


$('#bookMovieLogin').on('click',function () {
   if(confirm('You need to be logged in first, click Ok to proceed or cancel')==true){
       window.location.href='/login';
   }else{
       return false;
   }
});

$('.cancelBooking').on('click',function () {
    $("#bookingCancel-errors").html('');
    $("#cancelBookingForm").attr('action',"cancelBooking/"+$(this).attr('for'));
    $('#cancelBookingBtn').attr('dir',$(this).attr('dir'));
    $('#cancel_booked').modal('show');
});

$('#cancelBookingBtn').on('click',function () {
    var d2 = new Date($(this).attr('dir'));
    var addMlSeconds = 60 * 60 * 1000;
    var newDateObj = new Date(d2.getTime() - addMlSeconds);
    if(newDateObj.getTime() > new Date().getTime()){
        $("#cancelBookingForm").submit();
    }else{
        $("#bookingCancel-errors").html('<div class="alert alert-warning" role="alert" style="margin: 0px 15px;"><i class="fa fa-close"></i> Too late to cancel</div>');
    }
});
