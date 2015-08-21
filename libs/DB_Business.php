<?php 
	require_once("DB_Driver.php");	
	class DB_Business extends DB_Driver{
		protected $_table_name='';
		protected $_key ='';
		function __construct() {
        	parent::connect();
    	}
		function __destruct(){
			parent::dis_connect();
		}
		function delete_by_id($table, $id){
			return $this->remove($this->_table_name, $this->_key.'='.(int)$id);
		}
		function add_new($data){
			return parent::insert($this->_table_name, $data);
		}
		function update_by_id($data,$id){
			return $this->update($this->_table_name, $data, $this->_key .'='.(int)$id);
		}
		function select_by_id($select, $id){
			$sql = "select $select from ".$this->_table_name." where ".$this->_key." = ".$id;
			return $this->get_row($sql);
   		 }
		 function select_list_by_id($select, $id){
			$sql = "select $select from ".$this->_table_name." where ".$this->_key." = ".(int)$id;
			return $this->get_list($sql);
   		 }
		  function select_list_not_in_id($select, $id){
			$sql = "select $select from ".$this->_table_name." where ".$this->_key." != ".(int)$id;
			return $this->get_list($sql);
   		 }
		 function check_by_key($data, $key){
			$sql="select * FROM ".$this->_table_name." where $key in ('". $data."')";
			$re=$this->get_row($sql);
			if(count($re)==0)
				return 0;
			else {
				return $re;
			}
		}
		function get_by_key($data, $key){
			$sql="select * FROM ".$this->_table_name." where $key in ('". $data."')";
			$re=$this->get_list($sql);
			if(count($re)==0)
				return 0;
			else {
				return $re;
			}
		}
		function set_table_name($name){
			$this->_table_name=$name;
		}
		function select_all($select){
			$sql = "select $select from ".$this->_table_name;
			return $this->get_list($sql);
   		 }
		 
	}	
		
?>