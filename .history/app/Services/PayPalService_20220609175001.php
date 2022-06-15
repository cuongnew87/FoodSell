<?php

namespace App\Services;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\Payer;
use PayPal\Api\PaymentExecution;
use Request;

class PayPalService
{
	// Chứa context của API
	private $apiContext;
    // Chứa danh sách các item (mặt hàng)
    private $itemList;
    // Đơn vị tiền thanh toán
    private $paymentCurrency;
    // Tổng tiền của đơn hàng
    private $totalAmount;
    // Đường dẫn để xử lý một thanh toán thành công
    private $returnUrl;
    // Đường dẫn để xử lý khi người dùng bấm cancel (không thanh toán)
    private $cancelUrl;
