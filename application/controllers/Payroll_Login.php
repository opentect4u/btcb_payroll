<?php

	class Payroll_Login extends CI_Controller{

		public function __construct(){
			parent::__construct();

			$this->load->model('Login_Process');
		}
		
		public function index(){

			if($_SERVER['REQUEST_METHOD']=="POST"){

				$user_id 	= $_POST['user_id'];

				$user_pw 	= $_POST['user_pwd'];

				$result  		= $this->Login_Process->f_select_password($user_id);

				if($result){

					$match	   = password_verify($user_pw,$result->password);

					if($match){

						$user_data = $this->Login_Process->f_get_particulars("md_users",Null,array("user_id"=>$user_id),1);

						if($user_data->user_status == 'A'){

							$loggedin['user_id']            = $user_data->user_id;
							$loggedin['password']           = $user_data->password;
							$loggedin['user_type']      	= $user_data->user_type;
							$loggedin['user_name']      	= $user_data->user_name;
							$loggedin['user_status']   		= $user_data->user_status;
							$loggedin['branch_id']   		= $user_data->branch_id;
							$loggedin['branch_name']   		= 'HO';
							$loggedin['ho_flag']            = 'Y';
							$loggedin['fin_id']  			= 1;
							$loggedin['fin_yr']   			= '2020-21';

							$this->session->set_userdata('loggedin',$loggedin);
			                //  Setting Id OF logged Person in System
							$id = $this->Login_Process->f_insert_audit_trail($user_id);
							$this->session->set_userdata('sl_no',$id);
							//  End
					
							redirect('Payroll_Login/main');
						}
						else{

							$this->session->set_flashdata('login_error', 'User is inactive!');
							redirect('Payroll_Login/login');
						}

					}
					else{

						$this->session->set_flashdata('login_error', 'Invalid password!');
						redirect('Payroll_Login/login');
					}

				}
				else{

					$this->session->set_flashdata('login_error', 'Invalid user id!');
					redirect('Payroll_Login/login');
				}

			}else{
			
			 redirect('Payroll_Login/login');

			}

		}			

		public function login(){

			if($this->session->userdata('loggedin')){

				redirect('Payroll_Login/main');

			}else{

				$this->load->view('login/login');
			}
		}

		public function main(){

			if($this->session->userdata('loggedin')){

				$_SESSION['sys_date']= date('Y-m-d');

				$_SESSION['module']  = 'P';

				$fin_id = 1;  

				$fin_yr = '2020-21';

				$branch_id = 342;

				/*$first_month_day = date("Y-m-01", strtotime($_SESSION['sys_date']));

				$last_month_day  = date("Y-m-t", strtotime($_SESSION['sys_date']));
				
				$from_fin_yr = substr($fin_yr,0,4);

				$to_fin_yr   = ($from_fin_yr + 1);
				
				$from_yr_day = date('Y-m-d',strtotime($from_fin_yr.'-04-01'));

				$to_yr_day 	 = date('Y-m-d',strtotime($to_fin_yr.'-03-31'));*/
 
				$this->load->view('post_login/payroll_main');

				$this->load->view('post_login/home');

				$this->load->view('post_login/footer');

			}
			else{

				redirect('User_Login/login');

			}
			
		}	

        public function check_user(){
			$user_id=$this->input->post("user_id");
			$user_data = $this->Login_Process->f_get_user_inf($user_id);
			if($user_data){
				echo 1;
			}else{
				echo 0;
			}
		}

		public function logout(){

			if($this->session->userdata('loggedin')){

				$user_id    =   $this->session->userdata['loggedin']['user_id'];
				
				$this->Login_Process->f_update_audit_trail($user_id);

				$this->session->unset_userdata('loggedin');
				
				redirect('Payroll_Login/login');

			}else{

				redirect('Payroll_Login/login');

			}
		}
	}
?>
