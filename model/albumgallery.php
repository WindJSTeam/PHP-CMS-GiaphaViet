<?php	$url = $albumid;	$albumid = urltoid($url);	$db = new DB();	$sql = "select * from ALBUM where ID='".$albumid."'";	$result = $db->Query($sql);	$row = mysql_fetch_assoc($result);	if($url!=idtourl($row["NAME"],$row["ID"])){		?>		<h1>Lỗi</h1>		<div id="result">Không tồn tại album</div>		<?php	}	else{	echo "<h1>Album ".$row["NAME"]."</h1>";	$sql = "select * from MEDIA where AID='".$albumid."'";	$result = $db->Query($sql);	echo "<div id='effective_albumphoto'>";	if(mysql_num_rows($result)>0){		while($tmp = mysql_fetch_assoc($result)){			if($tmp['GMID']=='1') $thumburl = youtube_poster($tmp['LINK']);			else $thumburl = $tmp['LINK'];			echo "				<div class='image-info'>					<div class='wrapp'>						<img src='".$thumburl."' title='".$tmp['TITLE']."' _link='".$tmp['LINK']."' _group='".$tmp['GMID']."' class='main-img' onclick='viewMedia($(this))'/>						<input type='text' class='img-title' readonly='true' placeholder='Không có tiêu đề' value='".$tmp['TITLE']."'>					</div>				</div>			";		}	}	echo "</div>";		echo "			";	}?>