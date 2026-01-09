<?php
namespace App\Service;
use App\Models\RememberToken;
use Core\App;
use Core\Model;


class RememberMe{
    public const COOKIE_NAME = 'remember_token';

    public static function createToken(int $userId): RememberToken{
        $token = RememberToken::createForUesr($userId);
        static::setcookie($token->token);
        return $token;
    }

    public static function user(): ?User{
        $tokenString = $_COOKIE[static::COOKIE_NAME] ?? null;
        
        if(!$tokenString){
            return null;
        }

        $token = RememberToken::findValid($tokenString);
        
        if(!$token){
            return null;
        }

        $user = User::find($token->user_id);

        if($user){
            static::rotateToken($token);
        }

        return $user;
    }

    public static function clearToken(): void{
        $tokenString = $_COOKIE[static::COOKIE_NAME] ?? null;
        
        if($tokenString){
            $token = RememberToken::findValid($tokenString);
            if($token){
                $token->delete();
            }
        }

        static::removeCookie();
    }

    private static function rotateToken(RememberToken $token): void{
        $token->rotate();
        static::setcookie($token->token);
    }

    private static function setcookie(string $token): void{
        $expiry = time() + RememberToken::TOKEN_LIFETIME;
        setcookie(static::COOKIE_NAME , $token , $expiry , '/' , '' , true , true);
    }

    private static function removeCookie():void {
        setcookie(static::COOKIE_NAME , '' , time() - 3600 , '/' , '' , true , true);
    }
}