<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Vouncher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;

class VouncherController extends Controller
{
    //

    public function view_vouchers()
    {
        $data['property']=Property::latest()->get();
        $data['all']=Vouncher::latest()->get();
        return view('voucher.voucher',$data);
    }

    public function add_voucher(Request $req)
    {
        // return $req;

        $total= $req->adult + $req->kid + $req->infant;

        $check_in=Carbon::parse($req->check_in)->format('d M Y h:i a');
        $check_out = Carbon::parse($req->check_out)->format('d M Y h:i a');

        $book = random_bytes(20);

        $book = bin2hex(random_bytes(10) );

        $due =  (int)$req->total - (int)$req->advance;

        $data=Vouncher::create([
            'property_id'=>$req->property_id,
            'name'=>$req->name,
            'phone_number'=>$req->number,
            'check_in' => $req->check_in,
            'check_out' => $req->check_out,
            'adult' => $req->adult ?? 0,
            'kids' => $req->kid ?? 0,
            'infants' => $req->infant ?? 0,
            'total_amount' => $req->total ?? 0,
            'advance' => $req->advance ?? 0,
            'due' => $due ?? 0,
            'booking_id'=>$book
        ]);


        $prty= Property::where('id', $req->property_id)->first();

        Http::get('http://text.easy2approach.com/api/pushsms?user=xpertnet&authkey=92CM30pZrD6Xw&sender=HOTTLE&mobile='.$req->number.'&text=Booking+Confirmed%3A+Dear+'.$req->name.'%2C+your+booking+is+confirmed+for+'. $prty->name.'%2C+CheckIn%3A+'.$check_in.'%2C+Checkout%3A+'.$check_out.'+for+'.$total.'+guests.+Booking+ID%3A+'.$book.'.%0AMore+details+on+Booking+Voucher+shared+with+you.%0A-Team+Hottley.&unicode=1&output=json&entityid=1201162565798440728&templateid=1207162772456543726');

        return redirect('admin/view_vouchers');

    }

    public function edit_voucher(Request $req)
    {
        // return $req;

        $total = $req->adult + $req->kid + $req->infant;

        $check_in = Carbon::parse($req->edit_check_in)->format('d M Y h:i a');
        $check_out = Carbon::parse($req->edit_check_out)->format('d M Y h:i a');

        $due =  (int)$req->edit_total - (int)$req->edit_receive;
        $book = bin2hex(random_bytes(10));

        Vouncher::where('id',$req->v_id)->update([
            'property_id' => $req->edit_property,
            'name' => $req->edit_name,
            'phone_number' => $req->edit_number,
            'check_in' => $req->edit_check_in,
            'check_out' => $req->edit_check_out,
            'adult' => $req->edit_adult ?? 0,
            'kids' => $req->edit_kid ?? 0,
            'infants' => $req->edit_infant ?? 0,
            'total_amount' => $req->edit_total ?? 0,
            'advance' => $req->edit_receive ?? 0,
            'due' => $due ?? 0,
            'booking_id' => $book
        ]);


        $prty = Property::where('id', $req->edit_property)->first();

        $dta=Http::get('http://text.easy2approach.com/api/pushsms?user=xpertnet&authkey=92CM30pZrD6Xw&sender=HOTTLE&mobile=' . $req->edit_number . '&text=Booking+Confirmed%3A+Dear+' . $req->edit_name . '%2C+your+booking+is+confirmed+for+' . $prty->name . '%2C+CheckIn%3A+' . $check_in . '%2C+Checkout%3A+' . $check_out . '+for+' . $total . '+guests.+Booking+ID%3A+' . $book . '.%0AMore+details+on+Booking+Voucher+shared+with+you.%0A-Team+Hottley.&unicode=1&output=json&entityid=1201162565798440728&templateid=1207162772456543726');


        return redirect('admin/view_vouchers');

    }

    public function voucher_detail($id)
    {
        // return $id;

        $data['all']=Vouncher::where('id',$id)->with('property')->first();
        return view('voucher.voucher_detail',$data);
    }


    public function download_voucher($id)
    {
        // return $id;

        $data = Vouncher::where('id', $id)->with('property')->first();

        // return view('voucher.download1',$data);

        // return view('voucher.download', ['all' => $data]);

        $pdf = PDF::loadView('voucher.download', ['all' => $data])->setPaper('a4', 'portrait');
        return $pdf->download($data->name.'.pdf');
    }


}
