<?php

class db {
	private $mysql_host = "";
	private $mysql_user = "";
	private $mysql_password = "";
	private $mysql_database = "";
	private $mysql_connection = null;

	public function __construct($source, $email, $client, $platform){
		if((is_string($source) && !empty($source)) && (is_string($email) && !empty($email)) && (is_string($client) && !empty($client)) && (is_string($platform) && !empty($platform))){
			if($this->connect()){
				if(!$this->insert($source, $email, $client, $platform)){
					file_put_contents("./database-log", $this->mysql_connection->errno." ~ ".$this->mysql_connection->error."\r\n", FILE_APPEND);
				}
				$this->disconnect();
			}
		}
	}

	private function connect(){
		$this->mysql_connection = new mysqli($this->mysql_host, $this->mysql_user, $this->mysql_password, $this->mysql_database);
		if($this->mysql_connection->connect_error){
			file_put_contents("./database-log", $this->mysql_connection->connect_errno." ~ ".$this->mysql_connection->connect_error."\r\n", FILE_APPEND);
			return false;
		} else {
			$this->table();
			return true;
		}
	}

	private function disconnect(){
		$this->mysql_connection->close();
		$this->mysql_connection = null;
	}

	private function insert($source, $email, $client, $platform){
		$qry = "INSERT INTO `email_tracking` (`source`, `email`, `client`, `platform`) VALUES ("
			."'".$source."', "
			."'".$email."', "
			."'".$client."', "
			."'".$platform."'"
			.");";
		echo "<pre>" . print_r($qry, true) . "</pre>";
		return $this->mysql_connection->query($qry);
	}

	private function table(){
		$result = $this->mysql_connection->query("SHOW TABLES LIKE 'email_tracking'");
		if($result->num_rows <= 0){
			$qry = "CREATE TABLE IF NOT EXISTS `email_tracking` ("
				."  `ID` int(10) NOT NULL AUTO_INCREMENT,"
				."  `source` varchar(50) NOT NULL,"
				."  `email` varchar(50) NOT NULL,"
				."  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,"
				."  `client` varchar(50) DEFAULT NULL,"
				."  `platform` varchar(50) DEFAULT NULL,"
				."  PRIMARY KEY (`ID`)"
				.") ENGINE=InnoDB DEFAULT CHARSET=latin1;";
			$this->mysql_connection->query($qry);
		}
	}
}

?>