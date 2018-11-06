<?php
    include('user.php');
    class customer extends user 
    {
        private $staffRole;
        private $status;
        public function getStaffRole(){
            return $this->staffRole;
        }
        public function setStaffRole($staffRole){
            $this->staffRole=$staffRole;
        }
        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status=$status;
        }

        public function __construct($id, $fullname,$account,$password,  $email, $phoneNumber, $sex,$DOB,$address,$staffRole,$status){
            parent::__construct($id, $fullname,$account,$password,  $email, $phoneNumber, $sex,$DOB,$address);
            $this->status=$status;
            $this->staffRole=$staffRole;
        }


    }
?>