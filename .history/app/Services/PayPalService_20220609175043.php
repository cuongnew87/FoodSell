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

    public function __construct()
    {
    	// Đọc các cài đặt trong file config
        $paypalConfigs = config('paypal');

        // Khởi tạo ngữ cảnh
        $this->apiContext = new ApiContext(
        	new OAuthTokenCredential(
            	$paypalConfigs['client_id'],
                $paypalConfigs['secret']
            )
        );

        // Set mặc định đơn vị tiền để thanh toán
        $this->paymentCurrency = "USD";

        // Khởi tạo total amount
        $this->totalAmount = 0;
    }

    	/**
     * Set payment currency
     *
     * @param string $currency String name of currency
     * @return self
     */
	public function setCurrency($currency)
    {
    	$this->paymentCurrency = $currency;

        return $this;
    }

    /**
     * Get current payment currency
     *
     * @return string Current payment currency
     */
    public function getCurrency()
    {
        return $this->paymentCurrency;
    }

    	/**
     * Add item to list
     *
     * @param array $itemData Array item data
     * @return self
     */
    public function setItem($itemData)
    {
        // Kiểm tra xem item được thêm vào là một hay một
        // mảng các item. Nếu chỉ là 1 item, thì chúng ta sẽ
        // cho nó thành một mảng item rồi foreach. Việc này giúp
        // chúng ta có thể thêm một hay nhiều item cùng lúc
        if (count($itemData) === count($itemData, COUNT_RECURSIVE)) {
            $itemData = [$itemData];
        }

        // Duyệt danh sách các item
        foreach ($itemData as $data) {
        	// Khởi tạo item
            $item = new Item();

            // Set tên của item
            $item->setName($data['name'])
                 ->setCurrency($this->paymentCurrency) // Đơn vị tiền của item
                 ->setSku($data['sku']) // ID của item
                 ->setQuantity($data['quantity']) // Số lượng
                 ->setPrice($data['price']); // Giá
			// Thêm item vào danh sách
            $this->itemList[] = $item;
            // Tính tổng đơn hàng
            $this->totalAmount += $data['price'] * $data['quantity'];
        }

        return $this;
    }

    /**
     * Get list item
     *
     * @return array List item
     */
    public function getItemList()
    {
        return $this->itemList;
    }

    	/**
     * Add item to list
     *
     * @param array $itemData Array item data
     * @return self
     */
    public function setItem($itemData)
    {
        // Kiểm tra xem item được thêm vào là một hay một
        // mảng các item. Nếu chỉ là 1 item, thì chúng ta sẽ
        // cho nó thành một mảng item rồi foreach. Việc này giúp
        // chúng ta có thể thêm một hay nhiều item cùng lúc
        if (count($itemData) === count($itemData, COUNT_RECURSIVE)) {
            $itemData = [$itemData];
        }

        // Duyệt danh sách các item
        foreach ($itemData as $data) {
        	// Khởi tạo item
            $item = new Item();

            // Set tên của item
            $item->setName($data['name'])
                 ->setCurrency($this->paymentCurrency) // Đơn vị tiền của item
                 ->setSku($data['sku']) // ID của item
                 ->setQuantity($data['quantity']) // Số lượng
                 ->setPrice($data['price']); // Giá
			// Thêm item vào danh sách
            $this->itemList[] = $item;
            // Tính tổng đơn hàng
            $this->totalAmount += $data['price'] * $data['quantity'];
        }

        return $this;
    }

    /**
     * Get list item
     *
     * @return array List item
     */
    public function getItemList()
    {
        return $this->itemList;
    }

    	/**
     * Get total amount
     *
     * @return mixed Total amount
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    





