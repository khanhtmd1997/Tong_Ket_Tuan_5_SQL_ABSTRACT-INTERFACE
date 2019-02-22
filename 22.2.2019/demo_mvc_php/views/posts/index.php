<?php
	echo "<ul>";
	foreach ($posts as $post) {
		echo "<li>
				<a href='http://localhost/demo_mvc_php/index.php?controller=show'>".$post->title . "</a>
			</li>";

	}
	echo "</ul>";
?>