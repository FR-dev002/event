<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;

use Carbon\Carbon;
// repository
use App\Repositories\Repository\Event\EventInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

class EventController extends Controller
{

    private $eventRepository;

    public function __construct(EventInterface $eventRepository)
    {
        $this->middleware('jwt.verify', ['except' => ['getAll']]);
        $this->eventRepository = $eventRepository;
    }



    public function getAll()
    {
        return $this->eventRepository->getAll();
    }


    public function store(EventRequest $request)
    {
        $url = Storage::url('app/event/20200901130911_Screenshot from 2020-06-18 09-20-18.png');
        print_r($url);
        die();
        $user = JWTAuth::parseToken()->authenticate();

        $date = Carbon::createFromFormat('d-m-Y', $request->date, 'Asia/Jakarta');
        $filename = null;
        if($request->file()) {
            $file = $request->file('picture');
            $originalName = $file->getClientOriginalName();
            $date = new \DateTime();
            $filename = $date->format('YmdHms').'_'.$originalName;
            $path = storage_path('app').'/event';
            if (!file_exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            // save file ke storage
            $file->move($path, $filename);
        }

        $pathFile = url().$filename;
        print_r($pathFile);
        die();

         // construct data
         $data = [
            'title' => $request->title,
            'description' => $request->description,
            'date' =>  $date,
            'location' =>  $request->location,
            'picture' =>  $filename,
            'user_id' => $user->id,
        ];

        try {
            $this->eventRepository->store($data);
            return response()->json(['message' => "Success"]);
        } catch (\Throwable $th) {
            return response()->json(['fail' => $th->getMessage()]);
        }
    }



    public function getByUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $this->eventRepository->getAllByUserId($user->id);
    }
}
