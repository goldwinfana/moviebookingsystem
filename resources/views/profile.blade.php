
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 <form action="{{route('updateProfile')}}" method="POST">
                     @if(session()->get('success'))
                         <div>
                             <div class="alert alert-success" role="alert" style="margin: 0px 15px;"><i class="fa fa-check"></i> {{session()->get('success')}}</div>
                         </div>
                     @elseif(session()->get('error'))
                         <div>
                             <div class="alert alert-danger" role="alert" style="margin: 0px 15px;"><i class="fa fa-check"></i> {{session()->get('error')}}</div>
                         </div>
                     @endif
                     <input name="_token" value="{{csrf_token()}}" hidden>
                    <table id="bookings" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>User Details</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{__('Name')}}</td>
                                <td><input class="form-control" name="name" value="{{auth()->user()->name}}" required></td>
                            </tr>
                            <tr>
                                <td>{{__('Surname')}}</td>
                                <td><input class="form-control" name="surname" value="{{auth()->user()->surname}}" required></td>
                            </tr>
                            <tr>
                                <td>{{__('Email')}}</td>
                                <td>{{auth()->user()->email}}</td>
                            </tr>
                            <tr>
                                <td>{{__('Date Joined')}}</td>
                                <td>{{auth()->user()->created_at}}</td>
                            </tr>
                        </tbody>

                    </table>

                    <div style="text-align: end;">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Update Profile</button>
                    </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

