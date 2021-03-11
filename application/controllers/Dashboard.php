<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
		session_destroy();
		//$data['active1'] = 'active';
		$data['msg'] = $this->session->flashdata('msg');
		$this->load->view('index', $data);
	}

	public function loginProcess(){
		$this->load->model('Main_db');
		
		$dir = $this->input->post('dir');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$logon = $this->Main_db->logon($dir,$username,$password);
		if ($logon) {
			if ($this->session->userdata('activeUser') != 'admin'){
			redirect(base_url().'home/loadDashboard');
			}else{
				redirect(base_url().'home/loadAdmin');
			}
		}else {
			$this->session->set_flashdata('msg','Sorry, wrong details...<br>');
	 		redirect(base_url().'home/index');
		}
	}
	public function loadAdmin(){
		$this->load->model('Main_db');
		
		$data['title'] = $this->session->userdata('activeUser');
		$data['titleHeader'] = 'Dashboard';
		$data['userID'] = $this->session->userdata('userID');
		$data['msg'] = $this->session->flashdata('msg');
		$data['adminCourses'] = $this->Main_db->fetchAdminCourses();
		$data['adminStudents'] = $this->Main_db->fetchAdminStudents();
		$data['adminLecturers'] = $this->Main_db->fetchAdminLecturers();
		$data['queryC'] = $this->session->userdata('queryC');
		$data['queryL'] = $this->session->userdata('queryL');
		$data['queryS'] = $this->session->userdata('queryS');

		$this->load->view('admin', $data);
	}
	public function adminAddCourse(){
		$this->load->model('Main_db');

		$code = $this->input->post('code');
		$title = $this->input->post('title');
		$venue = $this->input->post('venue');
		$query = $this->Main_db->setAdminCourses($code,$title,$venue,$this->session->userdata('queryID'));
		if ($query) {
			$this->session->set_flashdata('msg','Successfully added...<br>');
			if($this->session->userdata('queryC') != ''){
				$this->session->unset_userdata('queryC');
			};
			redirect(base_url().'home/loadAdmin');
		}else {
			$this->session->set_flashdata('msg','Sorry, unable to add data...<br>');
				redirect(base_url().'home/loadAdmin');
		}
	}
	public function adminAddLecturer(){
		$this->load->model('Main_db');

		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$name = $this->input->post('name');
		$code = $this->input->post('code');
		$query = $this->Main_db->setAdminLecturers($user,$pass,$name,$code,$this->session->userdata('queryID'));
		if ($query) {
			$this->session->set_flashdata('msg','Successfully added...<br>');
			if($this->session->userdata('queryL') != ''){
				$this->session->unset_userdata('queryL');
			};
				redirect(base_url().'home/loadAdmin');
		}else {
			$this->session->set_flashdata('msg','Sorry, unable to add data...<br>');
				redirect(base_url().'home/loadAdmin');
		}
	}
	public function adminAddStudents(){
		$this->load->model('Main_db');

		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$name = $this->input->post('name');
		$fac = $this->input->post('fac');
		$dept = $this->input->post('dept');
		$level = $this->input->post('level');
		$query = $this->Main_db->setAdminStudents($user,$pass,$name,$fac,$dept,$level,$this->session->userdata('queryID'));
		if ($query) {
			$this->session->set_flashdata('msg','Successfully added...<br>');
			if($this->session->userdata('queryS') != ''){
				$this->session->unset_userdata('queryS');
			};
				redirect(base_url().'home/loadAdmin');
		}else {
			$this->session->set_flashdata('msg','Sorry, unable to add data...<br>');
				redirect(base_url().'home/loadAdmin');
		}
	}
	public function adminRemove(){
		$this->load->model('Main_db');

		$query = $this->Main_db->adminRemove($this->uri->segment('3'),$this->uri->segment('4'));
		if ($query) {
			$this->session->set_flashdata('msg','Successfully removed...<br>');
				redirect(base_url().'home/loadAdmin');
		}else {
			$this->session->set_flashdata('msg','Sorry, unable to remove data...<br>');
				redirect(base_url().'home/loadAdmin');
		}
	}
	public function adminEdit(){
		$this->load->model('Main_db');

		$this->Main_db->adminEdit($this->uri->segment('3'),$this->uri->segment('4'));
		$this->session->set_flashdata('msg','Please make the following changes on the boxes...<br>');
		redirect(base_url().'home/loadAdmin');
	}
	public function loadDashboard(){
		$this->load->model('Main_db');
		
		$data['active1'] = 'active';
		$data['title'] = $this->session->userdata('activeUser');
		$data['titleHeader'] = 'Dashboard';
		$data['userID'] = $this->session->userdata('userID');
		$data['msg'] = $this->session->flashdata('msg');
		if ($this->session->userdata('activeUser') == 'lecturer'){
			//-------for assigne courses ----------
			$query = $this->Main_db->fetchCourses();
			if ($query) {
				for($x = 1; $x <= $this->session->userdata('num'); $x++){
					$data['num'] = $this->session->userdata('num');
					$code['code'][$x] = $this->session->userdata('code'.$x);
					$Ctitle['Ctitle'][$x] = $this->session->userdata('Ctitle'.$x);
					$venue['venue'][$x] = $this->session->userdata('venue'.$x);
				}
				$data['code'] = $code['code'];
				$data['Ctitle'] = $Ctitle['Ctitle'];
				$data['venue'] = $venue['venue'];
				$data['lect'] = $this->session->userdata('userID');
			}else{
				$this->session->set_flashdata('msg','Sorry, unable to get details...<br>');
				redirect(base_url().'home/index');
			}
		}else{
			$data['STDcourses'] = $this->Main_db->fetchSTDCourses();
			$data['STDhistory'] = $this->Main_db->fetchSTDhistory();
		}
		//-------for attendance history ----------
		$data['history'] = $this->Main_db->fetchHistory();
		$data['showPortal'] = $this->Main_db->showPortal($this->session->userdata('activeCourse'),$this->session->userdata('userID'));
		$data['activeCourse'] = $this->session->userdata('activeCourse');
		$this->load->view('dashboard', $data);
	} 
	public function attendance(){
		$this->load->model('Main_db');

		$data['active2'] = 'active';
		$data['title'] = $this->session->userdata('activeUser');
		$data['titleHeader'] = 'Attendance';
		$data['userID'] = $this->session->userdata('userID');
		$data['msg'] = $this->session->flashdata('msg');
		$chk = explode("-", $this->uri->segment('3'));
		$query = $this->Main_db->fetchAttendance($chk[0], $chk[1]);
		if ($query) {
			$data['showPortal'] = $this->Main_db->showPortal($chk[0],$chk[1]);
			$this->session->set_userdata('activeCourse', $chk[0]);
			$data['showActiveCourse'] = $chk[0];
			for($x = 1; $x <= $this->session->userdata('num2'); $x++){
				$id['id'][$x] = $this->session->userdata('id'.$x);
				if($this->session->userdata('id'.$x) == $this->session->userdata('userID')){
					$this->session->set_userdata('captured', $this->session->userdata('activeCourse'));
				}else{
					$this->session->set_userdata('captured', '');
				}
				$name['name'][$x] = $this->session->userdata('name'.$x);
				$username['username'][$x] = $this->session->userdata('username'.$x);
				$faculty['faculty'][$x] = $this->session->userdata('faculty'.$x);
				$department['department'][$x] = $this->session->userdata('department'.$x);
				$level['level'][$x] = $this->session->userdata('level'.$x);
			}
			$data['non'] = $this->session->userdata('non');
			$data['STD'] = $query;
			$data['captured'] = $this->session->userdata('captured');
			$data['num2'] = $this->session->userdata('num2');
			$data['id'] = $id['id'];
			$data['name'] = $name['name'];
			$data['username'] = $username['username'];
			$data['faculty'] = $faculty['faculty'];
			$data['department'] = $department['department'];
			$data['level'] = $level['level'];	
			if($this->session->userdata('activeUser') == 'lecturer'){
				$this->session->set_flashdata('msg','Attendance activated successfully...<br>');
			}
		}else{
			$this->session->set_flashdata('msg','Sorry unable to retrieve attendance for the course...<br>');
			redirect(base_url().'home/loadDashboard');
		}
		
		$this->load->view('attendance', $data);
	}
	public function attendancePortal(){
		$this->load->model('Main_db');

		$portal = $this->input->post('portal');
		if($this->Main_db->setPortal($portal,$this->session->userdata('activeCourse'),$this->session->userdata('userID'))){
			$this->session->set_flashdata('msg','Successfully updated...<br>');
			redirect(base_url().'home/attendance/'.$this->session->userdata('activeCourse').'-'.$this->session->userdata('userID'));
		}else{
			$this->session->set_flashdata('msg','update error...<br>');
			redirect(base_url().'home/attendance/'.$this->session->userdata('activeCourse').'-'.$this->session->userdata('userID'));
		}	
	}
	public function attendanceSign(){
		$this->load->model('Main_db');
		$chk = $this->Main_db->setSign($this->session->userdata('activeCourse'));
		if($chk == '1'){
			$this->session->set_flashdata('msg','Successfully captured...<br>');
			redirect(base_url().'home/attendance/'.$this->session->userdata('activeCourse').'-'.$this->session->userdata('userID'));
		}else if($chk == '2'){
			$this->session->set_flashdata('msg','capture error...<br>');
			redirect(base_url().'home/attendance/'.$this->session->userdata('activeCourse').'-'.$this->session->userdata('userID'));
		}else if($chk == '3'){
			$this->session->set_flashdata('msg','Sorry attendance is closed...<br>');
			redirect(base_url().'home/attendance/'.$this->session->userdata('activeCourse').'-'.$this->session->userdata('userID'));
		}	
	}
	// public function resultProcess(){
	// 	$this->load->model('Main_db');

	// 	$data['fetchRes'] = $this->Main_db->fetchResult($this->session->userdata('matNum'),$this->session->userdata('year'),$this->session->userdata('level'),$this->session->userdata('semester'));
	// 	$data['msg'] = $this->session->flashdata('msg');
	// 	$this->load->view('result', $data);
	// }
	
	// public function checkProcess(){
	// 	$this->load->model('Main_db');
		
	// 	$matNum = $this->input->post('matNum');
	// 	$year = $this->input->post('year');
	// 	$level = $this->input->post('level');
	// 	$semester = $this->input->post('semester');

	// 	$chkRes = $this->Main_db->chkResult($matNum,$year,$level,$semester);
	// 	if ($chkRes) {	
	// 		$session_data = array(
	// 			'matNum' => $matNum,
	// 			'year' => $year,
	// 			'level' => $level,
	// 			'semester' => $semester
	// 		);
	// 		$this->session->set_userdata($session_data);
	// 		redirect(base_url().'home/resultProcess');
	// 	}else{
	// 		$this->session->set_flashdata('msg','Sorry, your result is not yet available...<br>');
	// 		redirect(base_url().'home/index');
	// 	}
	// }

	// public function login(){
	// 	session_destroy();
	// 	$data['active2'] = 'active';
	// 	$data['msg'] = $this->session->flashdata('msg');
	// 	$this->load->view('login', $data);
	// } 

	// public function admin(){
	// 	$this->load->model('Main_db');
	// 	if ($this->session->userdata('adminID') != '') {
	// 		$data['active2'] = 'active';
	// 		$fetchAdmin = $this->Main_db->fetchAdmin();
	// 		$data['msg'] = $this->session->flashdata('msg');
	// 		$data['portal'] = $fetchAdmin[0]->portal;
    //     	$this->load->view('admin', $data);
	// 	}else {
	// 		redirect(base_url().'home/login');
	// 	}
	// } 

	// public function adminLoginProcess(){
	// 	$this->load->model('Main_db');
		
	// 	//---------verifying voters-------------
	// 	$this->load->library('form_validation');
	// 	$cofig = array(
	// 		array(
	// 			'field' => 'username',
    //             'label' => 'Username',
    //             'rules' => 'htmlentities|required|min_length[4]'
	// 		),
	// 		array(
	// 			'field' => 'password',
    //             'label' => 'Password',
    //             'rules' => 'htmlentities|required|min_length[4]|alpha'
	// 		)
	// 	);
	// 	$this->form_validation->set_rules($cofig);
	// 	if ($this->form_validation->run()){
	// 		$username = $this->input->post('username');
	// 		$password = $this->input->post('password');

	// 		$chkAdmin = $this->Main_db->adminLogin($username,$password);
	// 		if ($chkAdmin) {
	// 			if ($this->session->userdata('adminID') != '') {
	// 				redirect(base_url().'home/admin');
	// 			}else{
	// 				$this->session->set_flashdata('msg','Sorry, check admin session query...<br>');
	// 				redirect(base_url().'home/login');
	// 			}
	// 		}else{
	// 			$this->session->set_flashdata('msg','Sorry, you dont have admin privillage...<br>');
	// 			redirect(base_url().'home/login');
	// 		}
	// 	}else {
	// 		$this->session->set_flashdata('msg','Error Detected, Pls confirm details...<br>');
	// 		redirect(base_url().'home/login');
	// 	}
	// }

	// public function adminPortal(){
	// 	$this->load->model('Main_db');
	// 	$portal = $this->input->post('portal');

	// 	$chkPortal = $this->Main_db->chkPortal($portal);
	// 	if ($chkPortal) {		
	// 		$this->session->set_flashdata('msg','Portal updated successfully...');
	// 		redirect(base_url().'home/admin');
	// 	}else{
	// 		$this->session->set_flashdata('msg','Sorry, portal update not succefull...<br>');
	// 		redirect(base_url().'home/admin');
	// 	}
	// }

	// public function uploadProcessing(){
	// 	$this->load->model('Main_db');

	// 	$year = $this->input->post('year');
	// 	$level = $this->input->post('level');
	// 	$semester = $this->input->post('semester');

	// 	$file = addslashes($_FILES['Ufile']['name']);
	// 	$fileType = addslashes($_FILES['Ufile']['type']);
	// 	$fileExt = strtolower(substr($file, strpos($file, '.') + 1));
	// 	if ($fileType === 'application/vnd.ms-excel' && $fileExt === 'csv') {
	// 		$fileToUpload = fopen(base_url().'dist/upload/'.$file, 'r');
	// 		$cols = array();
	// 		$index = 0;
	// 		while(!feof($fileToUpload)){
	// 			$file_open = fgetcsv($fileToUpload, 1024);
	// 			$cols[$index] = "('','{$file_open[0]}', '{$file_open[1]}', '{$file_open[2]}', '{$file_open[3]}', '{$file_open[4]}', '{$file_open[5]}', '{$file_open[6]}', '{$file_open[7]}', '{$file_open[8]}', '{$file_open[9]}', '{$file_open[10]}', '{$file_open[11]}', '{$file_open[12]}', '{$file_open[13]}', '{$file_open[14]}', '{$file_open[15]}', '{$file_open[16]}', '{$file_open[17]}', '{$file_open[18]}', '{$file_open[19]}')";
	// 			$index++;
	// 		}
	// 		$col = implode(',', $cols);
	// 		try{
	// 			$uploadF = $this->Main_db->uploadF($semester, $year, $col);
	// 			if ($uploadF) {
	// 					$this->session->set_flashdata('msg','Successfully uploaded...<br>');
	//  					redirect(base_url().'home/admin');
	// 			}else {
	// 				$this->session->set_flashdata('msg','uploaded error...<br>');
	//  				redirect(base_url().'home/admin');
	// 			}
	// 		}catch(PDOException $ex){
	// 			echo '<div class = "errorMsg wow-slide"><i class = "fa fa-warning"></i><p>Sorry the File is not in the correct </p><i class = "fa fa-close"></i></div>';
	// 		}
	// 	}else{
	// 		echo '<div class = "errorMsg wow-slide"><i class = "fa fa-warning"></i><p>Sorry File must be in ".CSV" format</p><i class = "fa fa-close"></i></div>';
	// 	}
	// }

	public function logout(){
		session_destroy();
		redirect(base_url().'home/index');
	}
}
?>