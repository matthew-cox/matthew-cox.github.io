<?php
header('Content-type: text/css');

require_once( "../libs/conf.php" );

$theme = 0;

if ( count( $CONF[themes] ) > 1 ) {
    $theme = rand( 0, count( $CONF[themes] ) - 1 );
}

$bgimg = $CONF[themes][$theme][bgimg];

if ( isset( $CONF[themes][$theme][gfont] ) ) {

    print "@import url(http://fonts.googleapis.com/css?family=" . $CONF[themes][$theme][gfont] . ");";
}

print <<<ENDCSS

/* 
 * Main page - Theme #$theme
 *
 * From: http://css-tricks.com/perfect-full-page-background-image/ 
 */
html#about {
	background: url($bgimg) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	
	/* filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='$bgimg', sizingMethod='scale');
	-ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='$bgimg', sizingMethod='scale')"; */
	min-width: 600px;
}

div#bg {
    background: url($bgimg) no-repeat center center fixed;
    display: block;
    z-index: -1;
    width: 100%;
    height: 100%;
    filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='$bgimg', sizingMethod='scale');
    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='$bgimg', sizingMethod='scale')";
}

ENDCSS;

if ( isset( $CONF[themes][$theme][bio] ) ) {

    print "div#bio {";
    foreach ( $CONF[themes][$theme][bio] as $key => $value ) {
        print "$key: $value;";
    }
    print "}\n";
}

if ( isset( $CONF[themes][$theme][imgcr] ) ) {

    print 'p#imgcr:before { content: "\00a9 ' . $CONF[themes][$theme][imgcr] . "\"; }\n";
}

if ( isset( $CONF[themes][$theme][css] ) ) {

    foreach ( $CONF[themes][$theme][css] as $css ) {
        print $css . "\n";
    }
}
?>