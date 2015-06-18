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

	public function __construct($tag="div", $content="", $attr=array() ){

		$this->tag = $tag ;
		$this->attr = $attr;
		$this->content = $content ;

		return $this;
	}
	
	/**
	 * Object to string
	 */
	public function toString(){
		$this->build();
		echo $this->html;
	}

	/**
	 * Recursive HTML Nodes Builder
	 */
	public function build(){

		// Node Attributes;
		$this->getAttrString();
		
		if(is_array($this->content)){
			$this->html.= '<'. $this->tag .' '. $this->attrString .'>' ;
			foreach ($this->content as $key => $value) 
				$this->html.= $value->build() ;

			$this->html .= '</'. $this->tag .'>';
		}else{
			// Node Content
			$nodeContent = $this->content instanceof HTMLNode ? $this->content->build() : $this->content ;  

			// Node HTML
			$this->html = '<'. $this->tag .' '. $this->attrString .'>'. $nodeContent .'</'. $this->tag .'>' ;
		}

		return $this->html ;
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

