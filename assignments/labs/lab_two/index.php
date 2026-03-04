<?php

/* Require list */
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


/* Unsorted list with a foreach statement looping through imported items from "data.php", echoing each listed item */
?>
<ul>
<?php foreach ($items as $item): ?>
    <li><?= $item ?></li>
<?php endforeach; ?>
</ul>

<?php

/*
hard- The first thing was figuring out what I was supposed to make "scalable". With not much code, there is no repition, or anything to offload to methods/classe, even when you stated moving things to seperate files there really isn't much to offload. But I noticed lab 1 had offloaded headers and footers so went from there. The last hard thing was again the database.. I used the wrong directory (One not connected to the server) and spent a while confused on why I couldn't see any changes which is how the lab ended up here

easy- You can more or less just look at the previous lessons and see how it's done. More or less just splitting up the file and adding some php tags which was all in all pretty simple
*/

