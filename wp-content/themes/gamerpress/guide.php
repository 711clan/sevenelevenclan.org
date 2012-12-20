<?php
add_action('admin_menu', 'gmp_setupguide_menu');

function gmp_setupguide_menu() {
  add_theme_page('Gamerpress setup guide', 'Theme Setup Guide', 8, 'theme_setup_guide', 'gmp_setupguide');
}

function gmp_setupguide() {
?>

<style>
	.theme {width: 90%; background:#fff; border:1px solid #DFDFDF; margin:10px 0px;}
	.theme img {border:1px solid #DFDFDF;}
	.theme h4{ background:#E8E8E8; padding:5px; margin:0px; }
	.guide { line-height:20px; overflow: hidden; padding:10px;}
	.theme-title { font-size: 14px; margin: 0 0 5px 3px; }
	.description { width: 280px; margin: 0 0 0 3px; }
</style>

<div class="wrap">
<h2> <b> Gamerpress Setup Guide </b> </h2>

<p> <b>Theme is built for WP 2.9+ version.</b> If your WordPress version is beloew 2.9 please upgrade it. <br/>Please read the setup guide and adjust your settings in the theme option page. </p> 
<p><b>Do not rename the theme folder. </b></p>
<p>For support related issues please <a href="http://web2feel.com/contact">contact me </a>  </p>

<div class="theme">

<h4>Featured Post Slider</h4>

<div class="guide">

<img src="http://img62.imageshack.us/img62/9793/gamersld.jpg"  /> <img src="http://img682.imageshack.us/img682/9876/ekologicoptionswordpres.png"/> 			
<p>You can setup a featured post slider section on the homepage. From the theme option page you can select the category for your featured posts and the number of posts to be displayed. </p>

<b> How to add images </b>: <p>This theme utilizes the <em>post thumbnail </em> feature of wordpress to display custom images on slider, index page, sidebar etc. While you create a new post, look for the post tumbnail editor and add your thumbnail image from there. 
</p><img src="http://img195.imageshack.us/img195/8502/posthumbnail.jpg"/>
</div>

</div>

<div class="theme">

<h4>Featured Video</h4>

<div class="guide">
 <p> Enter the video embed code obtained from youtube or other video sharing sites to the theme option page. This will display your featured video on the sidebar.</p>
<img src="http://img269.imageshack.us/img269/5773/gamevid.jpg"/>


</div>

</div>

<div class="theme">

<h4>Banner ad management</h4>

<div class="guide">
 <p> Enter your adsense code or any other banner script here to have them displayed on home page and on single post views.</p>
<img src="http://img36.imageshack.us/img36/1242/admang.jpg"/>

 <p> The theme has Four 125 x 125 banner ad spots. You can configure the banner image url and the target site url via the theme option page.</p>
<img src="http://img200.imageshack.us/img200/9876/ekologicoptionswordpres.png"  />
</div>

</div>
</div>

<?php }; ?>