
<div id="user-container">
	<div id="user-content">
		<div id="user-wrapper">
			<div id="loggin-container">
				<?php include "../php/login.php"; ?>
				<div id="show-regiser" class="nav-item" onclick="showRegister()">
    				<div class='animate-arrow'>
    					Register
                    	<span class='arrow'><span></span></span>
                	</div>
				</div>
			</div>
    		<div id="register-container">
    			<?php include "../php/register.php"; ?> 
    		</div>
    		<div id="user-info">
    			<div id="user-in" >
                	<div id="user-stats">
                	</div>
                	Birthdate:  
                	<input class="form-input nav-item" type="date" name="birthdate">
        		</div>
    		</div>
		</div>
	</div>
</div>
<?php
?>