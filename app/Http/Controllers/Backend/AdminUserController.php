<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminUser;
use App\Http\Requests\UpdateAdminUser;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Yajra\DataTables\DataTables;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        
        if($request->ajax()){
            $user = AdminUser::query();
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
                $edit_icon = '<a href="'.route('admin.admin-user.edit',$each->id).'" class="text-warning"><i class="fa fa-edit"></i></a>';
                $delete_icon = '<a href="" class="text-danger delete" data-id = "'.$each->id.'"><i class="far fa-trash"></i></a>';

                return '<div class="action-icon">' . $edit_icon . $delete_icon . '</div>';
            })
            ->rawColumns(['user_agent','action'])
            ->make(true); 
        }
        return view('backend.admin_user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminUser $request)
    {
        //return $request->all();
        $admin = new AdminUser();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);

        $admin->save();
        return redirect()->route('admin.admin-user.index')->with('create','Successfully Created');
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
        $admin = AdminUser::findOrFail($id);
        return view('backend.admin_user.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminUser $request, $id)
    {
        $admin = AdminUser::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = $request->password ? Hash::make($request->password) : $admin->password;

        $admin->update();
        return redirect()->route('admin.admin-user.index')->with('update','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = AdminUser::findOrFail($id);
        $admin->delete();

        return 'success';
    }
    public function ssd(Request $request)
    {
        
    }
}
