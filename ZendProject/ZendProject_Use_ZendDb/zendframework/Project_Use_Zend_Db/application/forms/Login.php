<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $artist = new Zend_Form_Element_Text('name');
        $artist->setLabel('Artist')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringToUpper')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
 //
        $title = new Zend_Form_Element_Text('pass');
        $title->setLabel('Title')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('StringLength', false, array(6, 20));
 //
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($artist, $title, $submit));
    }
    


}

