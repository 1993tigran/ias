<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 16/09/15
 * Time: 16:00
 */

namespace App\Services;


interface ApiServiceContract
{
        public function registerUser($request);

        public function login($request);

        public function checkLogin();

        public function logout($request);

        public function updateUser($request);

        public function getNews();

        public function saveIssue($request);

        public function sendMessage($request);

        public function getMessages($request);

        public function getTips();

        public function readMessage($messageId);

        public function readThread($request);

        public function getClasses();

        public function getStudentList();

}
