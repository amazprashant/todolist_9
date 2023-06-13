<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;
use DB,Redirect,Validator,Session;

class TodoController extends Controller
{
    public function index(Request $request)
    {    $type = $request->input('type');

        if ($type === 'show_all') {
            $todo_all = Todo::all();
        } elseif($type === 'normal') {
            $todo_all = Todo::where('status', 0)->get();
        }else{
            $todo_all = Todo::where('status', 0)->get();
		}
		if ($request->ajax()) {
			// Return the data as JSON for AJAX requests
			return response()->json($todo_all);
		} else {
			// Return the view for regular requests
			// $todo_all = Todo::where('status','0');        
			return view('welcome', compact('todo_all','type'));
			//return view('welcome', compact('todo_all'));
		}
    }
    
    function add(Request $request){
        $thisData						=	$request->all();
		//print_r($thisData);die;
		$validator 					    =	Validator::make(
			$request->all(),
			 array(
			 	'name'				=> 'required|unique:list',
			 ),
			 array(
			 	"name.required"			=>	trans("The  name field is required."),
			 	"name.unique"			=>	trans("The  name field is unique.")
			 )
		);

		if ($validator->fails()) {	
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
				DB::beginTransaction();
				$obj 					=    new Todo;
				$obj->name		        = 	$thisData['name'];
                //$obj->status		    = 	now();
                $obj->created_at		= 	now();
                $obj->updated_at		= 	now();
				//}
				$objSave				=   $obj->save();
				$last_id				=	$obj->id;
				if(!$objSave) {
					DB::rollback();
					Session::flash('error', trans("Something went wrong.")); 
					return Redirect::route("index");
				}
				DB::commit();
				Session::flash('success',trans("Todo item has been added successfully"));
        	}	return Redirect::route("index");
			
	}// end save()
    public function updatestatus($id)
    {
        // Find the todo item by id
        $todo = Todo::find($id);
        if ($todo->status != 1) {
            // Update the status to 1
            $todo->status = 1;
            $todo->save();
            return response()->json(['success' => true]);
        }else{
            $todo->status = 0;
            $todo->save();
            return response()->json(['success' => true]);
        }
        
        return response()->json(['success' => false, 'message' => 'Todo item not found']);
    }
    public function delete($id =0){
        $todoDetails	=	Todo::find($id);
		//dd($todoDetails);
		if(empty($todoDetails)) {
			return Redirect::route("index");
		}
		if($id){		
			$todoDetails->delete();
			Session::flash('flash_notice',trans("Todo item has been removed successfully")); 
			return Redirect::route("index");
		}
		return Redirect::back();
    }
}