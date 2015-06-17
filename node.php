<?php
		/**
		 * Build HTML NODE
		 */
		public function build(){

			//echo '<br /><br />###### START BUILD NODE: '. '##'. $this->tag . '##' . 'C' . ' **'. $this->attrString . '**<br />';
			

			if(is_array($this->content)){
				foreach ($this->content as $key => $value) {
					$value->bluid() ;
				}
			}else{
				echo '<br />- ELSE: '. $this->tag .' :: '. ( $this->content instanceof HTMLNode ? 'ISNODE' : 'IS NOT') .'<br />'; 
				// Node Content
				/*
				if($this->content instanceof HTMLNode){
					$this->content = $this->content->build();
				}
				*/
				

				//$nodeContent = $this->content instanceof HTMLNode ? $this->content->build() : $this->content ;
				$nodeContent = is_string ($this->content) ? $this->content : $this->content->build() ;
				echo'<pre>'; print_r($nodeContent); echo'</pre>';
				// Node Attributes
				$this->getAttrString();

				//echo '<br />- PR: ';
				//print_r($nodeContent);
				//echo '<br />- BUILD NODE: '. '##'. $this->tag . '##' . $nodeContent . ' **'. $this->attrString . '**';

				//echo'<pre>'; print_r($this); print_r($nodeContent); echo'</pre>';

				// Node HTML
				$this->html = '<'. $this->tag .' '. $this->attrString .'>'. $this->content .'</'. $this->tag .'>' ;
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



