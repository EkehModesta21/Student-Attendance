<?php
    class Main_db extends CI_Model{
        
        public function logon($dir,$username,$password) {
            $data = array(
                'username' => $username,
                'password' => $password
            );
            $query = $this->db->where($data);
            $query = $this->db->get($dir); 
           
            if ($query->num_rows() > 0) {
                $chk = $query->result();
                $session_data = array(
                    'activeUser' => $dir,
                    'userID' => $chk[0]->id
                );
                $this->session->set_userdata($session_data);
                return true;
            }else {
                return false;
            }
        }

        public function fetchAdminCourses(){
            return $this->db->get('courses')->result();
        }

        public function setAdminCourses($code,$title,$venue,$id){
            $data = array(
                'code' => $code,
                'title' => $title,
                'venue' => $venue
            );
            if($this->session->userdata('queryC') != ''){
                $this->db->where('id',$id);
                $query = $this->db->update('courses',$data);
                if ($query) {
                    return true;
                }else {
                    return false;
                }
            }else{
                $query = $this->db->insert('courses',$data);
                if ($query) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        public function setAdminlecturers($user,$pass,$name,$code,$id){
            $data = array(
                'username' => $user,
                'password' => $pass,
                'name' => $name,
                'courses' => $code
            );
            if($this->session->userdata('queryL') != ''){
                $this->db->where('id',$id);
                $query = $this->db->update('lecturer',$data);
                if ($query) {
                    return true;
                }else {
                    return false;
                }
            }else{
                $query = $this->db->insert('lecturer',$data);
                if ($query) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        public function setAdminStudents($user,$pass,$name,$fac,$dept,$level,$id){
            $data = array(
                'username' => $user,
                'password' => $pass,
                'name' => $name,
                'faculty' => $fac,
                'department' => $dept,
                'level' => $level
            );
            if($this->session->userdata('queryS') != ''){
                $this->db->where('id',$id);
               $query = $this->db->update('student',$data);
                if ($query) {
                    return true;
                }else {
                    return false;
                }
            }else{
                $query = $this->db->insert('student',$data);
                if ($query) {
                    return true;
                }else {
                    return false;
                }
            }
        }

        public function adminRemove($loc,$id){
            $this->db->where('id',$id);
            $query = $this->db->delete($loc);
            if ($query) {
                return true;
            }else {
                return false;
            }
        }

        public function adminEdit($loc,$id){
            $this->db->where('id',$id);
            $query = $this->db->get($loc)->result();
            if($loc == 'courses'){
                $this->session->set_userdata('queryC', $query);
            }else if($loc == 'lecturer'){
                $this->session->set_userdata('queryL', $query);
            }else if($loc == 'student'){
                $this->session->set_userdata('queryS', $query);
            }
            $this->session->set_userdata('queryID', $query[0]->id);
        }

        public function fetchAdminStudents(){
            return $this->db->get('student')->result();
        }

        public function fetchAdminLecturers(){
            return $this->db->get('lecturer')->result();
        }

        public function fetchCourses(){
            $this->db->where('id', $this->session->userdata('userID'));
            $chk = $this->db->get($this->session->userdata('activeUser'))->result();
            $chk1 = explode("," , $chk[0]->courses);
            for ($x = 1; $x <= count($chk1); $x++) {
                $this->db->where('id', $chk1[$x-1]);
                $chk2 = $this->db->get('courses')->result();
                $session_data = array(
                    'code'.$x => $chk2[0]->code,
                    'Ctitle'.$x => $chk2[0]->title,
                    'venue'.$x => $chk2[0]->venue
                );
                $this->session->set_userdata($session_data);
            }
            $this->session->set_userdata('num', count($chk1));
            return $chk;
        }

        public function fetchSTDhistory(){
            return $this->db->get('attendance')->result();
        }

        public function fetchSTDCourses(){
            return $this->db->get('courses')->result();
        }

        public function fetchHistory(){
            return $this->db->get('attendance')->result();
        }

        public function showPortal($code,$id){
            $this->db->where('lecturer_id', $id);
            $this->db->where('course', $code);
            return $this->db->get('attendance')->result();
        }

        public function fetchAttendance($code, $id){
            if($this->session->userdata('activeUser') == 'lecturer'){
                $this->db->where('course', $code);
                $chk99 = $this->db->get('attendance');
                if ($chk99->num_rows() != 0){
                    $chk00 = $chk99->result();
                    if ($chk00[0]->course != $code){
                        $this->db->where('code', $code);
                        $res = $this->db->get('courses')->result();
                        $con = array(
                            'date' => date("y-m-d"),
                            'time' => date("h:i:s"),
                            'course' => $code,
                            'venue' => $res[0]->venue,
                            'lecturer_id' => $id,
                            'students' => '',
                            'present' => '0',
                            'absent' => $this->db->get('student')->num_rows(),
                            'portal' => 'open'
                        );
                        $this->db->insert('attendance', $con);
                    }
                }else{
                    $this->db->where('code', $code);
                    $res = $this->db->get('courses')->result();
                    $con = array(
                        'date' => date("y-m-d"),
                        'time' => date("h:i:s"),
                        'course' => $code,
                        'venue' => $res[0]->venue,
                        'lecturer_id' => $id,
                        'students' => '',
                        'present' => '0',
                        'absent' => $this->db->get('student')->num_rows(),
                        'portal' => 'open'
                    );
                    $this->db->insert('attendance', $con);
                }
                $query = $this->db->where('lecturer_id', $id);
                $this->db->where('course', $code);
                $chk = $this->db->get('attendance')->result();
                if ($chk[0]->students != ''){
                    $chk1 = explode("," , $chk[0]->students);
                    for ($x = 1; $x <= count($chk1); $x++) {
                        $this->db->where('id', $chk1[$x-1]);
                        $chk2 = $this->db->get('student')->result();
                        $session_data = array(
                            'non' => 'no',
                            'id'.$x => $chk2[0]->id,
                            'username'.$x => $chk2[0]->username,
                            'name'.$x => $chk2[0]->name,
                            'faculty'.$x => $chk2[0]->faculty,
                            'department'.$x => $chk2[0]->department,
                            'level'.$x => $chk2[0]->level
                        );
                        $this->session->set_userdata($session_data);
                    }
                    
                    $this->session->set_userdata('num2', count($chk1));
                    $this->session->set_userdata('activeCourse', $chk[0]->course);
                    return true;
                }else{
                    $session_data = array(
                        'num2' => '1',
                        'non' => 'yes',
                        'id1' => '',
                        'username1' => '',
                        'name1' => '',
                        'faculty1' => '',
                        'department1' => '',
                        'level1' => ''
                    );
                    $this->session->set_userdata($session_data);
                    return true;
                }
            }else if($this->session->userdata('activeUser') == 'student'){
                $this->db->where('course', $code);
                $query = $this->db->get('attendance');
                $chk = $query->result();
                if ($chk[0]->students != ''){
                    $chk1 = explode("," , $chk[0]->students);
                    for ($x = 1; $x <= count($chk1); $x++) {
                        $this->db->where('id', $chk1[$x-1]);
                        $chk2 = $this->db->get('student')->result();
                        $session_data = array(
                            'non' => 'no',
                            'id'.$x => $chk2[0]->id,
                            'username'.$x => $chk2[0]->username,
                            'name'.$x => $chk2[0]->name,
                            'faculty'.$x => $chk2[0]->faculty,
                            'department'.$x => $chk2[0]->department,
                            'level'.$x => $chk2[0]->level
                        );
                        $this->session->set_userdata($session_data);
                    }
                
                    $this->session->set_userdata('num2', count($chk1));
                }else{
                    $session_data = array(
                        'num2' => '1',
                        'non' => 'yes',
                        'id1' => '',
                        'username1' => '',
                        'name1' => '',
                        'faculty1' => '',
                        'department1' => '',
                        'level1' => ''
                    );
                    $this->session->set_userdata($session_data);
                }
                $this->db->where('id', $id);
                return $this->db->get('student')->result();
            }
        }

        public function setPortal($portal,$code,$id){
            $this->db->where('lecturer_id', $id);
            $this->db->where('course', $code);
            $this->db->set('portal', $portal);
            $query = $this->db->update('attendance');
            if ($query) {
                return true;
            }else{
                return false;
            }
        }

        public function setSign($code){
            $this->db->where('course', $code);
            $query = $this->db->get('attendance')->result();
            if($query[0]->portal == 'open'){
                if ($query[0]->students != ''){
                    $chk = $query[0]->students.','.$this->session->userdata('userID');
                }else{
                    $chk = $this->session->userdata('userID');
                }
                $this->db->where('course', $code);
                $data = array(
                    'students' => $chk,
                    'present' => $query[0]->present + 1,
                    'absent' => $query[0]->absent - 1
                );
                $this->db->set($data);
                $query = $this->db->update('attendance');
                if ($query) {
                    return 1;
                }else{
                    return 2;
                }
            }else{
                return 3;
            }
        }

    //     public function chkResult($matNum,$year,$level,$semester){
    //         $data = array(
    //             'matNumber' => $matNum,
    //             'levels' => $level
    //         );
    //         $this->db->where($data);
    //         $chk = $year.'_'.$semester;
    //         $query = $this->db->get($chk);
    //         $chkResult = $query->result();
    //          if ($query->num_rows() > 0) {
                
    //             return true;
    //         }else{
    //             return false;
    //         }
    //     }

    //     public function fetchAdmin(){
    //         return $this->db->get('admin')->result();
    //     }
        
    //     public function fetchResult($matNum,$year,$level,$semester){
    //         $data = array(
    //             'matNumber' => $matNum,
    //             'levels' => $level
    //         );
    //         $this->db->where($data);
    //         $chk = $year.'_'.$semester;
    //         return $this->db->get($chk)->result();
    //     }

    //     public function adminLogin($username,$password){
    //     $data = array(
    //         'username' => $username,
    //         'password' => $password
    //     );
    //     $this->db->where($data);
    //     $query = $this->db->get('admin'); 
    //     if ($query->num_rows() > 0) {
    //         $query_run = $query->result();
    //         $session_data = array(
	// 			'adminID' => $query_run[0]->username,
    //             'portal' => $query_run[0]->portal
	// 			);
	// 			$this->session->set_userdata($session_data);
    //         return true;
    //     }else {
    //         return false;
    //     }
    // }

    // public function chkPortal($portal){
    //     $this->db->set('portal',$portal);
    //     $query = $this->db->update('admin');
    //     if ($query) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // public function uploadF($semester, $year, $col){
    //     $chk = $year.'_'.$semester;
    //     $query = $this->db->query("INSERT INTO $chk (id,matNumber,names,semester,levels,department,faculty,code,title,unit,n1,n2,n3,n4,n5,n6,CA,exam,bonus,total,grade) VALUES $col");
    //     if ($query) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }
}
?>