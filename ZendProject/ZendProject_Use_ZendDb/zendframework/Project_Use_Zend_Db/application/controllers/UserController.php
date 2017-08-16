<?php

class UserController extends Zend_Controller_Action
{
     public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $userTable = new Application_Model_DbTable_User();
        $this->view->user = $userTable->fetchAll();
    }

    public function editAction()
    {
        $userId = $this->getParam('id');
        $userTable = new Application_Model_DbTable_User();
        $this->view->user = $userTable->find($userId)->current();
        
        
    }

    public function updateAction()
    {
         $userId = $this->getParam('id');
        if ($this->getRequest()->isPost()) {    
            $getDataPostFormUserEdit=$this->getRequest()->getPost();// lấy thông tin đã được điền vào form
            $data=[
                'user_name'=> $getuser['user_name'],
                'user_pass'=> $getuser['user_pass'],
                'user_phone'=>$getuser['user_phone'],
                'user_address'=>$getuser['user_address'],
                'user_email'=>$getuser['user_email'],
                'user_age'=>$getuser['user_age']
            ];
            unset($getDataPostFormUserEdit['btn_edit']);
            $user= new Application_Model_DbTable_User();
            $user->update($getDataPostFormUserEdit, ['id=?' => $userId]);
            // $user->updateUser($data, $userId);
        }
    }

    public function addAction()
    {
    }

    public function deleteAction()
    {
        // action body
    }

    public function addcompleteAction()
    {
        $userPostFormUser = $this->getRequest()->isPost();
        
        if($userPostFormUser)
        {
            $userFormData = $this->getRequest()->getPost();// lấy thông tin đã được điền vào form
            $userFormData['created'] = '2017-11-20';
            $userFormData['user_id'] = rand();
            unset($userFormData['btn_edit']);
   
            $userTable = new Application_Model_DbTable_User();
            $userTable->insert($userFormData);
        }
    
    }
    public function loginAction()
    {
        $formLogin = new Application_Form_Login();
        $formLogin->submit->setLabel('Add');
        $this->view->form = $formLogin;
        $postFormLogin=$this->getRequest()->isPost();

        if ($postFormLogin) {
            $filterOnlyLetter = new Zend_Filter_Alpha(array('allowwhitespace' => true ));
            print $filterOnlyLetter->filter('This is (my) content: 123');
            echo"<br>";

            $filterOnlyDigit =new Zend_Filter_Digits();
            print $filterOnlyDigit->filter('This is (my) content: 123sdfsad43252');
            echo"<br>";

            $filterEncrypt = new Zend_Filter_Encrypt();
            print $filterEncrypt->filter('122343');
            echo"<br>";

            $filterDecrypt = new Zend_Filter_Decrypt();
            print $filterEncrypt->filter('122343afsdfgd');
            echo"<br>";

            $filterAlnum = new Zend_Filter_Alnum();
            print $filterAlnum->filter('122343afsdfgd');
            echo"<br>";

            $filterStringToLower = new Zend_Filter_StringToLower();
            print $filterStringToLower->filter('122343afsdfgd DDDĐ');
            echo"<br>";

            $filterStringToUpper = new Zend_Filter_StringToUpper();
            print $filterStringToUpper->filter('122343afsdfgd DDDĐ');
            echo"<br>";
            
            $formLoginData = $this->getRequest()->getPost();
            
            if ($formLogin->isValid($formLoginData)) {
            echo $loginName = $formLogin->getValue('name');
            echo $loginPass = $formLogin->getValue('pass');
            $userTable = new Application_Model_DbTable_User();
            //$numberRow=$userTable->select()->where('user_name ="'.$loginName.'" and user_pass ="'.$loginPass.'"');
            $recordUserCheckLogin = $userTable->fetchAll('user_name ="'.$loginName.'" and user_pass ="'.$loginPass.'"')->toArray();
            //$this->view->user = $recordUserCheckLogin;
            
            if(count($recordUserCheckLogin)>=1){
                $this->_helper->redirector('index');
            }else{
                $notisLogin="Tài khoản hoặc mật khẩu không chính xác";
                $this->view->notis = $notisLogin;
            }
            
        } else {
            $formLogin->populate($formLoginData);
                }
            }
    }

}
   

















