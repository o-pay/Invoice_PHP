<?php
try
	{
		$sMsg = '' ;
// 1.載入SDK程式
		include_once('AllPay_Invoice.php') ;
		$allpay_invoice = new AllInvoice ;
		
// 2.寫入基本介接參數
		$allpay_invoice->Invoice_Method 		= 'ALLOWANCE_VOID';
		$allpay_invoice->Invoice_Url 			= 'https://einvoice-stage.opay.tw/Invoice/AllowanceInvalid' ;
		$allpay_invoice->MerchantID 			= '2000132' ;
		$allpay_invoice->HashKey 			= 'ejCk326UnaZWKisg' ;
		$allpay_invoice->HashIV 			= 'q9jcZX8Ib9LM8wYk' ;
		
// 3.寫入發票相關資訊
		$allpay_invoice->Send['InvoiceNo'] 		= 'AL00001858';
		$allpay_invoice->Send['Reason'] 		= 'AllowanceInvalid';
		$allpay_invoice->Send['AllowanceNo'] 		= '2015112311138202';
// 4.送出
		$aReturn_Info = $allpay_invoice->Check_Out();
// 5.返回
		foreach($aReturn_Info as $key => $value)
		{
			$sMsg .=   $key . ' => ' . $value . '<br>' ;
		}
	}
	catch (Exception $e)
	{
		// 例外錯誤處理。
		$sMsg = $e->getMessage();
	}
	echo $sMsg ;
?>
