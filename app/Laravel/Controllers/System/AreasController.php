<?php 

namespace App\Laravel\Controllers\System;

/**
*
* Models used for this controller
*/
use App\Laravel\Models\Areas;

/**
*
* Requests used for validating inputs
*/
use App\Laravel\Requests\System\AreasRequest;

/**
*
* Classes used for this controller
*/
use Helper, Carbon, Session, Str,ImageUploader;

class AreasController extends Controller{

	/**
	*
	* @var Array $data
	*/
	protected $data;

	public function __construct () {
		$this->data = [];
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->data['statuses'] = [ 'active' => "Active","inactive" => "Inactive"];
		$this->data['heading'] = "Areas";
	}

	public function index () {
		$this->data['page_title'] = " :: Areas - Record Data";
		$this->data['news'] = Areas::orderBy('updated_at',"DESC")->paginate(15);
		return view('system.areas.index',$this->data);
	}
	

	public function create () {
		$this->data['page_title'] = " :: Areas - Add new record";
		return view('system.areas.create',$this->data);
	}

	public function store (AreasRequest $request) {
		// return $request->all();
		try {
			$areas = new Areas;
			$user = $request->user();
        	$areas->fill($request->only('area_code','desc','floor','row','col'));
		
			$areas->user_id = $request->user()->id;
			if($areas->save()) {
				session()->flash('notification-status','success');
				session()->flash('notification-msg',"New record has been added.");
				return redirect()->route('system.areas.index');
			}
			session()->flash('notification-status','failed');
			session()->flash('notification-msg','Something went wrong.');

			return redirect()->back();
		} catch (Exception $e) {
			session()->flash('notification-status','failed');
			session()->flash('notification-msg',$e->getMessage());
			return redirect()->back();
		}
	}

	public function edit ($id = NULL) {
		$this->data['page_title'] = " :: Areas - Edit record";
		$areas = Areas::find($id);

		if (!$areas) {
			session()->flash('notification-status',"failed");
			session()->flash('notification-msg',"Record not found.");
			return redirect()->route('system.areas.index');
		}

		if($id < 0){
			session()->flash('notification-status',"warning");
			session()->flash('notification-msg',"Unable to update special record.");
			return redirect()->route('system.areas.index');	
		}

		$this->data['area'] = $areas;
		return view('system.areas.edit',$this->data);
	}

	public function preview ($id = NULL) {
		$this->data['page_title'] = " :: Areas - Edit record";
		$areas = Areas::find($id);

		if (!$areas) {
			session()->flash('notification-status',"failed");
			session()->flash('notification-msg',"Record not found.");
			return redirect()->route('system.areas.index');
		}

		if($id < 0){
			session()->flash('notification-status',"warning");
			session()->flash('notification-msg',"Unable to update special record.");
			return redirect()->route('system.areas.index');	
		}

		$this->data['area'] = $areas;
		return view('system.areas.preview',$this->data);
	}

	public function update (AreasRequest $request, $id = NULL) {
		try {
			$areas = Areas::find($id);

			if (!$areas) {
				session()->flash('notification-status',"failed");
				session()->flash('notification-msg',"Record not found.");
				return redirect()->route('system.areas.index');
			}

			if($id < 0){
				session()->flash('notification-status',"warning");
				session()->flash('notification-msg',"Unable to update special record.");
				return redirect()->route('system.areas.index');	
			}
			$user = $request->user();
			$areas->fill($request->only('area_code','desc','floor','row','col'));
        	

			if($areas->save()) {
				session()->flash('notification-status','success');
				session()->flash('notification-msg',"Record has been modified successfully.");
				return redirect()->route('system.areas.index');
			}

			session()->flash('notification-status','failed');
			session()->flash('notification-msg','Something went wrong.');

		} catch (Exception $e) {
			session()->flash('notification-status','failed');
			session()->flash('notification-msg',$e->getMessage());
			return redirect()->back();
		}
	}

	public function destroy ($id = NULL) {
		try {
			$areas = Areas::find($id);

			if (!$areas) {
				session()->flash('notification-status',"failed");
				session()->flash('notification-msg',"Record not found.");
				return redirect()->route('system.areas.index');
			}

			if($id < 0){
				session()->flash('notification-status',"warning");
				session()->flash('notification-msg',"Unable to remove special record.");
				return redirect()->route('system.areas.index');	
			}

			if($areas->delete()) {
				session()->flash('notification-status','success');
				session()->flash('notification-msg',"Record has been deleted.");
				return redirect()->route('system.areas.index');
			}

			session()->flash('notification-status','failed');
			session()->flash('notification-msg','Something went wrong.');

		} catch (Exception $e) {
			session()->flash('notification-status','failed');
			session()->flash('notification-msg',$e->getMessage());
			return redirect()->back();
		}
	}

}