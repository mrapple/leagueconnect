/*
Theme Name: ProLeague
Description: League Connect Default Style
Designer: McSpider
Text:	#131415
Links:	#646b72
White:	#eaeaea
Light Blue Gray: #adb3bc
*/

html
{
	background:url(head.png) repeat-x;
	padding-left:25px;
	padding-right:25px;
	background-color:#eaeaea;
	font-family:"Myriad Pro";
	min-width:700px;
	max-width:950px;
	margin:0 auto;
}

body
{
	margin:0;
	padding:0;
}

a:active
{
	outline:none;
	color:#646b72;
	text-decoration:none;
	padding-bottom:2px;
	border-color:transparent;
}

a:hover
{
	text-decoration:underline;
}

a:focus
{
	-moz-outline-style:none;
}

#logo
{
	background-image:url(tank.png);
	background-repeat:no-repeat;
	background-position:left center;
	display:inline-block;
	color:#FFF;
	font-size:25px;
	text-shadow:0 0 3px #000;
	font-weight:400;
	padding-left:30px;
}

#logo a
{
	color:#eaeaea;
}

#logo a:hover
{
	color:#FFF;
}

#top
{
	padding-top:25px;
	height:46px;
	overflow:hidden;
}

#statusbar
{
	float:right;
}

#statusbar ul
{
	list-style:none;
	margin:0;
}

#statusbar li
{
	color:#adb3bc;
	display:inline-block;
	margin-left:15px;
	font-size:14px;
}

#statusbar li a
{
	color:#dfdfdf;
	text-decoration:none;
}

#statusbar li a:hover
{
	color:#FFF;
}

#navigation
{
	display:block;
	overflow:hidden;
}

#menu
{
	margin-top:1px;
	overflow:hidden;
	height:30px;
	width:700px;
	text-align:center;
	padding:0;
}

#menu ul
{
	display:block;
	list-style:none;
	margin:0;
	padding:0;
}

#menu li
{
	float:left;
	list-style:none;
	margin:0 0 0 15px;
	padding:0;
}

#menu a:link,#menu a:visited
{
	color:#131415;
	text-decoration:none;
	font-size:14px;
	height:20px;
	display:block;
	text-shadow:0 1px 0 #a3aab1;
	padding:5px 0;
}

#menu a:hover,#menu a:active,#menu a:focus,#menu a.active
{
	color:#f4f4f4;
	text-shadow:0 1px 0 #363a3d;
	background:url(indicator.png) bottom center no-repeat;
}

#page_title
{
	display:block;
	text-align:left;
	margin-top:-5px;
	color:#191a1b;
}

#page_navigation
{
	float:right;
	margin-top:-30px;
	font-size:14px;
}

#page_navigation a
{
	color:#191a1b;
	text-decoration:none;
}

#page_navigation a:hover
{
	color:#191a1b;
	text-decoration:underline;
	text-shadow:0 1px 0 #f8f8f8;
}

h3
{
	font-weight:400;
	font-size:18px;
	margin:10px;
	padding:0;
}

#page_body
{
	display:block;
	padding-top:20px;
	font-size:14px;
}

#footer
{
	display:block;
	padding-top:20px;
	font-size:14px;
	text-align:center;
	border-top:1px solid #000;
	margin:20px auto 0;
}

a:link,a:visited
{
	color:#646b72;
	text-decoration:none;
	padding-bottom:2px;
	border-color:transparent;
}

@-moz-document url-prefix()
{
    #statusbar, x:-moz-any-link, x:default
    {
    	margin-top: -15px;
    }
}