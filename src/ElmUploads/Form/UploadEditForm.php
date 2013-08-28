<?php
// filename : module/EUploads/src/EUploads/Form/UploadEditForm.php
namespace ElmUploads\Form;

use Zend\Form\Form;

class UploadEditForm extends Form
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
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Update Document'
            ),
        )); 
    }
}
