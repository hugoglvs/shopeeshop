<?php

require_once "vendor/autoload.php";

$publicKey = "pk_test_51OFyihGL1HwwBRENhmge6s1jf0QJC55bjBn6IqWiSnTtyA3l6BTRBwM4NQBHm4dvzgCbIjkBrUAUUJMCYYHawirZ00dVT880cS";
$privateKey = "sk_test_51OFyihGL1HwwBRENjwvwEBRjadgrTJ0sszba3Dz4cE5xKEuZiepz7i4P8HROzgbs9lVsM6sRWePckGMKKnfDNxCg00oFbJx2ZL";

$stripe = new \Stripe\StripeClient($privateKey);