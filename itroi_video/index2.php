<html>
<head>
<meta charset=utf-8 />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
				m4v: "video/54501898sample.mp4",
				poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
			});
		},
		swfPath: "js",
		solution: "flash, html",
		supplied: "m4v",
		cssSelectorAncestor: "",
                size: {
                  width: "460px",
                  height: "320px"
                },
		smoothPlayBar: true,
		keyEnabled: true
	});
        $('.jp-jplayer').click(function() {
            toggle_playpause();
          });
          $('.jp-video-play-icon').click(function() {
            toggle_playpause();
          });
});
function toggle_playpause()
{
    ///alert($('#jquery_jplayer_1').data().jPlayer.status.width);
    //alert($('#jquery_jplayer_1').data().jPlayer.status.videoWidth);
    if ($('#jquery_jplayer_1').data().jPlayer.status.paused == false) {
                 $("#jquery_jplayer_1").jPlayer('pause');
                 $('.jp-video-play').show();
            } else {
                $("#jquery_jplayer_1").jPlayer('play');
                $('.jp-video-play').hide();
            }
}
//]]>
</script>
</head>
<body>
<div id="jp_container_1" class="jp-video jp-video-360p">
    <div class="jp-type-single">
        <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div class="jp-gui">
                <div class="jp-video-play">
                    <a class="jp-video-play-icon" tabindex="0">play</a>
		</div>
		<div class="jp-interface">
                    <div class="jp-progress">
			<div class="jp-seek-bar">
                            <div class="jp-play-bar"></div>
			</div>
                    </div>
                    <div class="jp-current-time"></div>
                    <div class="jp-duration"></div>
		</div>
            </div>
    </div>
</div>
</body>

</html>
