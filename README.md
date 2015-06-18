# HTML Node Generator
Simple html generator class php

##use

new HTMLNode($tag, $content, $attr);

$tag: name of the tag
$attr: it's an array of tag attributes, where (key, value) has (attribute, value)
$content: it is the content of the tag. it can be a string, a HTMLNode object, or an array of HTMLNode object


## Exemple

$il1 = new HTMLNode('li', 'item content');
$il2 = new HTMLNode('li', 'item content');
$il3 = new HTMLNode('li', 'item content');

$liItmes = array($il1,$il2,$il3);

$ul = new HTMLNode('ul', $liItmes, array('id'=>'identifiant', 'class'=>'itmesNav'));

$ulString = $ul->getHTML();

$div = new HTMLNode('div', $ulString, array('class'=>'container'));