<?php

namespace App\Http\Controllers;

use App\Traits\UnifyResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $defaultPage = 15;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, UnifyResponse;
}
