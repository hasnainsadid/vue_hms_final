<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontendController extends Controller
{
    public function index(){
        $doctors = Doctor::all();
        $departments = Department::all();
        return Inertia::render('HomePage', compact('doctors', 'departments'));
    }
    public function about(){
        return Inertia::render('AboutPage');
    }
    public function department(){
        $departments = Department::all();
        return Inertia::render('DepartmentPage', compact('departments'));
    }
    public function doctor(){
        $doctors = Doctor::all();
        return Inertia::render('DoctorPage', compact('doctors'));
    }
    public function contact(){
        return Inertia::render('ContactPage');
    }

}
