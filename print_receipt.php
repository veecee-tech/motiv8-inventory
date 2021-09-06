<?php
require 'config.php';
require 'inc/session.php';

if($_session->isLogged() == false)
	header('Location: index.php');

$_page = 8;

$role = $_session->get_user_role();
?>




<!DOCTYPE HTML>
<html>
<head>
<?php require 'inc/head.php'; ?>

  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' /> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
  <style>
	  @media print {
    body {display:none};
    #printArea {display: block};
}
  </style>
</head>
<body>
	<div id="main-wrapper">
		<?php require 'inc/header.php'; ?>
		
		<div class="wrapper-pad" >
		
			<form action="" method="post">
			Enter Number of Product purchased <input type="number" name="vall" id=""><input type="submit" name="sub" value="Enter">
			</form>
			<!-- Modal -->

				<div id="printArea">
					  <form action="" method="get"></form>
						<table id="tblProducts">
								<thead>
									<tr>
									<td>Product</td>
									<td>Quantity</td>
									<td>Price</td>
									<td>Sub-Total</td>
									</tr>
								</thead>
							<?php 

								if(isset($_POST['sub'])){
									$i = 0;
									for($i; $i < $_POST['vall']; $i++ ){
							?>
								<tr>
									<td><input type="text" class="pnm" name="pnm" /></td>
									<td><input type="text" class="qty" name="qty"/></td>
									<td><input type="text" class="price" name="price"/></td>
									<td><input type="text" class="subtot" value="0" name="subtot"/></td>
								</tr>
							<?php
						}} 
						?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><input type="text" class="grdtot" value="" name=""/></td>
								</tr>
							
						</table>
					
      		</div>
					</form>
      
        	<button id="btnP" type="button" class="btn btn-primary">Print</button>
		
		</div>
	</div>
	
	<script>
		$(document).ready(function(){
			$('#btnP').click(function(){
				var divContents = $("#printArea").html();
				var name = "invento"
				var i = 0;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > ');
			a.document.write(name+(Math.random(4)+1));
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
			});
            
        
		});
        
    </script>
	
    <script type="text/javascript">
        $(document).ready(function () {
            $('.subtot, .grdtot').prop('readonly', true);
            var $tblrows = $("#tblProducts tbody tr");

            $tblrows.each(function (index) {
                var $tblrow = $(this);

                $tblrow.find('.qty, .price').on('keyup', function () {

                    var qty = $tblrow.find("[name=qty]").val();
                    var price = $tblrow.find("[name=price]").val();
                    var subTotal = parseInt(qty, 10) * parseFloat(price);

                    if (!isNaN(subTotal)) {

                        $tblrow.find('.subtot').val(subTotal.toFixed(2));
                        var grandTotal = 0;

                        $(".subtot").each(function () {
                            var stval = parseFloat($(this).val());
                            grandTotal += isNaN(stval) ? 0 : stval;
                        });

                        $('.grdtot').val(grandTotal.toFixed(2));
                    }
                });
            });
        });
    </script>
			
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>