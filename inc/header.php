<?php
$headrole = $_session->get_user_role();
if($headrole == 1)
	$as = 'Manager';
elseif($headrole == 2)
	$as = 'General Supervisor';
elseif($headrole == 3)
	$as = 'Cashier';

?>
<div id="header">
			<div class="left">
				<a href="home.php"><img src="media/img/logo3x.png" width="150" height="50" alt="Invento" /></a>
				<div style="font-size:12px; font-style:italic;color:#bbb;"><?php echo $as; ?></div>
			</div>
			<div class="right">
				<?php
				if($headrole == 1)
					echo '<a href="users.php" title="Users">Users</a>|';
				?>
				<a href="settings.php" title="Settings">Settings</a>|
				<a href="logout.php" title="Logout">Logout</a>
			</div>
			<div class="clear"></div>
		</div>
		
		<input type="checkbox" class="toggle" id="opmenu" style="display:none"/>
		<label for="opmenu" id="open-menu"><i class="fa fa-align-justify"></i> Menu</label>
		<div id="menu">
			<ul id="menuli">
				<?php
				// Home only for Admin and General Supervisor (Stats)
				if($headrole == 1 || $headrole == 2) {
				?>
					<li<?php if($_page == 1) { ?> class="active"<?php } ?>><a href="home.php" title="Home"><i class="fa fa-home"></i> Home</a></li>
				<?php
				}
				?>
				
				<?php
				// Add Item only for Admin, General Supervisor and Supervisor
				if($headrole == 1 || $headrole == 2 ){
				?>
					<li<?php if($_page == 2) { ?> class="active"<?php } ?>><a href="new-item.php" title="New Item"><i class="fa fa-plus"></i> New Item</a></li>
					<li<?php if($_page == 3) { ?> class="active"<?php } ?>><a href="items.php" title="Items"><i class="fa fa-list-ul"></i> Items</a></li>
				<li<?php if($_page == 4) { ?> class="active"<?php } ?>><a href="check-in.php" title="Check-In Item"><i class="fa fa-arrow-down"></i> Check-In Item</a></li>
			<?php
				}
				?>
				
			
				<li<?php if($_page == 5) { ?> class="active"<?php } ?>><a href="check-out.php" title="Check-Out Item"><i class="fa fa-arrow-up"></i> Check-Out Item</a></li>
				
				<?php
				// Add Item only for Admin, General Supervisor and Supervisor
				if($headrole == 1 || $headrole == 2 ){
				?>
					<li<?php if($_page == 6) { ?> class="active"<?php } ?>><a href="logs.php" title="Logs"><i class="fa fa-file-alt"></i> Logs</a></li>
					<li<?php if($_page == 7) { ?> class="active"<?php } ?>><a href="categories.php" title="Categories"><i class="fa fa-folder"></i> Categories</a></li>
				<?php
				}
				?>
				
				<li<?php if($_page == 8) { ?> class="active"<?php } ?>><a href="print_receipt.php" title="print_receipt"><i class="fa fa-print"></i> </a></li>

			</ul>
		</div>