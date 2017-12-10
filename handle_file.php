<?php echo "on the handle file page";?>


<?php
$file = $_FILES['file'];
var_dump($file);
        require_once('getID3/getid3/getid3.php');
        $getID3 = new getID3();
        $filename= $file['tmp_name'];
        $fileinfo = $getID3->analyze($filename);

        $width=$fileinfo['video']['resolution_x'];
        $height=$fileinfo['video']['resolution_y'];

        echo $fileinfo['video']['resolution_x']. 'x'. $fileinfo['video']['resolution_y'];
        
        $duration = $fileinfo['quicktime']['moov']['subatoms'][0]['duration'];
        // convert to seconds from milliseconds
        $duration = $duration/1000;
        echo "<p>Duration: $duration</p>";
        if ($duration <= 15)
        {
        	$gif_name = explode('/',$filename);
        	$gif_name = $gif_name[2];
        	$gif_name = $gif_name.".gif";
        	if(exec("sh gif.sh $filename $gif_name"))
        	{
        	//exec("rm frames/*");
        	//exec("ffmpeg -i $filename -r 5 'frames/frame-%03d.jpg'");
        	//exec("convert -delay 20 -loop 0 frames/*.jpg gifs/$gif_name");
        		echo "<a href='gifs/$gif_name'>$gif_name</a>";
        	}
        }
        //echo '<pre>';print_r($fileinfo);echo '</pre>';
?>