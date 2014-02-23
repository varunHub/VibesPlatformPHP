<?php namespace platform\core;
//platform\core\coreFullModel

use Controller;
use View;
use Input;
use DB;
use Request;
use Response;
use Illuminate\Database\Query;
use Log;

use Exception ;

abstract class coreController extends platformController implements ICoreController
{
	public $restful = true;

	protected $model_name;
	protected $json_model_key;
	protected $model_view;

	protected $view_list;
	protected $view_edit;
	protected $view_show;
	protected $view_admin_list;
	protected $view_admin_edit;
	protected $view_admin_show;
	protected $view_user_list;
	protected $view_user_edit;
	protected $view_user_show;

	//protected $return_type	 = 0;

	protected $key_field = 'id';
	protected $primaryKey ='id';
	protected $default_search_field = 'id';
	protected $pagination_count = 10;
	
	public function __construct()
	{
		$this->setup();
		if ($this->model_view=="")
		{
			$this->model_view = $this->model_name;
		}
	}


	public function json_list($q = '')
	{
		$_model = $this->model_view;

		if (Input::has('q'))
		{
			$key = Input::get('q');
		}
		else
		{
			if (Input::has('query'))
			{
				$key = Input::get('query');
			}
			else
			{
				$key = "";
			}
		}

		return $_model::select($this->search_field)
				->where($this->search_field, 'like', '%' . trim($key) . '%')->get();

		//return DB::select("select category_main from ina_dir_1_tbl_sys_category where " . $this->search_field . " like '%" . trim($key) . "%' ", array(1));
		//return DB::table('tbl_sys_category')->select($this->search_field)->where($this->search_field, 'like', '%' . trim($key) . '%')->get();

	}

	public function similar_json_list($key = null)
	{
		$_model = new $this->model_name;
		//$use_model = eloquent_to_json();
		//DD(DB::table('biz_category')->toJson());
		return json_encode($use_model['attributes']);
	}

	public function create_in_model_window($id=0)
	{
		// return "create_in_model_window -  create_in_model_window";
		$_model = $this->model_name;
		$use_model = $_model::find($id);
		if (is_null($use_model))
		{
			$use_model = new $_model;
			$use_model->make();
		}

		$datax = "{" . $this->json_model_key .":[" . json_encode($use_model['attributes']) . "]}";
		return View::make($this->view_edit)
			->with('datax', $datax)
			->with('core_all_active_status', json_encode($_model::$core_all_active_status))
			->with('no_layout', "")
			;
	}


	protected function getEditViewName()
	{
		$lView = $this->view_edit;

		if (Request::segment(1)=='user')
		{
			$lView = $this->view_user_edit;
		}
		if (Request::segment(1)=='admin')
		{
			$lView = $this->view_admin_edit;
		}
		return $lView;
	}

	protected function getShowViewName()
	{
		$lView = $this->view_edit;

		if (Request::segment(1)=='user')
		{
			$lView = $this->view_user_show;
		}
		if (Request::segment(1)=='admin')
		{
			$lView = $this->view_admin_show;
		}
		return $lView;
	}

	protected function getListViewName()
	{
		$lView = $this->view_edit;

		if (Request::segment(1)=='user')
		{
			$lView = $this->view_user_list;
		}
		if (Request::segment(1)=='admin')
		{
			$lView = $this->view_admin_list;
		}
		return $lView;
	}





	public function get_single($id)
	{
		$_model = $this->model_name;
		$use_model = new $_model;

		$use_model = $_model::find($id);

		$lView = $this->getEditViewName();

		if (is_null($use_model))
		{
			$use_model = new $_model;
			$use_model->make();
		}

		if (Request::segment(1)=='api')
		{
			return Response::json($use_model);
		}

		$datax = "{" . $this->json_model_key .":[" . json_encode($use_model['attributes']) . "]}";


		return View::make($lView)
			->with('datax', $datax)
			->with('core_all_active_status', json_encode($_model::$core_all_active_status))
			->with($this->json_model_key, $use_model)
			->with('support_data', $use_model->support_data())
			;
	}

	public function support_data()
	{
		return array();
	}

	public function get_create()
	{
		return $this->get_single(0);
	}


	public function pst_single_save($id)
	{

		log::info('Start post single save ');



		$input			= Input::all();
		$errors			= array();

		$input_model 	= $input['data'][$this->json_model_key];
		$_model 		= new $this->model_name;

		$_model->validateMe($input_model);

		foreach ($input_model as $s)
		{
			$lKey =0 ;
			if (isset($s[$this->key_field]))
			{
				$lKey = $s[$this->key_field];
			}
		
			$_model = $this->model_name;
			$use_model = $_model::find($lKey);
			
			if (is_null($use_model))
			{
				$use_model = new $_model;
				$use_model->make();
			}
			else
			{
				$use_model->exists = true;
			}
			
			$use_model->assignTo($s);
			$use_model -> save();
			$base_id = $use_model -> id;
		}
		//echo Input::has('return');
		/*
		if (Input::has('return'))
		{
			echo "{" . $this->json_model_key . ":[" . json_encode($use_model['attributes']) . "]}";
		}
		else
		{
			//echo "saved";	
			
			//echo json_encode($use_model['attributes']);
		}
		*/


		$message = '"success":[{"message":"Saved"}]';

		//echo $message;
		echo '{"' . $this->json_model_key . '":[' . json_encode($use_model['attributes']) . '] ,'  .  $message . '}';

		//die('{"error":[{"message":"' . implode($validation->messages()->all(),'"},{"message":"') . '"}]}');
		//echo $base_id;
		exit ;
	}

