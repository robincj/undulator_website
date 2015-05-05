<?php

if (gethostname () == 'manatee')
	$url = "http://au.localhost/";
else
	$url = "http://aorangiundulator.org/";

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="refresh" content="0;URL=<?php echo $url ?>" />
<title>Redirecting to Aorangi Undulator home page.</title>
</head>
<body>Redirecting to Aorangi Undulator home page.
</body>
</html>