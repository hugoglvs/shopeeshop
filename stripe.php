<?php

require_once "vendor/autoload.php";
require_once "includes/stripe_private_key.php";

$publicKey = "pk_test_51OFyihGL1HwwBRENhmge6s1jf0QJC55bjBn6IqWiSnTtyA3l6BTRBwM4NQBHm4dvzgCbIjkBrUAUUJMCYYHawirZ00dVT880cS";

$stripe = new \Stripe\StripeClient($privateKey);
