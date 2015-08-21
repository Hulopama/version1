<?php
	class DB_Driver{
		private $__con;
		//--------Hàm để kết nối---------
		function connect(){
			if (!$this->__con){
				$this->__con = mysqli_connect('localhost','root','', 'banhang') or die ('Lỗi kết nối');
			//$this->__con = mysqli_connect('mysql.hostinger.vn','u347539839_kup','50278351', 'u347539839_kup') or die ('Lỗi kết nối');
				
				mysqli_query($this->__con, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");				

				
			}	
		}
		//--------Hàm để ngắt kết nối---------
		function dis_connect(){
			if($this->__con){
				mysqli_close($this->__con);			
   				 $this->__con = null; 
			}
		}
		//--------Hàm để truy vấn---------
		function query($sql){
			$this->connect();
			$query= mysqli_query($this->__con, $sql);		
			return $query;		
		}
		
		//--------Hàm để chèn đối tượng---------
		function insert($table, $data){
			$this->connect();
			$field_list = '';
			$value_list = '';
			foreach($data as $key=>$value){
				$field_list .=", $key";
				$value_list	.=",'" .mysqli_real_escape_string($this->__con,$value) . "'";
			}
			$sql= 'INSERT INTO '.$table .'(' . trim($field_list, ' ,') . ') VALUES ('. trim($value_list,','). ')';
			return mysqli_query($this->__con, $sql);
		}
		//--------Hàm để cập nhật---------
		function update($table, $data, $where)
		{
			// Kết nối
			$this->connect();
			$sql = '';
			// Lặp qua data
			foreach ($data as $key => $value){
				$sql .= "$key = '".mysql_escape_string($value)."',";
			}
		 
			// Vì sau vòng lặp biến $sql sẽ thừa một dấu , nên ta sẽ dùng hàm trim để xóa đi
			$sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
		 
			return mysqli_query($this->__con, $sql);
		}
		//--------Hàm để xóa---------
		function remove($table, $where){
			$this->connect();
			$sql="DELETE from $table WHERE $where";
			return mysqli_query($this->__con, $sql);
		}
		//--------Hàm để lấy danh sach---------
		function get_list($sql)
			{
				// Kết nối
				$this->connect();
			 
				$result = mysqli_query($this->__con, $sql);
			 
				if (!$result){
					die ('Câu truy vấn bị sai');
				}
			 
				return $result;
			}
		//--------Hàm để lấy chi tiết tin---------
		function get_row($sql)
    	{
        // Kết nối
        $this->connect();         
        $result = mysqli_query($this->__con, $sql);
 
        if (!$result){
            die ('Câu truy vấn bị sai');			
        } 
        $row = mysqli_fetch_assoc($result);
 
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
 
			if ($row){
				return $row;
			} 
        	return false;
    	}
		
	}
?>