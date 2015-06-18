<!DOCTYPE html>
<?php include ('node.php'); ?>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Node Lib &copy </title>
		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<?php
		
			// div > ul > [li > a, li > a, li > a]
			/*
			$HTML = new HTMLNode('div', 'Node Content',  array('class'=>'testC', "id"=>"ident"));
			$UL = new HTMLNode('ul', '...',  array('class'=>'navBar'));
			$HTML->setContent();
			*/
			
			$HTML = new HTMLNode('div', new HTMLNode('ul', array( new HTMLNode( 'li', 'ITEM1', array('class'=>'first')), new HTMLNode( 'li', 'ITEM2'), new HTMLNode( 'li', 'ITEM3') ), array('class'=>'navbar')),  array('class'=>'testC', "id"=>"ident"));

			$HTML->toString();
			
		?>
	</body>
</html>
