<?php

namespace App\Http\Controllers;

use App\Repositories\WatsonRepository;

class WatsonController extends Controller
{
    private $repository;

    public function __construct(WatsonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('watson.index');
    }

    public function store()
    {
    }
}
