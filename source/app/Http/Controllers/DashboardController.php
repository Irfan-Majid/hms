<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function superadmin(){
        return view('dashboard.superadmin');
    }
    public function admin(){
        return view('dashboard.admin');
    }
    public function user(){
        return view('dashboard.user');
    }
    public function doctor(){
        return view('dashboard.doctor');
    }
    public function patient(){
        return view('dashboard.patient');
    }
    public function accountant(){
        return view('dashboard.accountant');
    }
    public function nurse(){
        return view('dashboard.nurse');
    }
    public function receptionist(){
        return view('dashboard.receptionist');
    }
    public function casemanager(){
        return view('dashboard.casemanager');
    }
    public function laboratorist(){
        return view('dashboard.laboratorist');
    }
    public function pharmacist(){
        return view('dashboard.pharmacist');
    }
}
