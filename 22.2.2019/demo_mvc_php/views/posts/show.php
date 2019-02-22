<?php
echo "<table>";
	foreach ($posts as $post) 
		echo "<tr>".
				"<td>".$post->title."<td>".
				"<td>".$post->content."<td>".
				"</tr>";
	}
	echo "</table>";
?>