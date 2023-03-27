<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Movie;
use App\Models\Slot;
use App\Models\Cinema;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class HomeController extends Controller
{
    public function index(){
        if(auth()->user()!=null){
            return redirect('dashboard');
        }
        $movies = Movie::all();
        return view('welcome')->with('movies',$movies);
    }

    public function dashboard(){
        $movies = Movie::all();
        return view('dashboard')->with('movies',$movies);
    }

    public function bookings(){
        $bookings = DB::table('bookings')
                        ->join('movies', 'bookings.movie_id', '=', 'movies.movie_id')
                        ->join('cinema', 'bookings.cinema_id', '=', 'cinema.cinema_id')
                        ->get();

        $tickets = Booking::where('status','active')->get();
        foreach ($tickets as $ticket){
            if($ticket->slot <  new \DateTime()){
                Booking::where('booking_id',$ticket->booking_id)->update(['status'=>"used"]);
            }
        }
        return view('bookings')->with('bookings',$bookings);
    }

    public function cancelBooking($id){
        Booking::where('booking_id',$id)->update(['status'=>"cancelled"]);
        return redirect('bookings');
    }

    public function updateProfile(Request $user){
        try {
            User::where('id',auth()->id())->update(['name'=>$user->name,'surname'=>$user->surname]);
            return redirect('profile')->with('success','Updated Successfully');
        }catch (Exception $ex){
            return redirect('profile')->with('error',$ex->getMessage());
        }

    }

    public function getMovie($id){
        $movie = Movie::where('movie_id',$id)->first();
        $cinema = Cinema::all();
        return Response::json(['success'=>true,'data'=>$movie,'cinema'=>$cinema]);
    }

    public function filterByCinema($id,$movie_id){
        $movie = Movie::where('movie_id',$movie_id)->first();
        $slots = Slot::where('movie_id',$movie_id)->get();
        $seats_left = Booking::where('cinema_id',$id)->where('movie_id',$movie_id)->where('status','active')->get();
        return Response::json(['success'=>true,'data'=>$movie,'slots'=>$slots,'seats_left'=>$seats_left]);
    }

    public function bookMovie(Request $request){
        $data = $request->all();
        $all = Booking::where('cinema_id',$data["cinema_id"])->where('movie_id',$data["movie_id"])->where('slot',$data["slots"])->get();

        if(($all->sum('no_of_tickets')+$data["no_of_tickets"]) > 30){
            return Response::json(['success'=>false,'error'=>'Limit Exceeded']);
        }else{
            try{

                $ticket_no = $this->RandomString();
                $book = new Booking();
                $book->cinema_id = $data["cinema_id"];
                $book->user_id = auth()->user()->id;
                $book->movie_id = $data["movie_id"];
                $book->slot = $data["slots"];
                $book->ticket_no = $ticket_no;
                $book->no_of_tickets = $data["no_of_tickets"];
                $book->booking_time = new \DateTime();
                $book->status = "active";
                $book->save();
                return Response::json(['success'=>true,'ticket'=>$ticket_no]);
            }catch (Exception $ex){
                return Response::json(['success'=>false,'error'=>$ex->getMessage()]);
            }
        }
    }

    public static function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }
}
