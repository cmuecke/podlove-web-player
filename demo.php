<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Podlove Web Player Standalone Demo</title>

  <link href="static/podlove-web-player.css" rel="stylesheet" media="screen" type="text/css" />

  <script src="libs/html5shiv.js"></script>
  <script src="libs/jquery-1.9.1.min.js"></script>
  <script src="static/podlove-web-player.js"></script>
</head>

<body>
  <p>
    <?php
    
    error_reporting(E_ALL);
    include './pwp-helper.php';
    
    $playerI = 1;
    $thisdir = $_SERVER["SCRIPT_URI"];
    $thisidr = substr($thisdir, 0, strrpos($thisdir));
    $episode = array('files' => array($thisdir.'/samples/podlove-test-track.mp4',
                                      $thisdir.'/samples/podlove-test-track.mp3',
                                      $thisdir.'/samples/podlove-test-track.ogg',
                                      $thisdir.'/samples/podlove-test-track.opus'
                                     ),
                     'playerId' => $playerI,
                     'pluginPath' => $thisdir.'/static/',
                     'poster' => 'samples/coverimage.png',
                     'title' => 'PWP001 – Lorem ipsum dolor sit amet',
                     'subtitle' => 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.',
                     'summary' => 'Sed posuere consectetur est at lobortis. Donec ullamcorper nulla non metus auctor fringilla. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id ligula porta felis euismod semper.',
                     'chapters' => $thisidr.'/chapters.mp4chaps.txt',
                     'permalink' => $thisdir.'/demo.php',
                     'duration' => '00:02.500'
                    );
    
    var_dump($episode);
    
    echo podlovewebplayer_build_html( $episode );
    
    ?>
    <!--
    <audio id="testplayer1">
      <source src="samples/podlove-test-track.mp4" type="audio/mp4"></source>
      <source src="samples/podlove-test-track.mp3" type="audio/mpeg"></source>
      <source src="samples/podlove-test-track.ogg" type="audio/ogg; codecs=vorbis"></source>
      <source src="samples/podlove-test-track.opus" type="audio/ogg; codecs=opus"></source>
    </audio>

    <script>
      $('#testplayer1').podlovewebplayer({
        poster: 'samples/coverimage.png',
        title: 'PWP001 – Lorem ipsum dolor sit amet',
        permalink: 'http://podlove.github.com/podlove-web-player/standalone.html',
        subtitle: 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.',
        chapters: [{'start':'00:00:00.000','title':'Chapter One',   'image':'samples/coverimage.png',       'href':'http://podlove.org/'}
                  ,{'start':'00:00:00.500','title':'Chapter Two',   'image':'samples/coverimage-red.png',   'href':'http://wordpress.org/plugins/podlove-web-player/'}
                  ,{'start':'00:00:01.500','title':'Chapter Three', 'image':'samples/coverimage-green.png', 'href':'http://wordpress.org/plugins/podlove-podcasting-plugin-for-wordpress/'}
                  ,{'start':'00:00:02.000','title':'Chapter Four',  'image':'samples/coverimage-blue.png',  'href':'http://metaebene.me/'}],
        summary: '<p>Summary and even links <a href="https://github.com/gerritvanaaken/podlove-web-player">Podlove Web Player</a>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna.</p><p>Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Nullam id dolor id nibh ultricies vehicula ut id elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>',
        downloads: [{"name": "MPEG-1 Audio Layer III (MP3) High Quality","size": 58725,"url": "samples/podlove-test-track.mp3","dlurl": "samples/podlove-test-track.mp3"},{"name": "ogg","size": 50494,"url": "samples/podlove-test-track.ogg","dlurl": "samples/podlove-test-track.mp3"},{"name": "mp4","size": 78328,"url": "samples/podlove-test-track.mp4","dlurl": "samples/podlove-test-track.mp4"},{"name": "opus","size": 37314,"url": "samples/podlove-test-track.opus","dlurl": "samples/podlove-test-track.opus"}],
        duration: '00:02.500',
        alwaysShowHours: true,
        startVolume: 0.8,
        width: 'auto',
        summaryVisible: false,
        timecontrolsVisible: false,
        sharebuttonsVisible: false,
        chaptersVisible: true	
      });
    </script>
  </p>
  -->
</body>
</html>