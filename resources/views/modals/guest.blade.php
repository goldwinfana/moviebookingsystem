
<!-- The Modal -->
<div class="modal" id="view_movie">
    <div class="modal-dialog" style="max-width: fit-content">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-bold">Book a movie</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div id="booking-errors"></div>

            <!-- Modal body -->
            <div class="modal-body" style="display: flex;text-align: left">
                <div style="width: 50%;">
                    <img class="movie_img" style='width: 100%;height:350px'>
                </div>
                <div style="width: 50%;margin-left: 5px">
                    <h4 class="movie_title"></h4><br>
                    <form id="bookMovieForm" action="bookmovie" method="post" style="font-size: small">
                        <input name="_token" value="{{csrf_token()}}" hidden>
                        <input type="hidden" id="movie_id" name="movie_id" >
                        <label >Pick a cinema</label>
                        <select id="cinema" name="cinema_id" class="form-control" style="font-size: small"></select><br>
                        <label >Pick a slot</label>
                        <select id="slots" name="slots" class="form-control" style="font-size: small">
                            <option selected disabled value="">Choose a cinema first</option>
                        </select><br>
                        <label >Number of tickets</label>
                        <select id="no_of_tickets" name="no_of_tickets" class="form-control" style="font-size: small">
                            <option selected disabled value="">Select no of tickets</option>
                            @for($i=1;$i<11; $i++)
                                <option>{{$i}}</option>
                            @endfor

                        </select>
                    </form>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button id='@auth{{__('bookMovie')}}@else{{__('bookMovieLogin')}}@endauth' type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Confirm Booking</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="movie_booked">
    <div class="modal-dialog">
        <div class="modal-content" style="width: inherit;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-bold">Movie Ticket</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div id="booking-errors"></div>
            <!-- Modal body -->
            <div class="modal-body">

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="cancel_booked">
    <div class="modal-dialog">
        <div class="modal-content" style="width: inherit;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title font-bold">Cancel Ticket</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div id="bookingCancel-errors"></div>
            <form id="cancelBookingForm"  hidden>
                <input name="_token" value="{{csrf_token()}}">
                <input id="bookingId">
            </form>

            <!-- Modal body -->
            <div class="modal-body">
                <p>Are you sure you want to cancel this ticket?</p>
                <strong>NB: You can only cancel an hour before the movie starts</strong>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button id='cancelBookingBtn' type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Confirm Cancellation</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>

        </div>
    </div>
</div>
