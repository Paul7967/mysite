<?php
	require_once "php/language_class.php";
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	function getLanguage() {
		preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]), $matches); // Получаем массив $matches с соответствиями
		$langs = array_combine($matches[1], $matches[2]); // Создаём массив с ключами $matches[1] и значениями $matches[2]
		foreach ($langs as $n => $v)
			$langs[$n] = $v ? $v : 1; // Если нет q, то ставим значение 1
		arsort($langs); // Сортируем по убыванию q
		$default_lang = key($langs); // Берём 1-й ключ первого (текущего) элемента (он же максимальный по q)
		// Выводим язык по умолчанию
		if (strpos($default_lang, "ru") !== false) return "ru";
		elseif (strpos($default_lang, "en") !== false) return "en";
	}
	

	// $my_lang = $_COOKIE['mylang'];
	if(isset($_COOKIE["language"]))
	{
		$language = htmlspecialchars($_COOKIE["language"]);
	} else {
		$language = getLanguage();   // при первом запуске определяем предпочитаемый язык пользователя
		// $language = "en";
		setcookie("language", $language);
		
	}
	// setcookie("language", "ru");
	
	$lang = new Language($language); 
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   	<meta charset="utf-8">
	<title><?=$lang->get("HEAD_META_TITLE") ?></title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">  
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/vendor.css">     

   <!-- script
   ================================================== -->   
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="icon" type="image/png" href="favicon.ico">

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   	<header>   	
	   	<form method="post" class="btn_chg_lng " >
			<input 
				type="submit" 
				name="set_ru_lang" 
				class="button stroke" 
				value=<?=$lang->get("HEADER_BTN_LANG") ?> 
				onclick="return ChangeLng();" />
				<script> function ChangeLng() {
					(document.cookie==='language=en' ? document.cookie='language=ru' : document.cookie='language=en');
					return true;
				} </script>
			
		</form>

		<div class="row">

			<div class="top-bar">
				<a class="menu-toggle" href="#"><span><?=$lang->get("HEADER_MENU-TOGGLE_SPAN") ?></span></a>

				<!-- <div class="logo"> -->
					<!-- <a href="index.php">Меню</a> -->
				<!-- </div>		       -->

				<nav id="main-nav-wrap">
					<ul class="main-navigation">
						<li class="current"><a class="smoothscroll"  href="#intro" title=""><?=$lang->get("HEADER_MAIN-NAVIGATION_LI_HOME") ?></a></li>
						<li><a class="smoothscroll"  href="#about" title=""><?=$lang->get("HEADER_MAIN-NAVIGATION_LI_ABOUT") ?></a></li>
						<li><a class="smoothscroll"  href="#resume" title=""><?=$lang->get("HEADER_MAIN-NAVIGATION_LI_RESUME") ?></a></li>
						<li><a class="smoothscroll"  href="#portfolio" title=""><?=$lang->get("HEADER_MAIN-NAVIGATION_LI_PORTOLIO") ?></a></li>
						<li><a class="smoothscroll"  href="#contact" title=""><?=$lang->get("HEADER_MAIN-NAVIGATION_LI_CONTACTS") ?></a></li>	
					</ul>
				</nav>    		
			</div> <!-- /top-bar --> 
			
		</div> <!-- /row --> 		
   </header> <!-- /header -->

	<!-- intro section
   ================================================== -->
   <section id="intro">   

   	<div class="intro-overlay"></div>	

   	<div class="intro-content">
   		<div class="row">

   			<div class="col-twelve">

	   			<h5><?=$lang->get("INTRO_INTRO-CONTENT_H5") ?></h5>
	   			<h1><?=$lang->get("INTRO_NAME") ?></h1>

	   			<p class="intro-position">
	   				<span><?=$lang->get("INTRO_POSITION_1") ?></span>
	   			</p>

	   			<a class="button stroke smoothscroll" href="#about" title=""><?=$lang->get("INTRO_ABOUT_BTN") ?></a>
	   		</div>  
   			
   		</div>   		 		
   	</div> <!-- /intro-content --> 

   	<ul class="intro-social">        
		<li><a href="https://www.linkedin.com/in/pavel-o/"><i class="fa fa-linkedin"></i></a></li>
		<li><a href="https://www.facebook.com/profile.php?id=100014807746891"><i class="fa fa-facebook"></i></a></li>
		<li><a href="https://vk.com/ostatochnikov85"><i class="fa fa-vk"></i></a></li>
		<li><a href="https://www.instagram.com/pavel_ostatochnikov/"><i class="fa fa-instagram"></i></a></li>
	</ul> <!-- /intro-social -->      	

   </section> <!-- /intro -->


   <!-- about section
   ================================================== -->
   <section id="about">  

   	<div class="row section-intro">
   		<div class="col-twelve">

   			<h5><?=$lang->get("ABOUT_HEADER_H5_ABOUT") ?></h5>
   			<h1><?=$lang->get("ABOUT_HEADER_H1_INTRODUCE") ?></h1>

   			<div class="intro-info">

   				<img src="images/profile-pic.jpg" alt="Profile Picture">

   				<p class="lead"><?=$lang->get("ABOUT_P_LEAD") ?></p>
   			</div>   			

   		</div>   		
   	</div> <!-- /section-intro -->

   	<div class="row about-content">

   		<div class="col-six tab-full">

   			<h3><?=$lang->get("ABOUT_ROW_ABOUT-CONTENT_H3") ?></h3>
   			<p><?=$lang->get("ABOUT_ROW_ABOUT-CONTENT_P") ?></p>

   			<ul class="info-list">
   				<li>
   					<strong><?=$lang->get("ABOUT_LI_FIO_LABEL") ?></strong>
   					<span><?=$lang->get("ABOUT_LI_FIO_VALUE") ?></span>
   				</li>
				<li>
					<strong><?=$lang->get("ABOUT_LI_WORK_LABEL") ?></strong>
					<span><?=$lang->get("ABOUT_LI_WORK_VALUE") ?></span>
				</li>
   				<li>
   					<strong><?=$lang->get("ABOUT_LI_BIRTH_DATE_LABEL") ?></strong>
   					<span><?=$lang->get("ABOUT_LI_BIRTH_DATE_VALUE") ?></span>
				</li>
				<li>
   					<strong><?=$lang->get("ABOUT_LI_SITE_LABEL") ?></strong>
					<a href=<?=$lang->get("ABOUT_LI_SITE_VALUE") ?> target="_blank"><span><?=$lang->get("ABOUT_LI_SITE_VALUE") ?></span></a>
   				</li>
   				<li>
   					<strong><?=$lang->get("ABOUT_LI_EMAIL_LABEL") ?></strong>
   					<span><?=$lang->get("ABOUT_LI_EMAIL_VALUE") ?></span>
   				</li>
   				<li>
   					<strong><?=$lang->get("ABOUT_LI_PHONE_LABEL") ?></strong>
   					<span><?=$lang->get("ABOUT_LI_PHONE_VALUE") ?></span>
   				</li>
   				<li>
   					<strong><?=$lang->get("ABOUT_LI_CITY_LABEL") ?></strong>
   					<span><?=$lang->get("ABOUT_LI_CITY_VALUE") ?></span>
   				</li>

   			</ul> <!-- /info-list -->

   		</div>

   		<div class="col-six tab-full">

   			<h3><?=$lang->get("ABOUT_SKILLS_H3") ?></h3>
   			<p><?=$lang->get("ABOUT_SKILLS_P") ?></p>

				<ul class="skill-bars">
				
				   <li>
						<div class="progress percent65"><span>65%</span></div>
						<strong>HTML5</strong>
				   	</li>
				   	<li>
						<div class="progress percent55"><span>55%</span></div>
						<strong>CSS3</strong>
				   	</li>
				   	<li>
						<div class="progress percent60"><span>60%</span></div>
						<strong>JavaScript (ES6)</strong>
				   	</li>
				   	<li>
						<div class="progress percent60"><span>60%</span></div>
						<strong>React</strong>
				   	</li>
				   	
      
				</ul> <!-- /skill-bars -->	
				<p><?=$lang->get("ABOUT_SOFT-SKILLS_P") ?></p>
				<ul class="skill-bars">	
					<li>
						<div class="progress percent85"><span>85%</span></div>
						<strong><?=$lang->get("ABOUT_SKILLS_LI_1") ?></strong>
				   	</li>
					<li>
						<div class="progress percent90"><span>90%</span></div>
						<strong><?=$lang->get("ABOUT_SKILLS_LI_2") ?></strong>
				   	</li>
				</ul>

   		</div>

   	</div>

   	<div class="row button-section">
   		<div class="col-twelve">
   			<a href="#contact" title="Hire Me" class="button stroke smoothscroll"><?=$lang->get("ABOUT_BUTTON-SECTION_HIRE_ME") ?></a>
   			<a href="<?=$lang->get("PORTFOLIO_A_RESUME_LINK") ?>" title="Download CV" class="button button-primary" download><?=$lang->get("ABOUT_BUTTON-SECTION_DOWNLOAD_CV") ?></a>
   		</div>   		
   	</div>

   </section> <!-- /process-->    


   <!-- resume Section
   ================================================== -->
	<section id="resume" class="grey-section">

		<div class="row section-intro">
   		<div class="col-twelve">

   			<h5><?=$lang->get("RESUME_H5") ?></h5>
   			<h1><?=$lang->get("RESUME_H1") ?></h1>

   			<p class="lead"><?=$lang->get("RESUME_P_LEAD") ?></p>

   		</div>   		
   	</div> <!-- /section-intro--> 

   	<div class="row resume-timeline">

   		<div class="col-twelve resume-header">

   			<h2><?=$lang->get("RESUME_WORK-EXPERIENCE_H2") ?></h2>

   		</div> <!-- /resume-header -->

   		<div class="col-twelve">

   			<div class="timeline-wrap">

   				<div class="timeline-block">

	   				<div class="timeline-ico">
	   					<i class="fa fa-briefcase"></i>
	   				</div>

	   				<div class="timeline-header">
	   					<h3><?=$lang->get("RESUME_WORK-EXPERIENCE_1_POSITION") ?></h3>
	   					<p><?=$lang->get("RESUME_WORK-EXPERIENCE_1_PERIOD") ?></p>
	   				</div>

	   				<div class="timeline-content">
	   					<h4><?=$lang->get("RESUME_WORK-EXPERIENCE_1_PLACE") ?></h4>
	   					<p><?=$lang->get("RESUME_WORK-EXPERIENCE_1_DESCR") ?></p>
	   				</div>

	   			</div> <!-- /timeline-block -->

	   			<div class="timeline-block">

	   				<div class="timeline-ico">
	   					<i class="fa fa-briefcase"></i>
	   				</div>

	   				<div class="timeline-header">
	   					<h3><?=$lang->get("RESUME_WORK-EXPERIENCE_2_POSITION") ?></h3>
	   					<p><?=$lang->get("RESUME_WORK-EXPERIENCE_2_PERIOD") ?></p>
	   				</div>

	   				<div class="timeline-content">
	   					<h4><?=$lang->get("RESUME_WORK-EXPERIENCE_2_PLACE") ?></h4>
	   					<p><?=$lang->get("RESUME_WORK-EXPERIENCE_2_DESCR") ?></p>
	   				</div>

	   			</div> <!-- /timeline-block -->

	   			<div class="timeline-block">

	   				<div class="timeline-ico">
	   					<i class="fa fa-briefcase"></i>
	   				</div>

	   				<div class="timeline-header">
	   					<h3><?=$lang->get("RESUME_WORK-EXPERIENCE_3_POSITION") ?></h3>
	   					<p><?=$lang->get("RESUME_WORK-EXPERIENCE_3_PERIOD") ?></p>
	   				</div>

	   				<div class="timeline-content">
	   					<h4><?=$lang->get("RESUME_WORK-EXPERIENCE_3_PLACE") ?></h4>
	   					<p><?=$lang->get("RESUME_WORK-EXPERIENCE_3_DESCR") ?></p>
	   				</div>

	   			</div> <!-- /timeline-block -->

	   			<div class="timeline-block">

	   				<div class="timeline-ico">
	   					<i class="fa fa-briefcase"></i>
	   				</div>

	   				<div class="timeline-header">
	   					<h3><?=$lang->get("RESUME_WORK-EXPERIENCE_4_POSITION") ?></h3>
	   					<p><?=$lang->get("RESUME_WORK-EXPERIENCE_4_PERIOD") ?></p>
	   				</div>

	   				<div class="timeline-content">
	   					<h4><?=$lang->get("RESUME_WORK-EXPERIENCE_4_PLACE") ?></h4>
	   					<p><?=$lang->get("RESUME_WORK-EXPERIENCE_4_DESCR") ?></p>
	   				</div>

	   			</div> <!-- /timeline-block -->

   			</div> <!-- /timeline-wrap -->   			

   		</div> <!-- /col-twelve -->
   		
   	</div> <!-- /resume-timeline -->
   	
   	<div class="row resume-timeline">

   		<div class="col-twelve resume-header">

   			<h2><?=$lang->get("RESUME_EDUCATION_H2") ?></h2>

   		</div> <!-- /resume-header -->

   		<div class="col-twelve">

   			<div class="timeline-wrap">

   				<div class="timeline-block">

	   				<div class="timeline-ico">
	   					<i class="fa fa-graduation-cap"></i>
	   				</div>

	   				<div class="timeline-header">
	   					<h3><?=$lang->get("RESUME_EDUCATION_1_SPECIALITY") ?></h3>
	   					<p><?=$lang->get("RESUME_EDUCATION_1_PERIOD") ?></p>
	   				</div>

	   				<div class="timeline-content">
	   					<h4><?=$lang->get("RESUME_EDUCATION_1_PLACE") ?></h4>
	   					<p><?=$lang->get("RESUME_EDUCATION_1_DESCR") ?></p>
	   				</div>

	   			</div> <!-- /timeline-block -->

	   			<div class="timeline-block">

	   				<div class="timeline-ico">
	   					<i class="fa fa-graduation-cap"></i>
	   				</div>

	   				<div class="timeline-header">
	   					<h3><?=$lang->get("RESUME_EDUCATION_2_SPECIALITY") ?></h3>
	   					<p><?=$lang->get("RESUME_EDUCATION_2_PERIOD") ?></p>
	   				</div>

	   				<div class="timeline-content">
	   					<h4><?=$lang->get("RESUME_EDUCATION_2_PLACE") ?></h4>
	   					<p><?=$lang->get("RESUME_EDUCATION_2_DESCR") ?></p>
	   				</div>

	   			</div> <!-- /timeline-block -->

	   			<div class="timeline-block">

	   				<div class="timeline-ico">
	   					<i class="fa fa-graduation-cap"></i>
	   				</div>

	   				<div class="timeline-header">
	   					<h3><?=$lang->get("RESUME_EDUCATION_3_SPECIALITY") ?></h3>
	   					<p><?=$lang->get("RESUME_EDUCATION_3_PERIOD") ?></p>
	   				</div>

	   				<div class="timeline-content">
	   					<h4><?=$lang->get("RESUME_EDUCATION_3_PLACE") ?></h4>
	   					<p><?=$lang->get("RESUME_EDUCATION_3_DESCR") ?></p>
	   				</div>

	   			</div> <!-- /timeline-block -->

   			</div> <!-- /timeline-wrap -->   			

   		</div> <!-- /col-twelve -->
   		
   	</div> <!-- /resume-timeline -->
		
	</section> <!-- /features -->


	<!-- Portfolio Section
   ================================================== -->
	<section id="portfolio">

		<div class="row section-intro">
   		<div class="col-twelve">

   			<h5><?=$lang->get("PORTFOLIO_H5") ?></h5>
   			<h1><?=$lang->get("PORTFOLIO_H1") ?></h1>

   			<p class="lead"><?=$lang->get("PORTFOLIO_P") ?></p>

   		</div>   		
   	</div> <!-- /section-intro--> 

   	<div class="row portfolio-content">

   		<div class="col-twelve">

   			<!-- portfolio-wrapper -->
	         <div id="folio-wrapper" class="block-1-2 block-mob-full stack">

	         	<div class="bgrid folio-item">
					<div class="item-wrap">
	               		<img src="images/portfolio/1_todo_list.jpg" alt="Todo List">
						<a href="#modal-01" class="overlay">	                  	           
							<div class="folio-item-table">
								<div class="folio-item-cell">
									<h3 class="folio-title"><?=$lang->get("PORTFOLIO_1_TITLE") ?></h3>	     					    
									<span class="folio-types">
										<?=$lang->get("PORTFOLIO_1_TYPE") ?>
									</span>
								</div>	                      	
							</div>                    
						</a>
					</div>	               
				</div> <!-- /folio-item -->

				<div class="bgrid folio-item">
					<div class="item-wrap">
						<img src="images/portfolio/2_StarDB.jpg" alt="StarDB screenshot">
						<a href="#modal-02" class="overlay">              		                  
	                     	<div class="folio-item-table">
	                     		<div class="folio-item-cell">
								 	<h3 class="folio-title"><?=$lang->get("PORTFOLIO_2_TITLE") ?></h3>	     					    
									<span class="folio-types">
										<?=$lang->get("PORTFOLIO_2_TYPE") ?>
									</span>     		
								</div> 	                      	
	                     	</div>                    
	                  	</a>
	               	</div>
				</div> <!-- /folio-item -->

	            <div class="bgrid folio-item">
	               <div class="item-wrap">
	               	<img src="images/portfolio/3_pulsometr.jpg"alt="Pulsometr">
	                  <a href="#modal-03" class="overlay">             		                  
	                     <div class="folio-item-table">
	                     	<div class="folio-item-cell">
							 	<h3 class="folio-title"><?=$lang->get("PORTFOLIO_3_TITLE") ?></h3>	     					    
								<span class="folio-types">
									<?=$lang->get("PORTFOLIO_3_TYPE") ?>
								</span>		     		
							</div> 	                      	
	                     </div>                    
	                  </a>
	               </div>
	        		</div> <!-- /folio-item -->

	            <div class="bgrid folio-item">
	               <div class="item-wrap">
	               	<img src="images/portfolio/4_uber.jpg" alt="Uber">
	                  <a href="#modal-04" class="overlay">                  	                 
	                     <div class="folio-item-table">
	                     	<div class="folio-item-cell">
							 	<h3 class="folio-title"><?=$lang->get("PORTFOLIO_4_TITLE") ?></h3>	     					    
								<span class="folio-types">
									<?=$lang->get("PORTFOLIO_4_TYPE") ?>
								</span>		     		
							</div>  	                      	
						</div>                    
	                  </a>
	               </div>
	        		</div> <!-- /folio-item -->     

	            <!-- modal popups - begin
	            ============================================================= -->
	            <div id="modal-01" class="popup-modal slider mfp-hide">	

					<div class="media">
						<img src="images/portfolio/modals/m-1_todo_list.jpg" alt="" />
					</div>      	

					<div class="description-box">
						<h4><?=$lang->get("PORTFOLIO_MODALS_1_H4") ?></h4>		      
						<p><?=$lang->get("PORTFOLIO_MODALS_1_P") ?></p>
						<p>
							<a href="https://github.com/Paul7967/todo" target="_blank"><u><?=$lang->get("PORTFOLIO_MODALS_A_GITHUB") ?></u></a>
						</p>
						<div class="categories"><?=$lang->get("PORTFOLIO_MODALS_1_CATEGORY") ?></div>			               
					</div>

					<div class="link-box">
						<a href="http://www.todolist.pavelostatochnikov.ru" target="_blank"><?=$lang->get("PORTFOLIO_MODALS_BTN_DETAILS") ?></a>
						<a href="#" class="popup-modal-dismiss"><?=$lang->get("PORTFOLIO_MODALS_BTN_CLOSE") ?></a>
					</div>		      

				</div> <!-- /modal-01 -->

					<div id="modal-02" class="popup-modal slider mfp-hide">	

				     	<div class="media">
				     		<img src="images/portfolio/modals/m-2_StarDB.jpg" alt="" />
				     	</div>      	

					   <div class="description-box">
					  	<h4><?=$lang->get("PORTFOLIO_MODALS_2_H4") ?></h4>		      
						<p><?=$lang->get("PORTFOLIO_MODALS_2_P") ?></p>
						<p>
							<a href="https://github.com/Paul7967/star-db" target="_blank"><u><?=$lang->get("PORTFOLIO_MODALS_A_GITHUB") ?></u></a>
						</p>
						<div class="categories"><?=$lang->get("PORTFOLIO_MODALS_2_CATEGORY") ?></div>			               
						</div>

					<div class="link-box">
						<a href="http://www.stardb.pavelostatochnikov.ru" target="_blank"><?=$lang->get("PORTFOLIO_MODALS_BTN_DETAILS") ?></a>
						<a href="#" class="popup-modal-dismiss"><?=$lang->get("PORTFOLIO_MODALS_BTN_CLOSE") ?></a>
					</div>	      

				   </div> <!-- /modal-02 -->

				   <div id="modal-03" class="popup-modal slider mfp-hide">	

				     	<div class="media">
				     		<img src="images/portfolio/modals/m-3_pulsometr.jpg" alt="" />
				     	</div>      	

					   	<div class="description-box">
					   		<h4><?=$lang->get("PORTFOLIO_MODALS_3_H4") ?></h4>		      
							<p><?=$lang->get("PORTFOLIO_MODALS_3_P") ?></p>
							<p>
								<a href="https://github.com/Paul7967/pulsometr" target="_blank"><u><?=$lang->get("PORTFOLIO_MODALS_A_GITHUB") ?></u></a>
							</p>
					      	<div class="categories"><?=$lang->get("PORTFOLIO_MODALS_3_CATEGORY") ?></div>			               
					   </div>

			         	<div class="link-box">
			            	<a href="http://www.dd.pavelostatochnikov.ru" target="_blank"><?=$lang->get("PORTFOLIO_MODALS_BTN_DETAILS") ?></a>
							<a href="#" class="popup-modal-dismiss"><?=$lang->get("PORTFOLIO_MODALS_BTN_CLOSE") ?></a>
			         	</div>		      

				   </div> <!-- /modal-03 -->

				   <div id="modal-04" class="popup-modal slider mfp-hide">	

				     	<div class="media">
				     		<img src="images/portfolio/modals/m-4_uber.jpg" alt="" />
				     	</div>      	

					   	<div class="description-box">
					   		<h4><?=$lang->get("PORTFOLIO_MODALS_4_H4") ?></h4>		      
							<p><?=$lang->get("PORTFOLIO_MODALS_4_P") ?></p>
							<p>
								<a href="https://github.com/Paul7967/uber" target="_blank"><u><?=$lang->get("PORTFOLIO_MODALS_A_GITHUB") ?></u></a>
							</p>
					      	<div class="categories"><?=$lang->get("PORTFOLIO_MODALS_4_CATEGORY") ?></div>			               
					   	</div>

			         	<div class="link-box">
					      	<a href="http://www.uber.pavelostatochnikov.ru" target="_blank"><?=$lang->get("PORTFOLIO_MODALS_BTN_DETAILS") ?></a>
							<a href="#" class="popup-modal-dismiss"><?=$lang->get("PORTFOLIO_MODALS_BTN_CLOSE") ?></a>
			         	</div>		      

				   </div> <!-- /modal-04 -->

				   <!-- modal popups - end
	            ============================================================= -->

	         </div> <!-- /portfolio-wrapper --> 

   		</div>  <!-- /twelve -->   

   	</div> <!-- /portfolio-content --> 
		
	</section> <!-- /portfolio --> 


	<!-- services Section
   ================================================== -->
	<section id="services" style="display: none"> 
		 <!-- отключил этот фрагмент через display: none -->

		<div class="overlay"></div>

		<div class="row section-intro">
			<div class="col-twelve">

				<h5>Услуги</h5>
				<h1>Чем я могу быть вам полезен?</h1>

				<p class="lead">Lorem ipsum Do commodo in proident enim in dolor cupidatat adipisicing dolore officia nisi aliqua incididunt Ut veniam lorem ipsum Consectetur ut in in eu do.</p>

			</div>   		
		</div> <!-- /section-intro -->

		<div class="row services-content">

			<div id="owl-slider" class="owl-carousel services-list">

				<div class="service">	

					<span class="icon"><i class="icon-earth"></i></span>            

					<div class="service-content">	

						<h3>Webdesign</h3>

						<p class="desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
						</p>
						
					</div> 	         	 

					</div> <!-- /service -->

					<div class="service">	

						<span class="icon"><i class="icon-window"></i></span>                          

					<div class="service-content">	

						<h3>Web Development</h3>  

						<p class="desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
						</p>

					</div>	                          

				</div> <!-- /service -->

				<div class="service">

					<span class="icon"><i class="icon-paint-brush"></i></span>		            

					<div class="service-content">

						<h3>Branding</h3>

						<p class="desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
							</p> 

					</div> 	            	               

				</div> <!-- /service -->

					<div class="service">

						<span class="icon"><i class="icon-toggles"></i></span>	              

					<div class="service-content">

						<h3>UI/UX Design</h3>

						<p class="desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
						</p> 
						
					</div>                

					</div> <!-- /service -->

				<div class="service">

					<span class="icon"><i class="icon-image"></i></span>	            

					<div class="service-content">

						<h3>Graphics Design</h3>

						<p class="desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
							</p> 

					</div>	               

				</div> <!-- /service -->

				<div class="service">

					<span class="icon"><i class="icon-chat"></i></span>	   	           

					<div class="service-content">

						<h3>Consultancy</h3>

						<p class="desc">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
							</p> 
							
					</div>	               

				</div> <!-- /service -->

			</div> <!-- /services-list -->
			
		</div> <!-- /services-content -->
		
	</section> <!-- /services -->	


	<!-- stats Section
   ================================================== -->
	<section id="stats" class="count-up">

		<div class="row">
			<div class="col-twelve">

				<div class="block-1-6 block-s-1-3 block-tab-1-2 block-mob-full stats-list">

					<div class="bgrid stat">

						<div class="icon-part">
							<i class="icon-pencil-ruler"></i>
						</div>

						<h3 class="stat-count">
							8
						</h3>

						<h5 class="stat-title">
							<?=$lang->get("STATS_H5_PROJECTS") ?>
						</h5>

					</div> <!-- /stat -->					

					<div class="bgrid stat">

						<div class="icon-part">
							<i class="icon-users"></i>
						</div>

						<h3 class="stat-count">
							3
						</h3>

						<h5 class="stat-title">
							<?=$lang->get("STATS_H6_CLIENTS") ?>
						</h5>

					</div> <!-- /stat -->

					<div class="bgrid stat">

						<div class="icon-part">
							<i class="icon-badge"></i>
						</div>

						<h3 class="stat-count">
							10
						</h3>

						<h5 class="stat-title">
							<?=$lang->get("STATS_H7_AWARDS") ?>
						</h5>

					</div> <!-- /stat -->									

					<div class="bgrid stat">

						<div class="icon-part">
							<i class="icon-light-bulb"></i>
						</div>

						<h3 class="stat-count">
							1000
						</h3>

						<h5 class="stat-title">
							<?=$lang->get("STATS_H8_IDEAS") ?>
						</h5>

					</div> <!-- /stat -->

					<div class="bgrid stat">

						<div class="icon-part">
							<i class="icon-cup"></i>
						</div>

						<h3 class="stat-count">
							1100
						</h3>

						<h5 class="stat-title">
							<?=$lang->get("STATS_H9_COFFEE_CUPS") ?>
						</h5>

					</div> <!-- /stat -->

					<div class="bgrid stat">

						<div class="icon-part">
							<i class="icon-clock"></i>
						</div>

						<h3 class="stat-count">
							11000
						</h3>

						<h5 class="stat-title">
							<?=$lang->get("STATS_H10_HOURS") ?>
						</h5>

					</div> <!-- /stat -->

				</div> <!-- /stats-list -->

			</div> <!-- /twelve -->
		</div> <!-- /row -->

	</section> <!-- /stats -->

	
   <!-- contact
   ================================================== -->
	<section id="contact">

		<div class="row section-intro">
			<div class="col-twelve">

				<h5><?=$lang->get("CONTACT_H5") ?></h5>
				<h1><?=$lang->get("CONTACT_H1") ?></h1>

				<p class="lead"><?=$lang->get("CONTACT_P") ?></p>

			</div> 
		</div> <!-- /section-intro -->

		<div class="row contact-info">

			<div class="col-four tab-full">

				<div class="icon">
					<i class="icon-pin"></i>
				</div>

				<h5><?=$lang->get("CONTACT_ADDRESS_H5") ?></h5>

				<p><?=$lang->get("CONTACT_ADDRESS_P") ?></p>

			</div>

			<div class="col-four tab-full collapse">

				<div class="icon">
					<i class="icon-mail"></i>
				</div>

				<h5><?=$lang->get("CONTACT_EMAIL_H5") ?></h5>

				<p><?=$lang->get("CONTACT_EMAIL_P") ?></p>

			</div>

			<div class="col-four tab-full">

				<div class="icon">
					<a href="https://wa.me/79058229729?text=Сообщение%с%сайта%pavelostatochnikov.ru" target="_blank"><i class="fa fa-whatsapp"></i></a>
				</div>

				<h5><?=$lang->get("CONTACT_WHATSAPP_H5") ?></h5>

				<p><?=$lang->get("CONTACT_WHATSAPP_P") ?></p>

			</div>
			
		</div> <!-- /contact-info -->

	</section> <!-- /contact -->


   <!-- footer
   ================================================== -->

   <footer>
     	<div class="row">

     		<div class="col-six tab-full pull-right social">

     			<ul class="footer-social">        
					<li><a href="https://www.linkedin.com/in/pavel-o/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="https://www.facebook.com/profile.php?id=100014807746891" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<li><a href="https://vk.com/ostatochnikov85"><i class="fa fa-vk" target="_blank"></i></a></li>
					<li><a href="https://www.instagram.com/pavel_ostatochnikov/" target="_blank"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://wa.me/79058229729?text=Сообщение%с%сайта%pavelostatochnikov.ru"><i class="fa fa-whatsapp"></i></a></li>
				</ul> 
	      		
	      </div>

      	<div class="col-six tab-full">
	      	<div class="copyright">
		        	<span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>	         	
		         </div>		                  
	      	</div>

	      	<div id="go-top">
		         <a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-long-arrow-up"></i></a>
		      </div>

      	</div> <!-- /row -->     	
   </footer>  

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/main.js"></script>

</body>

</html>