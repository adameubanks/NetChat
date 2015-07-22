<h1>Welcome To The Chat Room!</h1>
<h2>Now you can chat with anyone on the network!</h2>
<div align='center'>
<iframe src="chat.htm" height='50%' width='70%'></iframe>
<br>
<br>
<form method="post" action="">
<ul id='regular'>
<tc>
	<li><td><p>Username:</p></td></li>
	<td><input type="text" name="user" value="<?php echo htmlspecialchars($_POST['user']); ?>"
	name="user" id='user' maxlength="15" size="8"/></td>
</tc>
<tc>
	<li><td><p>Comment:</p></td></li>
	<td><input name='comment'></td>
</tc>
</ul>
<!--Creates Vars to write to txt--> 
<?php
$txt = strtoupper($_POST["user"]) . ": " . $_POST["comment"] . PHP_EOL;
?>
<input type='submit' value='Send'/>
</form>
<!--Writes Data To txt-->
<?php
if(isset($_POST["comment"]) && isset($_POST["user"])) {
	$myfile = fopen("chat.txt", "a+") or die("Unable to open file!");
	fwrite($myfile, $txt);
	fclose($myfile);
}
else{
	$linecount = 0;
	$handle = fopen('chat.txt', "w+");
	while(!feof($handle)){
		$line = fgets($handle);
		$linecount++;
	}
	if ($linecount > 15) {
		fwrite($myfile, '');
	}
	fclose($handle);
}
?>
