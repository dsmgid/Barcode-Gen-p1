<?php
namespace dsmgfw;
/**
 * DSMG Framework Curl Library
 *
 * 
 * @category Curl
 * @author   Salvatore Cahyo <me@salvatorecahyo.my.id>
 * @license  https://opensource.org/licenses/MIT
 * @copyright Copyright (c) 2021, Salvatore Cahyo
 * @copyright Copyright (c) 2021, DS Media Group
 * @uses curl
 */
class curl {
    /**
     * class constructor
     * 
     * @var string|null $endpoint
     *                  Use to continuous api url
     * @var array|null $header
     */
    public function __construct(string $endpoint = null, array $header = null){
        $this->header = $header;
        $this->endpoint = $endpoint;
    }
    /**
     * Curl function
     * 
     * @var string $endpoints
     * @var string $method
     * @var array|null $data
     * @var bool $json
     * 
     */
    public function curl($endpoints, $method = 'GET', array $data = null, bool $json = true){
        $ch = curl_init();
        (isset($this->endpoint))?curl_setopt($ch, CURLOPT_URL, $this->endpoint . $endpoints):curl_setopt($ch, CURLOPT_URL, $endpoints);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        (isset($this->header)) ? curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header) : '';
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if($method !== 'GET'){
            $data = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($httpcode !== 200){
            throw new \Exception("err" . $output);
        }else{
            
            if(!$json):
                return json_decode($output);
            else:
            return $output;
            endif;
        }
    }
}