<?php
require_once('db.inc.php');
class Vote extends DBSQL 
{
	public $_name='EM_VOTE_INFO';//定义调查表名称变量
	public $_item='EE_ITEM_INFO';//定义调查选项表名称变量
	public $_user='EE_VOTE_USER';//定义用户信息表名称变量
	public $_pagesize=10;//定义每页提取记录数
	public $_type=array("1"=>"单选","2"=>"多选");//定义选项类型
	public $_display=array("0"=>"禁用","1"=>"启用");//定义调查启用显示
	private function _construct()
	{
		parent::_construct();
	}
	//功能：提取调查组
	//返回：数组
	public function getVoteList(){

		$sql="SELECT * FROM".$this->_name;
		return $this->select($sql);
	}
	//功能：向指定表的指定ID的记录
	//参数：$id表ID，$name 表名称
	//返回：数组
	public function getlnfo($id,$name)
	{
		$sql="SELECT * FROM".$name."WHERE F_ID=" .$id;
		$r=$this->select($sql);
		return $r[0];
	}
	//功能：向指定表中插入数据
	//参数：$name 表名称，$data数组（格式：$data[‘字段名’]=值）
	//返回：插入记录ID
	public function insertdate($name,$data)
	{
		$field=implode(',', array_keys($data));//定义SQL语句的字段部分
		foreach ($data as $key => $val)//组合SQL语句的值部分
		 {
			$value.="".$val."";//判断是否到数组的最后一个值
			if($key<count($data)-1)
				$value.=",";
		}
		$sql="INSER INTO".$name."(".$file.")VALUES(".$value.")";
		return $this->insert($sql);
	}
//功能：更新指定表指定ID的调查表记录
	//参数：$name表名称，$data数组（格式：$data['字段名']=值）
	        //返回：插入记录ID
public function insertData($name,$data)
{
	$field=implode(',',array_keys($data));
	foreach($data as $key=>$val)
	{
		$value.="".$val."";
		if($key<count($data)-1)//判断是否到数组的最后一个值
			$value.=",";

	}
	$sql="INSER INTO".$name."(".$field.")VALUES(".$value.")";
	return $this->insert($sql);
}
//功能：更新指定表指定ID的调查表记录
//参数：$name表名称，$id表ID,$data数组（格式：$data['字段名']=值
//返回：TRUE OF FALSE

public function updataData($name,$id,$data)
{
	$col=array();
	foreach($data as $key=>$value)
	{
		$col[]=$key."=".$value."";
	}
	$sql="UPDATA".$name."SET".implode(',',$col)."WHEREF_ID=$id";
	return $this->updata($sql);

}
public function delData($id){
	$this->begintransaction();
	try {
		$sql="DELETE FROM".$this->_item."WHERE F_ID_VOTE_INFO=".$id;
		$this->delete($sql);
        $sql="DELETE FROM".$this->user."WHERE F_ID_VOTE_INFO=".$id;
        $this->delete($sql);
        $sql="DELETE FROM".$this->name."WHERE F_ID=".$id;
        $this->delete($sql);
	} catch (Exception $e) {
        $this->rollback();
        return false;
		
	}
	$this->commit();
	return true;
}
//功能：提取指定调查ID的选项
//参数：$vote_id 调查ID
//返回：TRUE OR FALSE
public function delUserData($id)
{
	$sql="DELETE FROM".$this->_user."WHEREF _ID=" . $id;
	return $this->delete($sql);
}
}
?>