	private function put_single_save($id)
	{


echo "d";

		$input			= Input::all();
		$errors			= array();

		$input_model 	= $input;
		$_model 		= $this->model_name;

		
		$validation = $_model::validate($input_model);
		if ($validation->fails())
		{
			die('{"error":[{"message":"' . implode($validation->messages()->all(),'"},{"message":"') . '"}]}');
		}
		
			

		$s = $input_model;
		
		$lKey =0 ;
		if (isset($s[$this->key_field]))
		{
			$lKey = $s[$this->key_field];
		}
	

		$_model = $this->model_name;
		$use_model = $_model::find($lKey);
		
		if (is_null($use_model))
		{
			$use_model = new $_model;
			$use_model->make();
		}
		else
		{
			$use_model->exists = true;
		}
		
		$use_model->assignTo($s);
		// look for existing change
		$use_model -> save();
		$base_id = $use_model -> id;
		
		//echo Input::has('return');
		/*
		if (Input::has('return'))
		{
			echo "{" . $this->json_model_key . ":[" . json_encode($use_model['attributes']) . "]}";
		}
		else
		{
			//echo "saved";	
			
			//echo json_encode($use_model['attributes']);
		}
		*/


		$message = '"success":[{"message":"Saved"}]';

		//echo $message;
		echo '{"' . $this->json_model_key . '":[' . json_encode($use_model['attributes']) . '] ,'  .  $message . '}';

		//die('{"error":[{"message":"' . implode($validation->messages()->all(),'"},{"message":"') . '"}]}');
		//echo $base_id;
		exit ;
	}

    public function findOrCreate($temp2, $id)
    {

        $temp = $temp2->find($id);
        if (is_null($temp))
        {
            $temp = new $temp2;
            $temp = $temp->make();
        }
        else
        {
            $temp->exists = true;
        }
        return $temp;
    }

	private function getObjectList()
	{
		$_model = $this->model_view;
		
		$search_key = Input::get('search_key');
		if ($search_key=="")
		{

		}

		return $_model::where($this->default_search_field,'like','%' . $search_key . '%')->orderBy($this->key_field, 'desc')->paginate($this->pagination_count);
	}

/*
http://laravel.com/docs/controllers#resource-controllers

GET			/resource			index	resource.index
GET			/resource/create	create	resource.create
POST		/resource			store	resource.store
GET			/resource/{id}		show	resource.show
GET			/resource/{id}/edit	edit	resource.edit
PUT/PATCH	/resource/{id}		update	resource.update
DELETE		/resource/{id}		destroy	resource.destroy
*/
	public function index()
	{
		
		$use_model = $this->getObjectList();


		if (Request::segment(1)=='api')
		{
			return Response::json($use_model);
		}

		return View::make($this->getListViewName())
			-> with('title',  $this->model_title)
			-> with($this->json_model_key, $use_model)
			;

	}
	public function create()
	{
		return $this->get_single(0);
	}
	public function edit($id)
	{
		return $this->get_single($id);
	}
	public function store()
	{
		$this->update(0);
	}
	public function show($id)
	{

		return $this->get_single($id);
	}
	public function update($id)
	{
		

		if (Request::segment(1)=='api')
		{

			return $this->pst_single_save($id);
		}
		else
		{
			return $this->put_single_save($id);
		}
		
	}
	public function destroy($id)
	{
		//return $this->generateCallTrace();
		//echo "destroy " . $id;
		
	}

	function generateCallTrace()
	{
		$e = new Exception();
		$trace = explode("\n", $e->getTraceAsString());
		// reverse array to make steps line up chronologically
		$trace = array_reverse($trace);
		array_shift($trace); // remove {main}
		array_pop($trace); // remove call to this method
		$length = count($trace);
		$result = array();

		for ($i = 0; $i < $length; $i++)
		{
		    $result[] = ($i + 1)  . ')' . substr($trace[$i], strpos($trace[$i], ' ')); // replace '#someNum' with '$i)', set the right ordering
		}

		return "\t" . implode("\n\t", $result);
	}

	//abstract protected function assign($s);
	abstract protected function setup();



	public function missingMethod($parameters = array())
	{
    //TODO Log this
		DD($parameters)	;
	}
}

interface ICoreController
{
	//abstract protected function get_list();
	//protected function get_single($id);
}