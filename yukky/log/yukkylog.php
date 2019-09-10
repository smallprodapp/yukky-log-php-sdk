<?php

namespace yukky\log;

class YukkyLog
{
    static $appkey;
    static $appsecret;
    static $debug;

    public static function init ($appkey, $appsecret, $debug = false) {
        YukkyLog::$appkey = $appkey;
        YukkyLog::$appsecret = $appsecret;
        YukkyLog::$debug = $debug;
    }

    private static function request ($data) {
        $ch = \curl_init();
        $req = ['log' => $data, 'appkey' => YukkyLog::$appkey, 'appsecret' => YukkyLog::$appsecret];
        $params = json_encode($req);
        \curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        \curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        \curl_setopt($ch, CURLOPT_POST, 1);
        \curl_setopt($ch, CURLOPT_HEADER, 0);
        \curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers[] = "Content-Type: application/json";
        $headers[] = "Content-Length: " . strlen($params);
        
        \curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        

        $res = \curl_exec($ch);
        \curl_close($ch);
        return $res;
    }

    public static function error ($data) {
        try {
            $data['type'] = 'error';
            YukkyLog::request($data);
        } catch (Exception $ex) {
            if (YukkyLog::$debug) {
                var_dump($ex);
            }
        }
    }

    public static function warning ($data) {
        try {
            $data['type'] = 'warning';
            YukkyLog::request($data);
        } catch (Exception $ex) {
            if (YukkyLog::$debug) {
                var_dump($ex);
            }
        }
    }

    public static function info ($data) {
        try {
            $data['type'] = 'info';
            YukkyLog::request($data);
        } catch (Exception $ex) {
            if (YukkyLog::$debug) {
                var_dump($ex);
            }
        }
    }

    public static function custom ($data) {
        try {
            YukkyLog::request($data);
        } catch (Exception $ex) {
            if (YukkyLog::$debug) {
                var_dump($ex);
            }
        }
    }
}


?>