<?php
include 'inc/header.php';

?>


 <div class="main">
     <div class="content">      	
    		<h2 style="color:blue;">Chọn cổng thanh toán</h2>  
    		<form action="donhangthanhtoanonline.php?congthanhtoan=vnpay" method="POST">
    			<button class="btn_thanhtoan" name="redirect" id="redirect" style="width: 200px;margin-top: 5px;background:#FFCCFF ;">Thanh toán VNPAY</button></br>
    			<button class="btn_thanhtoan_1" name="redirect" id="redirect"style="width: 200px;margin-top: 5px;background:#FFCCFF;">Thanh toán MOMO</button></br>
    			<button class="btn_thanhtoan_1" name="redirect" id="redirect"style="width: 200px;margin-top: 5px;background:#FFCCFF;">Thanh toán ONEPAY</button></br>
    			<button class="btn_thanhtoan_1" name="redirect" id="redirect"style="width: 200px;margin-top: 5px;background:#FFCCFF;">Thanh toán PAYPAL</button></br>
    		</form> 		
    </div>
 </div>

 <?php
include 'inc/footer.php';

?>

<!-- vnp_Amount=250000000&vnp_BankCode=NCB&vnp_BankTranNo=VNP13853542&vnp_CardType=ATM&vnp_OrderInfo=Thanh+toán+đơn+hàng+quan+VNPAY&vnp_PayDate=20221010201354&vnp_ResponseCode=00&vnp_TmnCode=IGJVUYDB&vnp_TransactionNo=13853542&vnp_TransactionStatus=00&vnp_TxnRef=1665407614&vnp_SecureHash=faa56f99af3cb06247fb97336e01b0b8f5b55ea5a7021bf315bb2bf59887a60236ef54e1dd03d5284e46273657c1f9469d4c3622547853a284e73ed455cb6e1a -->
