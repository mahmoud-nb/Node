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
	 * Build HTML NODE
	 */
	public function build(){

		if(is_array($this->content)){
			foreach ($this->content as $key => $value) {
				//echo'<pre>'; print_r($value); echo'</pre>'; // DEBUG
				$this->html.= $value->build() ;
			}
		}else{
			// Node Content
			$nodeContent = $this->content instanceof HTMLNode ? $this->content->build() : $this->content ;  
			// TODO :: $nodeContent must be always a string $nodeContent = is_string ($nodeContent) ? $nodeContent : 'TO FIX' ;
			// Node Attributes
			$this->getAttrString();
			//echo'<pre>'; print_r($this); echo'</pre>'; // DEBUG
			// Node HTML
			$this->html = '<'. $this->tag .' '. $this->attrString .'>'. $nodeContent .'</'. $this->tag .'>' ;
		}

		return $this->html ;
	}

	public function getChildContent(){
		return $this->content->build();
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

