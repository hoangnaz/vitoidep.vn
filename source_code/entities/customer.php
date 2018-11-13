<?php
    include('user.php');
    class customer extends user 
    {
        private $point;
        private $socialAccount;
        private $avatar;
        public function getPoint(){
            return $this->point;
        }
        public function setPoint($point){
            $this->point=$point;
        }
        public function getAvatar(){
            return $this->avatar;
        }
        public function setAvater($avatar){
            $this->avatar=$avatar;
        }
        public function getSocialAccount(){
            return $this->socialAccount;
        }
        public function setSocialAccount($socialAccount){
            $this->socialAccount=$socialAccount;
        }

        public function __construct($id, $fullname,$account,$password,  $email, $phoneNumber, $sex,$DOB,$address,$point,$socialAccount,$avatar){
            parent::__construct($id, $fullname,$account,$password,  $email, $phoneNumber, $sex,$DOB,$address);
            $this->point=$point;
            $this->avatar=$avatar;
            $this->socialAccount=$socialAccount;
        }


    }
?>