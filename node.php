<?php

/**
 * HTML Node Class
 */
class HTMLNode{

	public $tag;
	public $attr;
	public $attrString = '';
	public $content = "";

	public $html;

	public function __construct($content="", $tag="div", $attr=array() ){

		$this->tag = $tag ;
		$this->attr = $attr;
		$this->content = $content ;

		return $this;
	}

	/**
	 * Build HTML NODE
	 */
	public function build(){

		if(is_array($this->content)){
			foreach ($this->content as $key => $value) {
				$value->bluid() ;
			}
		}else{
			// Node Content
			/*
			if($this->content instanceof HTMLNode)
				$this->content = $this->content->build();
			*/
			
			$nodeContent = $this->content instanceof HTMLNode ? $this->content->build() : $this->content ;  
			// TODO :: $nodeContent must be always a string
			
			// Node Attributes
			$this->getAttrString();
			
			// Node HTML
			$this->html = '<'. $this->tag .' '. $this->attrString .'>'. $nodeContent .'</'. $this->tag .'>' ;
			
			echo $this->html ;
		}

		return $this ;
	}

	public function getChildContent(){
		$this->content->build();
		return $this;
	}
	
	/**
	 * Attr Array to String
	 * Array( key1 => value1, key2 => value2, ... ) to String key1="value1" key2="value2"
	 */
	public function getAttrString(){
		$this->attrString = '';
		if(is_array($this->attr))
			array_walk($this->attr, array($this, 'attrToString'));  
	} 

	public function attrToString($item2, $key){
		$this->attrString .= $key .'="'. $item2 .'" ';
	}
}

