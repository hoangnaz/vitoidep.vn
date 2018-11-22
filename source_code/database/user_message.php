<?php
		 require_once $_SERVER['DOCUMENT_ROOT'].'/database/connect_database.php';
		 require_once $_SERVER['DOCUMENT_ROOT'].'/library/common.php';
		 require_once $_SERVER['DOCUMENT_ROOT'].'/library/const.php';
		 require_once $_SERVER['DOCUMENT_ROOT'].'/entities/message_user.php';
       
    class userMessageDB extends databaseConnect
    {
		const TABLE_NAME = 'message_user';
		const ID_USER = 'id_user_message';

        public function insertMessage($userMessage)
		{
			$pdo=parent::connectDatabase();
			$query="INSERT INTO message_user VALUES (?,?,?,?)";
			$paramQuery = array(
				'',
				$userMessage->getContentMessage(),
                $userMessage->getIdUserMassage(),
				getCurrentTime()
			);
			return insertUpadeRecord($pdo,$paramQuery,$query);	
		}
		public function getMessageFollowUser($userMessage)
		{
			$pdo=parent::connectDatabase();
			return getRecordFollowCondition($pdo,self::TABLE_NAME,self::ID_USER,$userMessage);	
		}
		
	}
	// $test= new userMessageDB();
	// print_r($test->getMessageFollowUser('CUS9027580'));
  

?>