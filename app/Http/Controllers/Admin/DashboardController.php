<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use App\Models\Admin\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $numberAgencies = $user->agencies->count();

        $agencies = $user->agencies->pluck('id');
        $courses = Course::whereIn('agency_id', $agencies)->get();
        $numberCourses = $courses->count();


        return view('admin.dashboard', compact('user', 'numberAgencies', 'numberCourses'));
    }
}
