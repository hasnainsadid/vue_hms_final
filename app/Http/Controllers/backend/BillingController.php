<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Billing;
use App\Models\Medicine;
use App\Models\Seat;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function patient_billing()
    {
        return view('backend.patientLogin.Billing.index');
    }

    public function admin_billing()
    {
        $billing = Billing::all();
        return view('backend.adminLogin.billing.index', compact('billing'));
    }
    public function admin_billing_add()
    {
        $medicine = Medicine::all();
        $seat = Seat::all();
        $admission = Admission::where('release_date', '!=', NULL)->get();
        return view('backend.adminLogin.billing.add_billing', compact('medicine', 'seat', 'admission'));
    }
    public function store(Request $request){
        $billing = new Billing();
        $billing->p_id = $request->p_id;
        $billing->date = NOW();
        $billing->items = $request->items;
        $billing->prices = $request->prices;
        $billing->quantities = $request->quantities;
        $billing->total = $request->total;
        $billing->sub_total = $request->sub_total;
        $billing->discount = $request->discount;
        $billing->grand_total = $request->grand_total;
        // dd($billing);
        // $userId = Billing::count();
        $billing->save();
        // dd($userId);
        return redirect('admins/show');
    }

    public function view(){
        $billing = Billing::get()->where('id', Billing::count());
        return view('backend.adminLogin.billing.show', compact('billing'));
    }
    
 
    public function pdf() {
        $billing = Billing::get()->where('id', Billing::count());
        $pdf = PDF::loadView('backend.adminLogin.billing.pdf',compact('billing'))->setPaper('a4', 'landscape');
            return $pdf->download('HospitalBilling'.'.pdf');
    }
}