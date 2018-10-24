<?php
    include('user.php');
    class customer extends user 
    {
        private $point;
        private $socialAccount;
        public function getPoint(){
            return $this->point;
        }
        public function setPoint($point){
            $this->point=$point;
        }
        public function getSocialAccount(){
            return $this->socialAccount;
        }
        public function setSocialAccount($socialAccount){
            $this->socialAccount=$socialAccount;
        }

    }
?>