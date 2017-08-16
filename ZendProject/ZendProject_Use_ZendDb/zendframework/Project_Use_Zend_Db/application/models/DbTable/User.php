<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';
    public function getUserAll(){
        $row = $this->fetchAll();
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray(); 
    }
    public function editUser($id){
        $row=$this->fetchRow("id=".$id);
        return $row->toArray();        
    }
    public function updateUser($data,$user_id){
       $where="id='$user_id'";
        $this->update($data,$where);
    }
    public function insertUser($data){
        $this->insert($data);
    }

}

