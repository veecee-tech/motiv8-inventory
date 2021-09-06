<?php
require 'config.php';
require 'inc/session.php';
require 'inc/users_core.php';
if($_session->isLogged() == false)
	header('Location: index.php');

$_page = 17;

$role = $_session->get_user_role();
$role = $_session->get_user_role();
if($role == 3)
	header('Location: check-out.php');
if(!isset($_GET['id']))
	header('Location: users.php');
$user = $_users->get_user($_GET['id']);
if(!$user->id)
	header('Location: users.php');

// Only admins can view details of admins and general supervisors
if($user->role == 1 || $user->role == 2) {
	if($role != 1)
		header('Location: users.php');
}

// Only admins and general supervisors can view details of supervisors and employees
if($user->role == 3) {
	if($role != 1 && $role != 2)
		header('Location: users.php');
}

// Only admins, general supervisors and supervisors can view details of employees
if($user->role == 3) {
	if($role != 1 && $role != 2 && $role != 3)
		header('Location: users.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<?php require 'inc/head.php'; ?>
</head>
<body>
	<div id="main-wrapper">
		<?php require 'inc/header.php'; ?>
		
		<div class="wrapper-pad">
			<h2>User Details</h2>
			<div class="center">
				<div class="new-item form">
					User ID:<br />
					<div class="ni-cont light">
						<?php echo $user->id; ?><br /><br />
					</div>
					Name:<br />
					<div class="ni-cont light">
						<?php echo $user->name; ?><br /><br />
					</div>
					Username:<br />
					<div class="ni-cont light">
						<?php echo $user->username; ?><br /><br />
					</div>
					Email:<br />
					<div class="ni-cont light">
						<?php echo $user->email; ?><br /><br />
					</div>
					Role:<br />
					<div class="ni-cont light">
						<?php
						$r = $user->role;
						if($r == '1')
							echo 'Manager';
						elseif($r == '2')
							echo 'Assistant Manager';
						elseif($r == '3')
							echo 'Cashier';
						?>
						<br /><br />
					</div>
					Member Since:<br />
					<div class="ni-cont light">
						<?php echo $user->date_added; ?><br /><br />
					</div>
				</div>
			</div>
		</div>
		
		<div class="clear" style="margin-bottom:40px;"></div>
		<div class="border" style="margin-bottom:30px;"></div>
	</div>
</body>
</html>