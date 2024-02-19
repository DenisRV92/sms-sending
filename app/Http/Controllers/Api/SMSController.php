<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SMSController extends Controller
{

    /**
     * @return UserResource
     */
    public function index(): UserResource
    {
        $users = User::all();
        return new UserResource($users);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Client\Response
     */
    public function getStatistics(Request $request): object
    {
        $startDate = $request->get('start_date');
        $startDate = Carbon::parse($startDate)->format('d.m.Y');

        $endDate = $request->get('end_date');
        $endDate = Carbon::parse($endDate)->format('d.m.Y');

        $response = Http::get('https://smsc.ru/sys/get.php', [
            'get_messages' => 1,
            'login' => env('LOGIN'),
            'psw' => env('PASSWORD'),
            'fmt' => 3,
            'charset' => 'utf-8',
            'start' => $startDate,
            'end' => $endDate,
            'cnt' => 1000
        ]);

        return $response;
    }
}
