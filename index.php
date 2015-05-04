<!doctype html>
<html lang="zh-cn">
<head>
<script type="text/javascript" src="js/html5.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="plugin/orbit.js"></script>
<?php include 'font/test'?>
<meta charset="utf-8"></meta>
<link type="text/css" rel="stylesheet" href="plugin/orbit.css"></link>
<link type="text/css" rel="stylesheet" href="css/index.css"></link>
<link type="text/css" rel="stylesheet" href="css/global.css"></link>
<title>studiosigno.com</title>
<script type="text/javascript">
     $(window).load(function() {
		 $('#featured').orbit();
     });
</script>
</head>
<body>
	<div class="container">
	<?php include 'header.xml'; ?>
	<div id="index_cover">
		<a href="/project/tianjin_hospital.php">
		<div id="cover-position">
			<span id="cover_class">天津医院导向系统</span>
			<span id="cover_name">空间路引设计</span>
			<span id="cover_function">拉近行人和建筑的时空</span>
		</div>
		</a>
	</div>
	<div id="hi"> Hi </div>
	<div class="wrapper">
		<section id="introduce" title="公司愿景">
			<h1>我们是汉符设计</h1>
		<h1>那些年,我们追求的<span><a href="project.php" title="我们的追求">美</a></span></h1>
		<p id="duty">行走在帝都的钢筋水泥森林<br>
		每一块<span><a title="建筑装修平面设计">墙面</a></span><br>
		每一座<span><a title="公共道路交通指示设计">天桥</a></span><br>
		每一块<span><a>站牌</a></span><br>
		每一本<span><a>封面</a></span><br>
		每一个<span><a>展台</a></span><br>
		都是沉睡的婴儿,等待被唤醒,</p>
		</section>
		<section id="project">
		<!--span class="orbit-caption" id="firstcaption">喀什路标</span-->
		<div id="featured"> 
		     <img src="img/project-ks.png" alt="Overflow: Hidden No More"/>
		     <!--img src="img/project-ks.png" alt="Overflow: Hidden No More"  data-thumb="bullets.jpg"/-->
		     <img src="img/project-lc.png"  alt="HTML Captions" />
		      <img src="img/project-jd.png" alt="and more features" />
		</div>
		</section>
		
		<section>
		<div class="people">
			<blockquote>
				<p class="clear">美是一种态度<br>
					美是一种坚持<br>
					简洁的线条<br>
					迷人的色彩<br>
					是自然和建筑本我的特点</p>
			</blockquote>
			<div id="head-c"><div id="head" title="人物简介\设计感言">郦</div></div>
		</div>
		</section>
		<address>
		北京市朝阳区草场地211号院11栋<br>
		邮编100015<br>
		T:010-5206 0711 / 5206 0712<br>
		F:010-5206 0713<br>
		E-mail: AE@studiosigno.com<br>
		</address>
		<?php include 'contract.xml';?>
	</div>
	<?php include 'footer.xml';?>
</div>
</body>
</html>
