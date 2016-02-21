
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>jQuery Momentum Scroll Plugin Demo</title>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<style>
body { background-color:#34495E; color:#fff; font-family:'Roboto Condensed', Helvetica, sans-serif; padding:30px; }
.container {  margin:30px auto;}
.container > p { font-size:1em; margin:50px;}
h1 { text-align:center;}
</style>
</head>

<body>
<div class="container">
<h1>jQuery Momentum Scroll Plugin Demo</h1>
<div class="jquery-script-ads" align="center";><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<div id="shell">
<div class="textbox">I'm a text box.</div>

<div class="parallaxbox" id="pb0" style="background-image: url('https://farm8.staticflickr.com/7177/14025543345_9e3a1ba6f5_b.jpg');"></div>

<div class="textbox">I'm a text box.</div>

<div class="parallaxbox" id="pb1" style="background-image: url('https://farm3.staticflickr.com/2850/13713022943_77f7dfc9f3_b.jpg');"></div>

<div class="parallaxbox" id="pb2" style="background-image: url('https://farm8.staticflickr.com/7292/12274143873_2c27de94e3_b.jpg');"></div>

<div class="parallaxbox" id="pb3" style="background-image: url('https://farm6.staticflickr.com/5053/14022377261_e90e0eac5c_b.jpg');"></div>

<div class="textbox">Pictures from <a target="_blank" href="https://www.flickr.com/photos/116207237@N03/">Mayaweed</a> on Flickr.</div>

<div class="parallaxbox" id="pb4" style="background-image: url('https://farm4.staticflickr.com/3763/12273895274_9347eb5f1a_b.jpg');"></div>

<div class="textbox">I'm a the last text box.</div>
<style type="text/css">body{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.textbox {
    position: relative;
    height: auto;
    
    background: white;
    padding: 50px;
    margin-top: -1px;
    margin-bottom: -1px;
    
    z-index: 99;
    box-shadow: 0 0 18px rgba( 80, 80, 80, 0.8);
}
.parallaxbox {
    position: relative;
    height: 80%;
    
    background: #444;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center center;
    
    border-top: 1px solid black;
    border-bottom: 1px solid black;
    
    z-index: 9;
}

a, a:visited{
    color: blue;
    text-decoration: none;
}
a:hover{
    text-decoration:underline;
}</style>
<script type="text/javascript">
function parallax() {
    setpos("#pb0");
    setpos("#pb1");
    setpos("#pb2", 4);
    setpos("#pb3");
    setpos("#pb4");
}



function setpos(element, factor) {
    factor = factor || 2;
    
    var offset = $(element).offset();
    var w = $(window);
    
    var posx = (offset.left - w.scrollLeft()) / factor;
    var posy = (offset.top - w.scrollTop()) / factor;
    
    $(element).css('background-position', '50% '+posy+'px');
    
    // use this to have parralax scrolling vertical and horizontal
    //$(element).css('background-position', posx+'px '+posy+'px');
}

$(document).ready(function () {
    parallax();
}).scroll(function () {
    parallax();
});</script>
  </div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/jquery-momentum-scroll.js"></script>
</body>
</html>
