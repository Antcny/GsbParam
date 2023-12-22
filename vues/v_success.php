
<ul id="success" class="list-group">
<?php
foreach($msgErreurs as $erreur)
	{
?>     
	  <li class="list-group-item list-group-item-success"><?= $erreur ?></li>
<?php	  
	}
?>
</ul>