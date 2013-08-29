<?php
// filename : module/EUploads/src/EUploads/Form/RegisterForm.php
namespace ElmUploads\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;
use Zend\Form\Element as Element;

class UploadForm extends Form
{
    protected $fieldsetArray;
    
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
                'checked_value' => 1,
                'unchecked_value' => 0
            ),
            'options' => array(
                'label' => 'Private file',
            ),
        ));
        
        $this->fieldsetArray = array(
            'default' => array(
		                'label',
		                'fileupload',
		                'private'
               
		        )
		);
    }
    
    public function getFieldsetArray()
    {
        return $this->fieldsetArray;
    }
    
    public function setFieldsetArray($fieldsetArray)
    {
        $this->fieldsetArray = $fieldsetArray;
    }
}
