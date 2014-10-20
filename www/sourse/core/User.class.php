<?php

    class User {
        private $name;
        private $email;
        private $password;
        private $birthday;
        private $phone;
        private $info;
        private $status;


        public function __construct($email, $pass, $status, $name=null, $birthday=null, $phone=null, $info=null) {
            $this->setEmail($email);
            $this->setPassword($pass);
            $this->setStatus($status);
            $this->setName($name);
            $this->setBirthday($birthday);
            $this->setPhone($phone);
            $this->setInfo($info);
        }

        public function setName($name) {
            $this->name = $name;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setPassword($pass) {
            $this->password = $pass;
        }
        public function setBirthday($birthday) {
            $this->birthday = $birthday;
        }
        public function setPhone($phone) {
            $this->phone = $phone;
        }
        public function setInfo($info) {
            $this->info = $info;
        }
        public function setStatus($status) {
            $this->status = $status;
        }

        public function getName() {
            return $this->name;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getBirthday() {
            return $this->birthday;
        }
        public function getPhone() {
            return $this->phone;
        }
        public function getInfo() {
            return $this->info;
        }
        public function getStatus() {
            return $this->status;
        }

    }