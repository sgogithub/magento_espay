<?php
// app/code/local/Envato/Custompaymentmethod/Block/Form/Custompaymentmethod.php
class Plus_Espaypaymentmethod_Block_Form_Espaypaymentmethod extends Mage_Payment_Block_Form
{
  protected function _construct()
  {
    parent::_construct();
    $this->setProducts($this->_callApiProduct());
    $this->setTemplate('espaypaymentmethod/form/espaypaymentmethod.phtml');

  }

  /**
   * [_callApiProduct description]
   * @param  [type] $url     [description]
   * @param  [type] $request [description]
   * @return [type]          [description]
   */
  private function _callApiProduct(){
        $url =   Mage::getStoreConfig('payment/espay/environment') == 'production'? 'https://api.espay.id/rest/merchant/merchantinfo' : 'https://sandbox-api.espay.id/rest/merchant/merchantinfo';
        $key =   Mage::getStoreConfig('payment/espay/paymentid');
        $request = 'key='.$key;


        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request);

        curl_setopt($curl, CURLOPT_HEADER, false);
        // curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); // use http 1.1
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
        // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

        // NOTE: skip SSL certificate verification (this allows sending request to hosts with self signed certificates, but reduces security)
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        // enable ssl version 3
        // this is added because mandiri ecash case that ssl version that have been not supported before
        curl_setopt($curl, CURLOPT_SSLVERSION, 1);

        curl_setopt($curl, CURLOPT_VERBOSE, true);
        // save to temporary file (php built in stream), cannot save to php://memory
        $verbose = fopen('php://temp', 'rw+');
        curl_setopt($curl, CURLOPT_STDERR, $verbose);

        $response = curl_exec($curl);

        $response = json_decode($response);
        return $response->data;

  }
}
