<?php
require_once dirname(__FILE__).'/jsonRPCClient.php';

class RPCBitcoin {

    private $_rpc;
    public function __construct($username, $password, $scheme = 'http', $address = "127.0.0.1", $port = 8332, $certificate_path = '', $debug_level = 0) {
        $scheme = strtolower($scheme);
        $this->_rpc = new jsonRPCClient($scheme."://".$username.":".$password."@".$address.":".$port."/");
    }

    public function getNewAddress($account = null) {
        return $this->_rpc->getnewaddress($account);
    }

    public function getAddressesByAccount($account) {
        return $this->_rpc->getaddressesbyaccount($account);
    }

    public function addMultiSigAddress($nrequired, $keys, $account = null) {
        $this->_rpc->addmultisigaddress($nrequired, $keys, $account);
    }

    public function createMultiSig($nrequired, $keys) {
        $this->_rpc->addmultisigaddress($nrequired, $keys);
    }

    public function addNode($node, $action = 'add') {
        $this->_rpc->addnode($node, $action);
    }

    public function backupWallet($filename) {
        $this->_rpc->backupwallet($filename);
    }

    public function createRawTransaction() {
        //TODO
    }

    public function decodeRawTransaction($hexstring) {
        return $this->_rpc->decoderawtransaction($hexstring);
    }

    public function dumpPrivKey($address) {
        return $this->_rpc->dumpprivkey($address);
    }

    public function encryptWallet($passphrase) {
        return $this->_rpc->encryptwallet($passphrase);
    }

    public function getAccount($address) {
        return $this->_rpc->getaccount($address);
    }

    public function getAccountAddress($account) {
        return $this->_rpc->getaccountaddress($account);
    }

    public function getAddedNodeInfo($dns, $node) {
        return $this->_rpc->getaddednodeinfo($dns, $node);
    }

    public function getBalance($account = null) {
        if($account==null) {
            return $this->_rpc->getbalance();
        } else {
            return $this->_rpc->getbalance($account);
        }
    }

    public function getBestBlockHash() {
        return $this->_rpc->getbestblockhash();
    }

    public function getBlock($hash) {
        return $this->_rpc->getBlock($hash);
    }

    public function getBlockCount() {
        return $this->_rpc->getblockcount();
    }

    public function getBlockHash($index) {
        return $this->_rpc->getblockhash($index);
    }

    public function getBlockNumber() {
        return $this->_rpc->getblocknumber(); // DEPRECATED
    }

    public function getBlockTemplate($params) {
        return $this->_rpc->getblocktemplate($params);
    }

    public function getConnectionCount() {
        return $this->_rpc->getconnectioncount();
    }

    public function getDifficulty() {
        return $this->_rpc->getDifficulty();
    }

    public function getGenerate() {
        return $this->_rpc->getGenerate();
    }

    public function getHashesPerSec() {
        return $this->_rpc->gethashespersec();
    }

    public function getInfo() {
        return $this->_rpc->getinfo();
    }

    public function getMemoryPool($data) {
        return $this->_rpc->getmemorypool($data);
    }

    public function getMiningInfo() {
        return $this->_rpc->getmininginfo();
    }

    public function getPeerInfo() {
        return $this->_rpc->getpeerinfo();
    }

    public function getRawChangeAddress($account) {
        return $this->_rpc->getrawchangeaddress($account);
    }

    public function getRawMemPool() {
        return $this->_rpc->getrawmempool();
    }

    public function getRawTransaction($txid) {
        return $this->_rpc->getrawtransaction($txid);
    }

    public function getReceivedByAccount($account) {
        $this->_rpc->getreceivedbyaccount($account);
    }

    public function getReceivedByAddress($address) {
        $this->_rpc->getreceivedbyaddress($address);
    }

    public function getTransaction($txid) {
        return $this->_rpc->gettransaction($txid);
    }

