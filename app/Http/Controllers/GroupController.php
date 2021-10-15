<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('create-group');
    }
    public function group_list()
    {
        return view('group-list');
    }
}
