<!DOCTYPE html>

<html>

	<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style_pizza.css" />
	<link rel="icon" href="images/chef_pizza.jpg" />
	<title><?= $title??"" ?></title>

	<script language="javascript" type="text/javascript">
		function send(action){
			document.envoie.method='POST';
			document.envoie.action=action;
			document.envoie.submit();
		}
	</script>


	</head>

	<body>
