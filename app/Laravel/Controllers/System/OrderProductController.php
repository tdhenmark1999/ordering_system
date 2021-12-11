<?php 

namespace App\Laravel\Controllers\System;

/**
*
* Models used for this controller
*/
use App\Laravel\Models\Product;
use App\Laravel\Models\Category;
use Illuminate\Http\Request as PageRequest;
/**
*
* Requests used for validating inputs
*/
use App\Laravel\Requests\System\ProductRequest;

/**
*
* Classes used for this controller
*/
use Helper, Carbon, Session, Str,ImageUploader,DB;

class OrderProductController extends Controller{

	/**
	*
	* @var Array $data
	*/
	protected $data;
	protected $product_model;

	public function __construct () {
		$this->data = [];
		$this->product_model = new Product;
		parent::__construct();
		array_merge($this->data, parent::get_data());
		$this->data['statuses'] = [ 'active' => "Active","inactive" => "Inactive"];
		$this->data['heading'] = "Order Product";
	}

	public function index () {
		$this->data['page_title'] = " :: Order Product - Record Data";
		$this->data['products'] = Product::orderBy('updated_at',"DESC")->paginate(100);
		return view('system.order-product.index',$this->data);
	}
	

	public function create () {
		$this->data['page_title'] = " :: Product - Add new record";
		$this->data['categories'] = Category::orderBy('updated_at',"DESC")->paginate(100);
		return view('system.product.create',$this->data);
	}

	public function store(ProductRequest $request){

		// return $request->all();
		// return $request->all();
		DB::beginTransaction();

		try {
			
		if($request->hasFile('file')){
			$file = $request->file('file');
			$filename = time().$file->getClientOriginalName();
			$path = public_path().'/uploads/images/';
			$this->product_model->file_name = $filename;
			$this->product_model->directory = $path;
			$this->product_model->full_path = $path."/".$filename;
			$this->product_model->fill($request->except(['file']));
			if($this->product_model->save()){

				$file->move($path, $filename);
				// save training_session

				DB::commit();
				return redirect()->route('system.product.index');
			}
		}
			

		} catch (\Throwable $th) {
			throw $th;
			DB::rollback();
		}

	}


	public function edit ($id = NULL) {
		$this->data['page_title'] = " :: Product - Edit record";
		$category = Product::find($id);
		$this->data['categories'] = Category::orderBy('updated_at',"DESC")->paginate(15);

		if (!$category) {
			session()->flash('notification-status',"failed");
			session()->flash('notification-msg',"Record not found.");
			return redirect()->route('system.product.index');
		}

		if($id < 0){
			session()->flash('notification-status',"warning");
			session()->flash('notification-msg',"Unable to update special record.");
			return redirect()->route('system.product.index');	
		}

		$this->data['category'] = $category;
		return view('system.product.edit',$this->data);
	}

	

	public function update(ProductRequest $request, $id=NULL){
		// return dd($request);
		try {
			
			DB::beginTransaction();
			$products = Product::find($id);
			if($request->hasFile('file')){
				$file = $request->file('file');
				$filename = time().$file->getClientOriginalName();
				$path = public_path().'/uploads/images/';
				$this->products->file_name = $filename;
				$this->products->directory = $path;
				$this->products->full_path = $path."/".$filename;
				$this->products->fill($request->except(['file']));
				if($this->product_model->save()){

					$file->move($path, $filename);
					// save training_session
	
					DB::commit();
					return redirect()->route('system.product.index');
				}
			}
			else {
				$products->fill($request->only('name','description','status','price','category'));
				$products->save();
				DB::commit();
				session()->flash('notification-status','success');
				session()->flash('notification-msg',"Parameter .");
				return redirect()->route("system.product.index");
			}
		
		} catch (Exception $e) {
			DB::rollback();
			session()->flash('notification-status','warning');
			session()->flash('notification-msg',"Went something wrong".$e->message());
			return redirect()->back();
		}
	}

	public function destroy ($id = NULL) {
		try {
			$category = Product::find($id);

			if (!$category) {
				session()->flash('notification-status',"failed");
				session()->flash('notification-msg',"Record not found.");
				return redirect()->route('system.product.index');
			}

			if($id < 0){
				session()->flash('notification-status',"warning");
				session()->flash('notification-msg',"Unable to remove special record.");
				return redirect()->route('system.product.index');	
			}

			if($category->delete()) {
				session()->flash('notification-status','success');
				session()->flash('notification-msg',"Record has been deleted.");
				return redirect()->route('system.product.index');
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