<?php

namespace dsmgfw\Middlewares;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use dsmgfw\auth;
class authver implements IMiddleware {

    public function handle(Request $request): void 
    {
        
            $auth = new auth();
            try{
                $auth->decode($_COOKIE['dsmg_token']);
            }catch(\Exception $e){
                // echo $e->getMessage();
                // $request->setRewriteUrl('signout');
                header('Location: /signout');
            }
    }
}