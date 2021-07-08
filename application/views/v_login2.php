<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>PIL-KB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style3.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/animate-custom.css" />
        
    </head>
    <body>
        
        <div class="container">
            <!-- Codrops top bar -->
           
            <header>
                <h1>Login ke <span>PIL-KB</span></h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action=<?php echo base_url("login/aksi_login"); ?> autocomplete="on" method="POST"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="username" data-icon="u" > Your NIM </label>
                                    <input id="nim" name="nim" required="required" type="text" placeholder="Masukkan NIM"/>
                                </p>
                                <p> 
                                    <label for="password" class="password" data-icon="p"> Your password </label>
                                    <input id="Password" name="Password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action=<?php echo base_url("login/signup"); ?> autocomplete="on" method="POST"> 
                                <h1> Register </h1> 
                                <p> 
                                    <label for="nama" class="nama" data-icon="u" >Nama Lengkap</label>
                                    <input id="Nama" name="nama" required="required" type="text" placeholder="Nama"/> 
                                </p>
                                <p> 
                                    <label for="nim" class="nim"  >NIM</label>
                                    <input id="NIM" name="nim" required="required" type="text" placeholder="NIM"/> 
                                </p>
                                <p> 
                                    <label for="email" class="email" data-icon="e">Email </label>
                                    <input id="Email" name="email" pattern="^[a-zA-Z0-9]+@student\.ub.ac.id$" required type="email" placeholder="Email"/>
                                </p>
                            
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="Password" name="password" required="required" type="password" placeholder="xxx"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="xxx"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>