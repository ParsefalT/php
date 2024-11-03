<?php 
namespace Core;

class Session {

    public static function has($key) {
        return (bool)static::get($key);
    }

    public static function put($key, $value) {
        $_SESSION[$key] = $value;
    } 

    public static function get($key, $default = null) {
        return $_SESSION['flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value) {
        $_SESSION['_flash']['errors'] = $value;
    }

    public static function unflash($value) {
        unset($value);
    }

    public static function flush() {
        $_SESSION = [];
    }
    public static function destroy() {
        static::flush();
        
        session_destroy();
    
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['secure'], $params['httponly']);
    }
}