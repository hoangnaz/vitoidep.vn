<?php

     require_once $_SERVER['DOCUMENT_ROOT'].'/database/user_message.php';
     require_once $_SERVER['DOCUMENT_ROOT'].'/entities/message_user.php';
     class userMassageBL{
         function massageUser($user,$content){
            $userDB=new userMessageDB();
            $userData=new messageUser();
            $userData->setContentMessage($content);
            $userData->setIdUserMassage($user);
            return   $userDB->insertMessage($userData);
        }
        function getMassageUser($userID){
            $userDB=new userMessageDB();
            return   $userDB->getMessageFollowUser($userID);
        }
     }

?>  