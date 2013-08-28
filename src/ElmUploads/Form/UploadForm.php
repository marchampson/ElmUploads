<?php
// filename : module/EUploads/src/EUploads/Form/RegisterForm.php
namespace ElmUploads\Form;

use Zend\Form\Form;

class UploadForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('Upload');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');
        
        $this->add(array(
            'name' => 'label',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'File Description',
            ),
        ));
        
        $this->add(array(
            'name' => 'fileupload',
            'attributes' => array(
                'type'  => 'file',
            ),
            'options' => array(
                'label' => 'File Upload',
            ),
        )); 

        $this->add(array(
            'name' => 'private',
            'attributes' => array(
                'type'  => 'Checkbox',
            ),
            'options' => array(
                'label' => 'Private file',
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Upload Now'
            ),
        )); 
    }
}
