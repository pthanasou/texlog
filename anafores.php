<?php
include ("header.php");
echo "<div id=main>";

	echo "

	<h1>Επιλογές </h1>
	<ul>
    <li><a href='anafora1.php'>Εισαγωγή Αναφοράς</a>	</li>
	<li><a href='anafora2.php?q=1'>Όλες οι αναφορές</a>	</li>
	<li><a href='anafora2.php?q=2'>Αναφορές Ανοικτές</a>	</li>
	<li><a href='anafora2.php?q=3'>Επιλυμένες Αναφορές</a>	</li>
	<li><a href='anafora2.php?q=4'>Οι αναφορές μου</a>	</li>
	</ul>
	";

echo "</div>";
include ("footer.php");
?>