    public function getTxOut($txid, $n, $includemempool = true) {
        return $this->_rpc->gettxout($txid, $n, $includemempool);
    }

    public function getTxOutSetInfo() {
        return $this->_rpc->gettxoutsetinfo();
    }

    public function getWork($data) {
        return $this->_rpc->getwork($data);
    }

    public function help($command) {
        return $this->_rpc->help($command);
    }

    public function importPrivKey($privkey, $label, $rescan = true) {
        return $this->_rpc->importprivkey($privkey, $label, $rescan);
    }

    public function keyPoolRefill() {
        return $this->_rpc->keypoolrefill();
    }

    public function listAccounts($minconf = 1) {
        return $this->_rpc->listaccounts($minconf);
    }

    public function listAddressGroupings() {
        return $this->_rpc->listaddressgroupings();
    }

    public function listReceivedByAccount($minconf = 1, $includeempty = false) {
        return $this->_rpc->listreceivedbyaccount($minconf, $includeempty);
    }

    public function listReceivedByAddress($minconf = 1, $includeempty = false) {
        return $this->_rpc->listreceivedbyaddress($minconf, $includeempty);
    }

    public function listSinceBlock($blockhash, $targetconfirmations) {
        $this->_rpc->listsinceblock($blockhash, $targetconfirmations);
    }

    public function listTransactions($account, $count = 10, $from = 0) {
        return $this->_rpc->listtransactions($account, $count, $from);
    }

    public function listUnspent($minconf = 1, $maxconf = 999999) {
        return $this->_rpc->listunspent($minconf, $maxconf);
    }

    public function listLockUnspent() {
        return $this->_rpc->listlockunspent();
    }

    public function lockUnspent($unlock, $arrayofobjects) {
        return $this->_rpc->lockunspent($unlock, $arrayofobjects);
    }

    public function sendFrom($fromaccount, $tobitcoinaddress, $amount, $minconf = 1, $comment = '', $commentto = '') {
        return $this->_rpc->sendfrom($fromaccount, $tobitcoinaddress, $amount, $minconf, $comment);
    }

    public function sendMany($fromaccount, $minconf = 1, $comment) {
        return $this->_rpc->sendmany($fromaccount, $minconf, $comment);
    }

    public function sendRawTransaction($hexstring) {
        return $this->_rpc->sendrawtransaction($hexstring);
    }

    public function sendToAddress($bitcoinaddress, $amount, $comment, $commentto) {
        return $this->_rpc->sendtoaddress($bitcoinaddress, $amount, $comment, $commentto);
    }

    public function setAccount($bitcoinaddress, $account) {
        return $this->_rpc->setaccount($bitcoinaddress, $account);
    }

    public function setGenerate($generate, $genproclimit) {
        return $this->_rpc->setgenerate($generate, $genproclimit);
    }

    public function setTxFee($amount) {
        return $this->_rpc->settxfee($amount);
    }

    public function signMessage($bitcoinaddress, $message) {
        return $this->_rpc->signmessage($bitcoinaddress, $message);
    }

    public function signRawTransaction($hexstring) {
        return $this->_rpc->seignrawtransaction($hexstring);
    }

    public function stop() {
        return $this->_rpc->stop();
    }

    public function submitBlock($hexdata) {
        return $this->_rpc->submitblock($hexdata);
    }

    public function validateAddress($bitcoinaddress) {
        return $this->_rpc->validateaddress($bitcoinaddress);
    }

    public function verifyMessage($bitcoinaddress, $signature, $message) {
        return $this->_rpc->verifymessage($bitcoinaddress, $signature, $message);
    }

    public function walletLock() {
        return $this->_rpc->walletlock();
    }

    public function walletPassphrase($passphrase, $timeout) {
        return $this->_rpc->walletlock($passphrase, $timeout);
    }

    public function walletPassphraseChange($oldpassphrase, $newpassphrase) {
        return $this->_rpc->walletpassphrasechange($oldpassphrase, $newpassphrase);
    }

}


?>