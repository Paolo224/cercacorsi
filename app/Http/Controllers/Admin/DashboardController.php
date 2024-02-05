<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Agency;
use App\Models\Admin\Course;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->super_admin_role != null) {
            $numberTickets = Ticket::all()->count();
            $numberTicketsOpen = Ticket::whereIn('status', ['aperto'])->get()->count();
            $numberTicketsClose = Ticket::whereIn('status', ['chiuso'])->get()->count();
            $numberTicketsReject = Ticket::whereIn('status', ['respinto'])->get()->count();
            $numberAgencies = Agency::all()->count();
            $numberCourses = Course::all()->count();
        } elseif ($user->super_admin_role === null) {
            $numberTickets = $user->tickets->count();
            $numberTicketsOpen = $user->tickets()->whereIn('status', ['aperto'])->get()->count();
            $numberTicketsClose = $user->tickets()->whereIn('status', ['chiuso'])->get()->count();
            $numberTicketsReject = $user->tickets()->whereIn('status', ['respinto'])->get()->count();
            $numberAgencies = $user->agencies->count();
            $agencies = $user->agencies->pluck('id');
            $courses = Course::whereIn('agency_id', $agencies)->get();
            $numberCourses = $courses->count();
        }

        return view('admin.dashboard', compact('user', 'numberAgencies', 'numberCourses', 'numberTickets', 'numberTicketsOpen', 'numberTicketsClose', 'numberTicketsReject'));
    }
}
