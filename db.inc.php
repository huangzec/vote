<?php
//功能：数据库的基础操作类
class DBSQL{

	private $CONN="";//定义数据库变量
	//功能：初始化构造函数，连接数据库
	public function __construct(){
		//捕获连接错误并显示错误文件
			$conn=mysql_connect(ServerName,UserName,Password);
			if($conn) {
				mysql_select_db(DBName,$conn);
				$this->CONN = $conn;
			} else {
				echo '<script>alert("error");</script>';
			}
		}
		
	
	//功能：数据库查询函数
	//参数：$sqlSQL语句
	//返回：二维数组或Flase
	public function select($sql="")
	{//如果SQL语句为空则返回false
		if (empty($sql)) return flase;//如果连接为空则返回false
		if (empty($this->CONN)) return flase;//捕获数据库选择错误并显示错误文件
		try {
			$results=mysql_query($sql,$this->CONN);
		} catch (Exception $e) {
			$msg=$e;
		}
			if (!$results or (empty($results))){//如果查询结果为空则释放结果并返回false
		    @mysql_free_result($results);

			return false;
			}
			$count=0;
			$data=array();
			while ($row=@mysql_fetch_array($results)){//把查询的结果重组成一个二维数组
				$data[$count]=$row;
				$count++;
			}
			@mysql_free_result($results);
			return $data;
		
		//功能：数据插入函数
		//参数：$sql SQL语句
		//返回：0或新插入数据的ID
	}
	public function insert ($sql=""){//如果SQL语句为空则返回false

		if(empty($sql))return 0;//如果连接为空则返回false
		if(empty ($this->CONN))return 0;//捕获数据库选择错误并显示错误文件
		try{
			$results=mysql_query($sql,$this->CONN);
		}
		catch(Exception $e){
			$msg=$e;
		}//如果插入失败就返回0，否则返回当前插入数据ID
		if(!$results)
			return 0;
		else 
			return @mysql_insert_id($this->CONN);
	}

	    
	     //功能：数据更新函数
	     //参数：$sql SQL语句
	     //返回：TRUE OR FALSE

	   public function update($sql=""){
	   	  if (empty($sql)) return false;//如果SQL语句为空则返回false
	   	  if (empty($this->CONN)) return false;//如果连接为空则返回false
	   	  try{//捕获数据库选择错误并显示错误文件
	   	  	$reult=mysql_query($sql,$this->CONN);
	   	  }catch(Exception $e){
	   	  	$msg=$e;
	   	  	include(ERRFILE);
	   	  }
	   	  return $reult;

	   	  }
	   	  
	//功能：数据删除函数
	//参数：$sql SQL语句
	//返回：TRUE OR FALSE
	   	  public function delete($sql=""){
	   	  	if (empty($sql))return false;//如果SQL语句为空则返回false
	   	  	if(empty($this->CONN))return false;//如果连接为空则返回false
	   	  	try {
	   	  	 	$reult=mysqL_query($sql,$this->CONN);
	   	  	 } catch (Exception $e) {
	   	  	 	$msg=$e;
	   	  	 	include(ERRFILE);
	   	  	 } 
	   	  return $results;
	   	  }
	 //功能：定义事物
	 public function begintransaction()
	 {
	 	mysqL_query("SET AUTOCOMMIT=0");//设置为不自动提交，因为MySQL默认立即执行
	 	mysql_query("BEGIN");//开始事务定义
	 }   	  
	//功能回滚
	 public function rollback()
	 {
	 	mysql_query("ROOLBACK");
	 }
	//功能：提交执行
	 public function commit()
	 {
	 	mysql_query(COMMIT);

	 }
}



?>
