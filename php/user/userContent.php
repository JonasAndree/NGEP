
<div id="user-container">
	<div id="user-content">
    	<div id="user-headers">
    		<div id="user-login-header">
    	    	<button class='nav-item nav-paranet' onclick="logMeIn()">
    	    		Login
    	    		<span class='arrow'><span></span></span>
    	    	</button>
    		</div>
    		<div id="user-register-header">
            	<div class='nav-item nav-paranet tooltip' onclick='showLogin()'>
            		Register		
            		<span class='tooltiptext'>Go back to loggin.</span>
            		
            		<div class='animate-arrow'>
            			<span class='arrow back'><span></span></span>
            		</div>
            	</div>
    		</div>
    		<div id="user-user-header">
        		<div class='nav-item nav-paranet tooltip' onclick='logout()'>
                    <span class='tooltiptext'>Sign out</span>
                    Logged in
                    <div class='animate-arrow'>
                    	<span class='arrow back'><span></span></span>
                	</div>
                </div>
    		</div>
    	</div>
    	
		<div id="user-wrapper">
			<div id="loggin-container">
				<div id="log-con">
                    <form id="loggin-form"
                    	  class="reg-log-form" 
                          action="php/user/login/login.php"
                    	  method="post" 
      					  enctype="multipart/form-data">
                    	Mail: <br>
                    	<input class="form-input nav-item" type="email" name="mail" placeholder="Your email" required>
                    	<br> 
                    	Password: 
                    	<input class="nav-item form-input" type="password" name="password" placeholder="Your password" required><br> 
                    </form>
                     <!-- <button id="submit" class="submit-form nav-item" onclick="logMeIn()">Login</button>
                    <button class="clear-form nav-item" type="reset">Clear</button>
                    -->
                </div>
				<div id="show-regiser" class="nav-item" onclick="showRegister()">
    				<div class='animate-arrow'>
    					Register
                    	<span class='arrow'><span></span></span>
                	</div>
				</div>
			</div>
			<div id="register-container">
    			<div id="reg-con">
                    <form id="register-form"
                    	  class="reg-log-form" 
                    	  action="php/user/login/register.php" 
                    	  method="post">
                    	<br>
                    	Firstname: 
                    	<input class="form-input nav-item" type="text" name="firstname" required>
                    	<br> 
                    	Lastname:
                    	<input class="form-input nav-item" type="text" name="lastname" required>
                    	<br> 
                    	Mail: 
                    	<input class="form-input nav-item" type="email" name="mail" required>
                    	<br> 
                    	Password: 
                    	<input class="form-input nav-item" type="password" name="password" required>
                    	<br> 
                    	Verify password: 
                    	<input class="form-input nav-item" type="password" name="passwordv" required>
                    	<br> 
                    	Position
                    	<select class="form-input nav-item" name="position" required>
                            <option value="Student" selected>Student</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                        <?php include "getSchools.php"; ?>
                    	<button class="submit-form nav-item" type="submit">Register</button>
                      	<button class="clear-form nav-item" type="reset">Clear</button>
                    </form>
                </div>
    		</div>
    		
    		<div id="user-info">
    			<div id="user-in" >
                	<div id="user-stats">
                		<div id="up-con">
                		
                		</div>
                	</div>
        		</div>
    		</div>
		</div>
	</div>
</div>