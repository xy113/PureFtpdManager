<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param string $message
     * @param null $tips
     * @param array $links
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function showMessage($message = null, $tips = null, $links = [])
    {
        return view('pureftp.message', compact('message', 'tips', 'links'));
    }
}
