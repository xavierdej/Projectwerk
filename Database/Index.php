<!doctype HTML>
<html>
	<head>
		<title>ProjectLab</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
	</head>
	<body>
		<h1>Database entries</h1>
		<form method="post" action="getSong.php">
            <p>
                <label>Name:
                    <input type="text" name="songID" maxlength="30">
                </label>
            </p>
            <p>
                <input type="submit" value="Submit">
                <input type="reset" value="Clear">
            </p>   
        </form>

        <form method="post" action="writeSong.php">
            <p>
                <label>Name:
                    <input type="text" name="songID" maxlength="30">
                    <input type="text" name="songName" maxlength="30">
                    <input type="text" name="songData" maxlength="30">
                </label>
            </p>
            <p>
                <input type="submit" value="Submit">
                <input type="reset" value="Clear">
            </p>   
        </form>
	</body>
</html>