<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;


class EmployerController extends Controller
{
    public function index ()
    {
        $employers = Employer::paginate(1);
        return view('employers.index', compact('employers'));
    }
    public function create ()
    {
        return view('employers.create');
    }
    public function edit (Employer $employer)
    {
        return view('employers.edit', compact('employer'));
    }



}
