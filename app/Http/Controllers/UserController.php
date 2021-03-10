<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\UserRequest;
use DB;
use Yajra\DataTables\DataTables;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->lemiddleware('auth');
    }

   /**
     * @param
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	
    public function list()
    {
		return view('user.list');
    }
	 /**
     * Process dataTable ajax response.
     *
     * @param Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function listData(Datatables $dataTables)
    {
		$user = User::select(['id', 'fullName', 'email']);
							
		 return $dataTables->eloquent($user)
			 ->addIndexColumn()
			 ->addColumn('view', function (User $user) {
					
			 	return '<a href="'.url('admin/user/view/'.$user->id.'?mode=view&user_type='.$user->id_user_type).'">View</a>';
             })
			 ->addColumn('action', function (User $user) {
			 	$html = '';
				$html.='<ul class="d-flex justify-content-center action">';
						$html.='<li class="mr-3"><a href="'.url('/', ['item' => $user->id]).'" class="text-success">Edit</a></li>';
						$html.='<li class="mr-3"><a href="javascript:;" data-id="'.$user->id.'" class="text-danger user-del">Delete</a></li>';
				$html.='</ul>';
			   return $html;
            })
             ->rawColumns(['view', 'action'])
             ->make();
	}
	/**
     * @param 
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
	   return view('user.form', ['user' => $user]);
    }
	
	/**
     * @param 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
		return view('user.form',['user' => new User()]);
    }
	/**
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
		
        try {
            /** @var*/
			$user = new User();
			$user->fullName = $request->fullName;
			$user->email = $request->email;
			$user->password = Hash::make($request->password);
			$user->mobileNumber = $request->mobileNumber;
			if ($request->hasFile('profileImage')) 
            {
				if (!is_dir('./public/uploads/user/')){
					mkdir('./public/uploads/user/', 0777, TRUE);
				}

                $file = $request->file('profileImage');
                $extension = $file->getClientOriginalExtension(); // getting image extension            
                $filename = rand(10,100).time().'.'.$extension;
                $file->move(public_path().'/uploads/user/', $filename);
				$user->profileImage = $filename;
            }
			DB::beginTransaction();
			$user->save();
			DB::commit();
            \Session::put("Success","User was successfully saved.");
        } catch (\Exception $e) {
			DB::rollBack();
            \Session::put("Error","User wasn't save! Error: " . $e->getMessage());
        }

        return url('/');
    }
	/**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {   
        try {
            $id = $request->id;
            $del = User::find($id);
            DB::beginTransaction();
            $del->delete();
            DB::commit();
            
        } catch (\Exception $e) {
            DB::rollBack();
            \Session::put("Error","User wasn't delete! Error: " . $e->getMessage());
        }
    }
	/**
     * @param UserRequest $request
     * 
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
	
        try {
			$user->fullName = $request->fullName;
			$user->email = $request->email;
			$user->mobileNumber = $request->mobileNumber;
			if(!empty($request->password)){
				$user->password = Hash::make($request->password);
			}
					
			if ($request->hasFile('profileImage')) 
			{
				if (!is_dir('./public/uploads/user/')){
					mkdir('./public/uploads/user/', 0777, TRUE);
				}

				if ($user->profileImage != "") {
				
					if (file_exists('uploads/user/'. $user->profileImage)) {
						unlink('uploads/user/'. $user->profileImage);
					}
				}

				$file = $request->file('profileImage');
				$extension = $file->getClientOriginalExtension(); // getting image extension            
				$filename = rand(10,100).time().'.'.$extension;
				$file->move(public_path().'/uploads/user/', $filename);
				$user->profileImage = $filename;
			}

            DB::beginTransaction();
            $user->save();
           
            DB::commit();
            \Session::put("Success","User was successfully saved.");
        } catch (\Exception $e) {
            DB::rollBack();
            \Session::put("Error","User wasn't save! Error: " . $e->getMessage());
        }

        return url('/');
    }
	
}

