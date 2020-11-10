<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Medicine extends CI_Controller {



	    function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->model('login_model');

        $this->load->model('user_model');

        $this->load->model('supplier_model');
        $this->load->model('medicine_model');
        $this->load->model('configuration_model');
  

    }

	public function index()

	{

		#Redirect to Admin dashboard after authentication

		if ($this->session->userdata('user_login_access') != 1)

            redirect(base_url() . 'login', 'refresh');

        if ($this->session->userdata('user_login_access') == 1)

          $data= array();

        redirect('dashboard/Dashboard');

	}

    public function Create(){
        if($this->session->userdata('user_login_access') != False) {
        $data = array();
        $data['supplierList'] = $this->supplier_model->getAllSupplier();       
        $this->load->view('backend/Add_medicine',$data);
        }

    else{

		redirect(base_url() , 'refresh');

	}        

    }

    public function View(){

        if($this->session->userdata('user_login_access') != False) {
            $data['medicineList'] = $this->medicine_model->getAllMedicine();
            $data['supplierList'] = $this->supplier_model->getAllSupplier();
            $this->load->view('backend/List_medicine',$data);
        }
        else{
    		redirect(base_url() , 'refresh');
    	}            
    }

    public function Save(){
        $supplier_id        = $this->input->post('supplier');
        $product_name       = $this->input->post('product_name');
        $generic_name       = $this->input->post('generic_name');
        $fa                 = $this->input->post('favourite');
        $productid          = 'P'.rand(001,50000);        
        $batchno            = $this->input->post('barcode');        
        $strength           = $this->input->post('strength');
        $form               = $this->input->post('formSelect');
        $trade_price        = $this->input->post('trade_price');
        $mrp                = $this->input->post('mrp');
        $discount           = $this->input->post('discount');
        $side_effect        = $this->input->post('side_effect');
        $expire_date        = $this->input->post('expire_date');
        $instock            = $this->input->post('instock');
        $shortstock         = $this->input->post('short_stock');
        $caruntdate         = date("m-d-Y");
        if($fa==''){
        $favourite = '1';
        } else {
            $favourite = $fa;
        }
        $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('product_name', 'name', 'trim|required|min_length[1]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('instock', 'instock', 'required');
        $this->form_validation->set_rules('trade_price', 'trade_price', 'required');
        $this->form_validation->set_rules('mrp', 'mrp', 'required');
        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
            }else {
         if($_FILES['webcam']['name']){
            $file_name = $_FILES['webcam']['name'];
			$fileSize = $_FILES["webcam"]["size"]/1024;
			$fileType = $_FILES["webcam"]["type"];
			$new_file_name='';
            $new_file_name .= $productid;


            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/medicine",
                'allowed_types' => "gif|jpg|png|jpeg|jfif",
                'overwrite' => False,
                'max_size' => "40480000", // Can be set to particular file size , here it is 4 MB(4096 Kb)
                'max_height' => "4300",
                'max_width' => "4000"
            );
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('webcam')) {
                $response['status'] = 'error';
                $response['message'] = $this->upload->display_errors();
                $this->output->set_output(json_encode($response)); 
			}

			else {
            $image_data =   $this->upload->data();
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],    
              'maintain_ratio'  =>  TRUE,
              'width'           =>  160,
              'height'          =>  100,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
                
                $path = $this->upload->data();
                $product_image = $path['file_name'];
                $data = array();
                $data = array(
                    'product_id' => $productid,
                    'batch_no' => $batchno,
                    'supplier_id' => $supplier_id,
                    'product_name' => $product_name,
                    'generic_name' => $generic_name,
                    'strength' => $strength,
                    'form' => $form,
                    'trade_price' => $trade_price,
                    'mrp' => $mrp,
                    'side_effect'=>$side_effect,
                    'product_image'=> $product_image,
                    'expire_date'=> $expire_date,
                    'instock'=> $instock,
                    'short_stock'=> $shortstock,
                    'favourite'=> $favourite,
                    'date'=> strtotime($caruntdate)
                );
                    $success = $this->medicine_model->Add_medicine_info($data);
                    if($this->db->affected_rows()){
		              //load library
        		      $this->load->library('zend');
        		      //load in folder Zend
        		      $this->zend->load('Zend/Barcode');
        		      //generate barcode
                      $barcode = $batchno;
        		      $file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode,'barHeight'=> 30), array());
                      $store_image = imagepng($file,"./assets/images/barcode/{$barcode}.png");                        
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Added";
                    $response['curl'] = base_url()."Medicine/Create";
                    $this->output->set_output(json_encode($response));                        
                    }    
            }

        }else {
                $data = array();
                $data = array(
                    'product_id' => $productid,
                    'batch_no' => $batchno,
                    'supplier_id' => $supplier_id,
                    'product_name' => $product_name,
                    'generic_name' => $generic_name,
                    'strength' => $strength,
                    'form' => $form,
                    'trade_price' => $trade_price,
                    'mrp' => $mrp,
                    'side_effect'=>$side_effect,
                    'favourite'=> $favourite,
                    'expire_date'=> $expire_date,
                    'instock'=> $instock,
                    'short_stock'=> $shortstock
                );
                    $success = $this->medicine_model->Add_medicine_info($data);
                    if($this->db->affected_rows()){
		              //load library
        		      $this->load->library('zend');
        		      //load in folder Zend
        		      $this->zend->load('Zend/Barcode');
        		      //generate barcode
                      $barcode = $batchno;
        		      $file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode,'barHeight'=> 30), array());
                      $store_image = imagepng($file,"./assets/images/barcode/{$barcode}.png");                        
                        $response['status'] = 'success';
                        $response['message'] = "Successfully Added";
                        $response['curl'] = base_url()."Medicine/Create";
                        $this->output->set_output(json_encode($response));                        
                    }    

            }
        }
    }

    public function Update(){
        $id                 = $this->input->post('id');
        $supplier_id        = $this->input->post('supplier');
        $product_name       = $this->input->post('product_name');
        $generic_name       = $this->input->post('generic_name');               
        $barcode            = $this->input->post('barcode');               
        $strength           = $this->input->post('strength');
        $form               = $this->input->post('form');
        $fa                 = $this->input->post('favourite');
        $trade_price        = $this->input->post('trade_price');
        $mrp                = $this->input->post('mrp');
        $side_effect        = $this->input->post('side_effect');
        $expire_date        = $this->input->post('expire_date');
        $instock            = $this->input->post('instock');
        $shortstock         = $this->input->post('short_stock');
        $caruntdate         = date("m-d-Y");
        if($fa==''){
        $favourite = '0';
        } else {
            $favourite = $fa;
        }
        $this->load->library('form_validation');
        $this->load->library('image_lib');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('product_name', 'name', 'trim|required|min_length[1]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('instock', 'instock', 'required');
        $this->form_validation->set_rules('trade_price', 'trade_price', 'required');
        $this->form_validation->set_rules('mrp', 'mrp', 'required');
        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {            
         if($_FILES['product_image']['name']){
            $file_name = $_FILES['product_image']['name'];
			$fileSize = $_FILES["product_image"]["size"]/1024;
			$fileType = $_FILES["product_image"]["type"];
			$new_file_name='';
            $new_file_name .= $id;
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/medicine",
                'allowed_types' => "gif|jpg|png|jpeg|jfif",
                'overwrite' => False,
                'max_size' => "40480000", // Can be set to particular file size , here it is 4 MB(4096 Kb)
                'max_height' => "4000",
                'max_width' => "4000"
            );
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('product_image')) {
                $response['status'] = 'error';
                $response['message'] = $this->upload->display_errors(); 
			}

			else {
            $image = $this->medicine_model->GetMedicineValueById($id);
                if($image->batch_no != $barcode){
            $checkimage = "./assets/images/barcode/$image->batch_no.png";                 
            	unlink($checkimage); 
		              //load library
        		      $this->load->library('zend');
        		      //load in folder Zend
        		      $this->zend->load('Zend/Barcode');
        		      //generate barcode
                      $barcode = $barcode;
        		      $file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode,'barHeight'=> 30), array());
                      $store_image = imagepng($file,"./assets/images/barcode/{$barcode}.png");                     
                }
            $checkimage = "./assets/images/medicine/$image->product_image";                 
                if(!empty($image->product_image)){
            	unlink($checkimage);
				}
            $image_data =   $this->upload->data();
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              //'create_thumb'    => TRUE,    
              'maintain_ratio'  =>  TRUE,
              'width'           =>  160,
              'height'          =>  100,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();                
                $path = $this->upload->data();
                $product_image = $path['file_name'];
                $udata = array();
                $udata = array(
                    'supplier_id' => $supplier_id,
                    'product_name' => $product_name,
                    'generic_name' => $generic_name,
                    'batch_no' => $barcode,
                    'strength' => $strength, 
                    'form' => $form,
                    'trade_price' => $trade_price,
                    'mrp' => $mrp,
                    'side_effect'=>$side_effect,
                    'product_image'=> $product_image,
                    'expire_date'=> $expire_date,
                    'favourite'=> $favourite,
                    'instock'=> $instock,
                    'short_stock'=> $shortstock
                );
                
                    $success = $this->medicine_model->Update_medicine_info($id,$udata);
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Updated";
                    $response['curl'] = base_url()."Medicine/View";
                    $this->output->set_output(json_encode($response));
                    /*redirect('medicine/View');*/
            }
        } else {
            $image = $this->medicine_model->GetMedicineValueById($id);
                if($image->batch_no != $barcode){
            $checkimage = "./assets/images/barcode/$image->batch_no.png";                 
            	unlink($checkimage);
		              //load library
        		      $this->load->library('zend');
        		      //load in folder Zend
        		      $this->zend->load('Zend/Barcode');
        		      //generate barcode
                      $barcode = $barcode;
        		      $file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode,'barHeight'=> 30), array());
                      $store_image = imagepng($file,"./assets/images/barcode/{$barcode}.png");                     
                }             
                $udata = array();
                $udata = array(
                    'supplier_id' => $supplier_id,
                    'product_name' => $product_name,
                    'generic_name' => $generic_name,
                    'batch_no' => $barcode,
                    'strength' => $strength,
                    'form' => $form,
                    'trade_price' => $trade_price,
                    'mrp' => $mrp,
                    'side_effect'=>$side_effect,
                    'expire_date'=> $expire_date,
                    'favourite'=> $favourite,
                    'instock'=> $instock,
                    'short_stock'=> $shortstock
                );
                $success = $this->medicine_model->Update_medicine_info($id,$udata);
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Update";
                    $response['curl'] = base_url()."Medicine/View";
                    $this->output->set_output(json_encode($response));  
            }
        }
    }

    //delete 
    public function Delete(){
       $id=$this->input->get('id');
       $data['medicine']=$this->medicine_model->DeleteMedicineID($id); 
       echo "Successfully Deleted";
       redirect(base_url().'medicine/view','refresh');
    }
    public function GetMedicineById(){ 
        if($this->session->userdata('user_login_access') != False) {
		$id= $this->input->get('id');
        $data= array();
		$data['mvalue'] = $this->medicine_model->GetMedicineValueById($id);
		echo json_encode($data);
        }
        else{
    		redirect(base_url() , 'refresh');
    	}        
    }

    public function GetBarcodeDom(){ 
        if($this->session->userdata('user_login_access') != False) {
		$mid= $this->input->get('id');
		$mvalue = $this->medicine_model->GetMedicineValueById($mid);
                $base = base_url();
		echo    "<div class='modal-body'>
                    <div id='printArr'>
                            <p class='text-center'>$mvalue->product_name($mvalue->strength)</p>
                            <p class='text-center'> $mvalue->form</p>
                            <img class='' src='$base/assets/images/barcode/$mvalue->batch_no.png' alt='Card image'>
                            <p class='strong'>EXP: $mvalue->expire_date</p>
                        </div>
                </div>";
        }
        else{
    		redirect(base_url() , 'refresh');
    	}        
    }
 

    public function Barcode(){ 
        if($this->session->userdata('user_login_access') != False) {
            $data['medicineList'] = $this->medicine_model->getAllMedicine();
            $this->load->view('backend/barcode',$data);
        }
        else{
    		redirect(base_url() , 'refresh');
    	}        
    }

}