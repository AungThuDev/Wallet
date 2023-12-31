<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Generate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $user = User::query();
            return DataTables::of($user)->editColumn('user_agent',function($each){
                if($each->user_agent){
                    $agent = new Agent();
                $agent->setUserAgent($each->user_agent);
                $device = $agent->device();
                $platform = $agent->platform();
                $browser = $agent->browser();
                return '<table class="table table-bordered">
                    <tbody>
                        <tr><td>Device</td><td>'.$device.'</td></tr>
                        <tr><td>Platform</td><td>'.$platform.'</td></tr>
                        <tr><td>Browser</td><td>'.$browser.'</td></tr>
                    </tbody>
                    </table>';
                }
                else{
                    return "-";
                }
                
            })->addColumn('action',function($each){
                $edit_icon = '<a href="'.route('admin.users.edit',$each->id).'" class="text-warning"><i class="fa fa-edit"></i></a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id = "'.$each->id.'"><i class="far fa-trash"></i></a>';

                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['user_agent','action'])
            ->make(true); 
        }
        return view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        DB::beginTransaction();   
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();

        Wallet::firstOrCreate(
            [
                'user_id' =>  $user->id,
            ],
            [
                'account_number' => Generate::accountNumber(),
                'amount' => 0,
            ]
        );

        DB::commit();



        return redirect()->route('admin.users.index')->with('create','sucessfully created');
        }catch(Exception $e){
            DB::rollBack();
            return back()->withErrors(['fail'=>'SomethingWrong.'.$e->getMessage()])->withInput();
        }   
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        DB::beginTransaction();
        try{
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password ? Hash::make($request->password) : $user->password;

            $user->update();

            Wallet::firstOrCreate(
                [
                    'user_id' =>  $user->id,
                ],
                [
                    'account_number' => Generate::accountNumber(),
                    'amount' => 0,
                ]
            );
    
            DB::commit();

            return redirect()->route('admin.users.index')->with('update','updated successfully');
        } catch(Exception $e)
        {
            DB::rollBack();
            return back()->withErrors(['fail'=>'SomethingWrong.'.$e->getMessage()])->withInput();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return 'success';
    }
}
