<?php
namespace ElmUploads\Model;

class Upload
{
    public $id;
    public $filename;
    public $label;
    public $private; // 0 = public access to document
    public $user_id;

	function exchangeArray($data)
	{
		$this->id		= (isset($data['id'])) ? $data['id'] : null;
		$this->filename		= (isset($data['filename'])) ? $data['filename'] : null;
		$this->label	= (isset($data['label'])) ? $data['label'] : null;
		$this->private	= (isset($data['private'])) ? $data['private'] : 0;
		$this->user_id	= (isset($data['user_id'])) ? $data['user_id'] : null;	
	}
	
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}	
}
