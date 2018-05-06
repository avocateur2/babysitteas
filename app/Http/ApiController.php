<?php

namespace App\Http;

use App\Http\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }
}
