<?php
class Admin_manage_compartments extends Controller{
	public function __construct(){
		$this->adminModel=$this->model('Admin_manage_compartment');
	}

	public function index(){
		$manage_compartment=$this->adminModel->get();
		$data = [
			'manage_compartment'=>$manage_compartment
		];
		$this->view('admins/manage_compartment/index', $data);
	}

	public function create(){
		$trains=$this->adminModel->getTrainId();
		$types=$this->adminModel->getType();
		$added_data=$this->adminModel->get();
		$data = [
			'trains'=>$trains,
			'types'=>$types,
			'added_data'=>$added_data,
			'trainId'=>'',
			'compartmentNo'=>'',
			'class'=>'',
			'noofseats'=>'',
			'type'=>'',
			'trainIdError'=>'',
            'compartmentNoError'=>'',
            'classError'=>'',
            'noofseatsError'=>'',
            'typeError'=>''
		];

		if($_SERVER['REQUEST_METHOD']=='POST'){
			$_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data=[
			'trains'=>$trains,
			'types'=>$types,
			'added_data'=>$added_data,	
			'trainId'=>trim($_POST['trainId']),	
			'compartmentNo'=>trim($_POST['compartmentNo']),			
			'class'=>trim($_POST['class']),
			'noofseats'=>trim($_POST['noofseats']),
			'type'=>trim($_POST['type']),
			'trainIdError'=>'',
            'compartmentNoError'=>'',
            'classError'=>'',
            'noofseatsError'=>'',
            'typeError'=>''
			];
            $idValidation="/^[a-zA-Z0-9]*$/";
            $nameValidation="/^[a-zA-Z]*$/";
            $numberValidation="/^[0-9]*$/";

                if(empty($data['trainId'])){
                $data['trainIdError']='Please Enter the Train ID.';
                }elseif(!preg_match($idValidation, $data['trainId'])){
                    $data['trainIdError']="Officer ID can only contain letters and numbers.";
                }

                if(empty($data['compartmentNo'])){
                    $data['compartmentNoError']='Please Enter the Compartment No.';
                }elseif(!preg_match($idValidation, $data['compartmentNo'])){
                    $data['compartmentNoError']="Compartment No can only contain letters and numbers.";
                }else{
                    //if Employee ID exists
                    if($this->adminModel->findCompartmentByCompartmentNo($data['compartmentNo'])){
                        $data['compartmentNoError']='This compartment is already registered as a compartment in the system.'; 
                    }
                }
                if(empty($data['class'])){
                    $data['classError']='Please Enter the First Name.';
                }elseif(!preg_match($nameValidation, $data['class'])){
                    $data['classError']="Class can only contain letters.";
                }
                if(empty($data['noofseats'])){
                    $data['noofseatsError']='Please Enter the Last Name.';
                }elseif(!preg_match($numberValidation, $data['noofseats'])){
                    $data['noofseatsError']="Number of Seats can only contain numbers.";
                }
                if(empty($data['type'])){
                    $data['typeError']='Please Enter the Compartment No.';
                }elseif(!preg_match($numberValidation, $data['compartmentNo'])){
                    $data['typeError']="Type can only contain letters and numbers.";
                }

                if(empty($data['trainIdError']) && empty($data['compartmentNoError']) &&
                empty($data['classError']) && empty($data['noofseatsError']) && 
                empty($data['typeError']) ){

			if ($this->adminModel->create_compartment($data)) {
				header("Location: " . URLROOT . "/Admin_manage_compartments/create");
			}else{
				die("Something Going Wrong");
			}
           }
		}

		$this->view('admins/manage_compartment/create', $data);
	}

