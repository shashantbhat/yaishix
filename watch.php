<?php
$hideNav = true;
require_once("includes/header.php");
if(!isset($_GET["id"])) {
    ErrorMessage::show("oops something went wrong:(");
}

$video = new video($con, $_GET["id"]);
$video->incrementViews();
$upNextVideo = videoProvider::getUpNext($con, $video);
?>

<div class = 'watchContainer'>

    <div class = 'videoControls watchNav' >
        <button onclick = 'goBack()'><i class="fa-solid fa-arrow-left"></i></button>
        <h1><?php echo $video->getTitle(); ?></h1>
    </div>

    <div class="videoControls upNext" style="display:none;">

        <button onclick = "restartVideo();"><i class="fa-solid fa-arrow-rotate-right"></i></button>

        <div class="upNextContainer">
            <h2>Up next:</h2>
            <h3><?php echo $upNextVideo->getTitle(); ?></h3>
            <h3><?php echo $upNextVideo->getSeasonAndEpisode(); ?></h3>

            <button class = 'platNext' onclick = "watchVideo(<?php echo $upNextVideo->getId();?>);">
            <i class="fa-solid fa-play"></i>
            </button>    
        </div>
    
    </div>

    <video controls autoplay onended = "showUpNext();">
        <source src = '<?php echo $video->getFilePath(); ?>' type = video/mp4>
    </video>
</div>
<script>
    initVideo("<?php echo $video->getId(); ?>", "<?php echo $userLoggedIn; ?>");
</script>