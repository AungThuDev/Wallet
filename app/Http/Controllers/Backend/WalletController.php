<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WalletController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $wallets = Wallet::with('user');
            return DataTables::of($wallets)
            ->addColumn('account_person',function($each){
                $user = $each->user;
                if($user)
                {
                    return '<table class="table table-striped">
                        <tbody>
                            <tr><td>Name</td><td>'.$each->user->name.'</td></tr>
                            <tr><td>Email</td><td>'.$each->user->email.'</td></tr>
                            <tr><td>Phone</td><td>'.$each->user->phone.'</td></tr>
                        </tbody>
                    </table>';
                }
                return "-";
            })->editColumn('created_at',function($each){
                return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
            })->editColumn('updated_at',function($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d H:i:s');
            })
            ->rawColumns(['account_person'])
            ->make(true);
        }
        return view('backend.wallet.index');
    }
}
