<?php
require_once 'connect.php';
require 'header.php';
require 'footer.php';
require 'data.php';

/* What's the Problem? 
    - PHP logic + HTML in one file
    - Works, but not scalable
    - Repetition will become a problem

    How can we refactor this code so it’s easier to maintain?
*/


?>
<ul>
<?php foreach ($items as $item): ?>
    <li><?= $item ?></li>
<?php endforeach; ?>
</ul>


