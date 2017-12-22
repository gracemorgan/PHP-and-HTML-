<html>
<body>
<h1> A Simple PHP Page</h1>
<?php
$x=rand(1,10);
$y=rand(1,10);
$z=max($x,$y);
echo "The first random number is <span style=color:red;font-size:20px;>$x </span> <br>";
echo "The second random number is <span style=color:green;font-size:20px;>$y </span> <br>";
echo "<span style=color:blue;font-size:30px;>The larger value of the two random numbers is $z</span><br>";
?>
</body>
</html>