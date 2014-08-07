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
				m4v: "video/1345640609video.mp4",
				poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
			});
		},
		swfPath: "js",
		solution: "flash, html",
		supplied: "m4v",
		size: {
			width: "460px",
			height: "320px",
			cssClass: "jp-video-360p",
                        border: "1px #66666c"
		},
		smoothPlayBar: true,
		keyEnabled: true
	});
});
//]]>
</script>
</head>
<body>
            <div id="jp_container_1" class="jp-video jp-video-360p">
                <div class="jp-type-single">
                    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                    <div class="jp-gui">
                        <div class="jp-video-play">
                                <a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
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
                    <div class="jp-no-solution">
                        <span>Update Required</span>
                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                    </div>
                </div>
            </div>
</body>

</html>
