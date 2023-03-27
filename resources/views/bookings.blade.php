
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table id="bookings" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Ref No.</th>
                            <th>Cinema</th>
                            <th>Location</th>
                            <th>Movie Name</th>
                            <th>No. of Tickets</th>
                            <th>ShowTime</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{$booking->ticket_no}}</td>
                                <td>{{$booking->name}}</td>
                                <td>{{$booking->location}}</td>
                                <td>{{$booking->title}}</td>
                                <td>{{$booking->no_of_tickets}}</td>
                                <td>{{$booking->slot}}</td>
                                <td>{{$booking->booking_time}}</td>
                                <td>{{$booking->status}}</td>
                                <td><button for="{{$booking->booking_id}}" dir="{{$booking->slot}}" class="btn btn-danger cancelBooking">{{__('Cancel')}}</button></td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

