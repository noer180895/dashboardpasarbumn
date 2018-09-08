<?php
/**
 * Initiate Doku data's
 */
class Doku_Initiate {
	 
	//local
	const prePaymentUrl = 'http://staging.doku.com/api/payment/PrePayment';
	const paymentUrl = 'http://staging.doku.com/api/payment/paymentMip';
	const directPaymentUrl = 'http://staging.doku.com/api/payment/PaymentMIPDirect';
	const generateCodeUrl = 'http://staging.doku.com/api/payment/doGeneratePaymentCode';

	public static $sharedKey; //doku's merchant unique key
	public static $mallId; //doku's merchant id

}
