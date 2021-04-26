<?php
namespace dsmgfw;
use \Firebase\JWT\JWT;
/**
 * DSMG Framework JSON Web Token Authentication Library.
 *
 * 
 * @category Framework
 * @author   Salvatore Cahyo <me@salvatorecahyo.my.id>
 * @license  https://opensource.org/licenses/MIT
 * @copyright Copyright (c) 2021, Salvatore Cahyo
 * @copyright Copyright (c) 2021, DS Media Group
 * @uses Firebase\JWT https://github.com/firebase/php-jwt
 */
class auth
{
    /**
     * The Private Key or Secret Key option.
     * 
     * @var boolean
     */
    public $key = false;
    /**
     * The algorithm used to encode jwt token.
     * 
     * 
     * @var string
     */
    public $alg = 'RS512';
    /**
     * The Secret Key if don't use Private Key.
     *
     * @var string
     */
    public $secKey = null;
    /**
     * Construct
     */
    public function __construct(){
        $this->secKey=$_ENV['JWT_SECRET_KEY'];
    }
    /**
     * Encode payload and return jwt token
     * 
     * @param array $payload
     * 
     * @return string
     */
    public function encode(array $payload){
        
        if($this->key == true){
            $privateKey = file_get_contents(__DIR__ . '/../storage/jwt/private.pem');
            return JWT::encode($payload, $privateKey, $this->alg);
        }else{
            // die($this->secKey);
            return JWT::encode($payload, $this->secKey, "HS512");
        }
    }
    /**
     * Decode jwt token.
     * 
     * @param string $token
     * 
     * @return object
     * 
     * @throws UnexpectedValueException
     */
    public function decode($token){
        if($this->key == true){
            $privateKey = file_get_contents(__DIR__ . '/../storage/jwt/public.pem');
             try{
                return JWT::decode($token, $privateKey, [$this->alg]);
             }catch(\Exception $e){
                 throw new \UnexpectedValueException($e->getMessage());
             }
        }else{
             try{
                return JWT::decode($token, $this->secKey, ['HS512']);
             }catch(\Exception $e){
                 throw new \UnexpectedValueException($e->getMessage());
             }
        }
    }
}