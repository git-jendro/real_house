<?php

namespace App\Http\Controllers;

use App\AmenityRules;
use App\Bonus;
use App\FacilityRules;
use App\Log;
use App\Reseller;
use App\Role;
use App\Unit;
use App\UnitImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class ResellerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'dashboard']);
    }

    public function index()
    {
        if (Auth::user()->role_id == 5) {
            $reseller = Reseller::where('nama', Auth::user()->name)->get();
            $role = Role::where('id', 5)->get();

            return view('/dashboard/reseller/index', compact('reseller', 'role'));
        }
        $reseller = Reseller::all();
        $unit = Unit::where('user_id', Auth::user()->id)->get();
        $role = Role::where('id', 5)->get();

        return view('/dashboard/reseller/index', compact('reseller', 'unit', 'role'));
    }
 
    public function generate(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3|string',
            'unit_id' => 'required',
            'email' => 'required|unique:users|min:8|email',
            'password' => 'required|min:6',
            'bonus_reseller' => 'required',
        ]);
        $reseller = new Reseller;
        $reseller->user_id = Auth::user()->id;
        $reseller->uuid = Uuid::uuid4();
        $reseller->nama = $request->nama;
        $reseller->refflink = '/reff/?'.$reseller->uuid;
        $reseller->unit_id = $request->unit_id;
        $reseller->save(); 

        $log = new Log;
        $log->unit_id = $reseller->unit_id;
        $log->user_id = $reseller->user_id;
        $log->reseller_id = $reseller->id;
        $log->lihat =  0;
        $log->book =  0;
        $log->bayar = 0;
        $log->save();

        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 5;
        $user->save();

        Bonus::where('unit_id', $request->unit_id)
            ->update([
                'bonus_reseller' => $request->bonus_reseller
            ]);
        
        return redirect()->action('ResellerController@index')->with('store', 'Data reseller berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $reseller = Reseller::where('id', $id)->first();
        
        User::where('name', $reseller->nama)->delete();
        Reseller::destroy($id);

        return redirect()->action('ResellerController@index')->with('delete', 'Data reseller berhasil dihapus');
    }

    public function show($uuid)
    {
        $res = Reseller::where('uuid', $uuid)->first();
        $unit = Unit::where('id', $res->unit_id)->first();
        $image = UnitImage::where('unit_id', $unit->id)->get();
        $amenity = AmenityRules::where('unit_id', $unit->id)->get();
        $facility = FacilityRules::where('building_id', $unit->building_id)->get();
        $log = Log::where('reseller_id', $res->id)->first();
        
        $lihat = $log->lihat +1;
        $log->update([
            
            'lihat' => $lihat
        ]);

        return view('/detail', compact('unit', 'image', 'amenity', 'facility', 'uuid'));
    }

    public function buy($uuid, $id)
    {
        $unit = Unit::find($id);
        $reseller = Reseller::where('uuid', $uuid)->first();
        if ($unit->stock == 0) {
            // dd($unit->stock.'0');
            return redirect()->action('HomeController@welcome', compact('uuid'))->with('fail', 'Maaf untuk sekarang produk yang anda minati tidak tersedia');
        }
        $stock = $unit->stock - 1;
        $unit->stock = $stock;
        $unit->save();

        $log = new Log;
        $log->unit_id = $unit->id;
        $log->user_id = $reseller->user_id;
        $log->reseller_id = $reseller->id;
        $log->save();

        $log = Log::where('reseller_id', $reseller->id)->first();
        $bayar = $log->bayar +1;
        $log->update([
            'bayar' => $bayar
        ]);

        
        return redirect()->action('HomeController@welcome')->with('success', 'Terima kasih telah melakukan transaksi');
    }
    
}
