<?php

require_once dirname(__FILE__).'/RPCBitcoin.php';

$bitcoin = new RPCBitcoin('user', 'password');
print_r($bitcoin->getBalance());

?>