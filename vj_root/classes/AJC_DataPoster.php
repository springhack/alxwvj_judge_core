<?php /**
        Author: SpringHack - springhack@live.cn
        Last modified: 2016-04-30 14:27:21
        Filename: AJC_DataPoster.php
        Description: Created by SpringHack using vim automatically.
**/ ?>
<?php

	class AJC_DataPoster {
		
		private $data = "";
		private $db = NULL;
		private $app = NULL;
		private $geter = NULL;
		private $info = NULL;
		private $pid = "";
		private $lang = "";
		private $user = "";
		private $pass = "";
		private $rid = "";
		private $language_table;
		
		public function AJC_DataPoster($user = "skvj01", $pass = "forskvj", $id = "1000", $lang = "0", $code = "", $cid = '0')
		{
			//MySQL
			$this->db = new MySQL();

			//language table
			$this->language_table = array(
					'1' => 'GCC',
					'2' => 'G++'
				);

			//Infomation
			$rid = uniqid();
			
			//Add record
			$ret = $this->db->value(array(
					'id' => $rid,
					'oid' => $_GET['id'],
					'tid' => $id,
					'rid' => '__',
					'user' => $_SESSION['user'],
					'time' => time(),
					'memory' => 'N/A',
					'long' => 'N/A',
					'lang' => $this->language_table[$lang],
					'result' => 'N/A',
					'oj' => 'AJC',
					'oj_u' => $user,
					'oj_p' => $pass,
					'code' => $code,
					'contest' => $cid
				))->insert("Record");
			$_SESSION['last_id'] = $rid;	
		}
		
		public function getData()
		{
			return $this->data;
		}
		
	}
	
?>