	public function edit($trainId){

		$manage_compartment=$this->adminModel->findTrain($trainId);
		$trains=$this->adminModel->getTrainId();
		$types=$this->adminModel->getType();
		$added_data=$this->adminModel->get();

		$data = [
			'manage_compartment'=>$manage_compartment,
			'trains'=>$trains,
			'types'=>$types,
			'added_data'=>$added_data,
			'trainId'=>'',
			'compartmentNo'=>'',
			'class'=>'',
			'noofseats'=>'',
			'type'=>'',
			'trainIdError'=>'',
            'compartmentNoError'=>'',
            'classError'=>'',
            'noofseatsError'=>'',
            'typeError'=>''
		];

		if($_SERVER['REQUEST_METHOD']=='POST'){
			$_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data=[
			'manage_compartment'=>$manage_compartment,
			'trains'=>$trains,
			'types'=>$types,	
			'trainId'=>$trainId,
			'added_data'=>$added_data,	
			'compartmentNo'=>trim($_POST['compartmentNo']),			
			'class'=>trim($_POST['class']),
			'noofseats'=>trim($_POST['noofseats']),
			'type'=>trim($_POST['type']),
			'trainIdError'=>'',
            'compartmentNoError'=>'',
            'classError'=>'',
            'noofseatsError'=>'',
            'typeError'=>''
			];

            $idValidation="/^[a-zA-Z0-9]*$/";
            $nameValidation="/^[a-zA-Z]*$/";
            $numberValidation="/^[0-9]*$/";


                if(empty($data['compartmentNo'])){
                    $data['compartmentNoError']='Please Enter the Compartment No.';
                }elseif(!preg_match($idValidation, $data['compartmentNo'])){
                    $data['compartmentNoError']="Compartment No can only contain letters and numbers.";
                }else{
                    //if Employee ID exists
                    if($this->adminModel->findCompartmentByCompartmentNo($data['compartmentNo'])){
                        $data['compartmentNoError']='This compartment is already registered as a compartment in the system.'; 
                    }
                }
                if(empty($data['class'])){
                    $data['classError']='Please Enter the First Name.';
                }elseif(!preg_match($nameValidation, $data['class'])){
                    $data['classError']="Class can only contain letters.";
                }
                if(empty($data['noofseats'])){
                    $data['noofseatsError']='Please Enter the Last Name.';
                }elseif(!preg_match($numberValidation, $data['noofseats'])){
                    $data['noofseatsError']="Number of Seats can only contain numbers.";
                }
                if(empty($data['type'])){
                    $data['typeError']='Please Enter the Compartment No.';
                }elseif(!preg_match($numberValidation, $data['compartmentNo'])){
                    $data['typeError']="Type can only contain letters and numbers.";
                }else{
                    //if Employee ID exists
                    if($this->adminModel->findCompartmentByType($data['type'])){
                        $data['typeError']='This compartment is already registered as a compartment in the system.'; 
                    }
                }

                if(empty($data['trainIdError']) && empty($data['compartmentNoError']) &&
                empty($data['classError']) && empty($data['noofseatsError']) && 
                empty($data['typeError']) ){

			if ($this->adminModel->edit($data)) {
				header("Location: " . URLROOT . "/Admin_manage_compartments");
			}else{
				die("Something Going Wrong");
			}           
		}
	}
		$this->view('admins/manage_compartment/edit', $data);
	}

		public function views($trainId){

		$manage_compartment=$this->adminModel->findTrain($trainId);

		$data = [
			'manage_compartment'=>$manage_compartment,
			'trainId'=>'',
			'compartmentNo'=>'',
			'class'=>'',
			'noofseats'=>'',
			'type'=>''
		];

		if($_SERVER['REQUEST_METHOD']=='POST'){
			$_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data=[
			'trainId'=>$trainId,	
			'compartmentNo'=>trim($_POST['compartmentNo']),			
			'class'=>trim($_POST['class']),
			'noofseats'=>trim($_POST['noofseats']),
			'type'=>trim($_POST['type'])
			];
			if ($this->adminModel->views($data)) {
				header("Location: " . URLROOT . "/Admin_manage_compartments");
			}else{
				die("Something Going Wrong");
			}           
		}
		$this->view('admins/manage_compartment/views', $data);
	}

	public function delete($trainId){

		$manage_compartment=$this->adminModel->findTrain($trainId);

		$data = [
			'manage_compartment'=>$manage_compartment,
			'trainId'=>'',
			'compartmentNo'=>'',
			'class'=>'',
			'noofseats'=>'',
			'type'=>''
		];

		if($_SERVER['REQUEST_METHOD']=='POST'){
			$_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if($this->adminModel->delete($trainId)){
			header("Location: " . URLROOT . "/Admin_manage_compartments");
		}
		else{
			die('Something Going Wrong');
		}
	}
	}
}	