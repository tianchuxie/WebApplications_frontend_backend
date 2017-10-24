<?php

    class databaseMysql {
        public $db;
		public $host;
        public $user;
        public $password;
        public $database;
        public $table;
		
		public function __construct($p_host, $p_user, $p_password, $p_database, $p_table) {
            $this->host = $p_host;
            $this->user = $p_user;
            $this->password = $p_password;
            $this->database = $p_database;
            $this->table = $p_table;
            
            $this->db = new mysqli($this->host, $this->user, $this->password, $this->database);
            if ($this->db->connect_error) {
                die($this->db->connect_error);
            }
        }
		
        public function __destruct() {
            $this->db->close();
            
        }
        
	}
?>