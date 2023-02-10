<?php

    class session {
        public static function init () {
            session_start();
        }

        public static function set ($variabl,$val) {
            // Set Session Variabls
            $_SESSION[$variabl] = $val;
        }

        public static function get ($key) {
            // Get Session Variabls
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }else{
                return false;
            }
        }

        // Check Session Data
        public static function CheckSession () {
            self::init();
            if (self::get("login") == false) {
                session_destroy();
                header("Location:login.php");
            }
        }

        // Check login Data
        public static function CheckLogin () {
            self::init();
            if (self::get("login") == true) {
                header("Location:index.php");
            }
        }

        // Check logout Data
        public static function logout () {
            session_destroy();
            header("Location:login.php");
        }

        // Check destroy Data
        public static function destroy () {
            self::init();
            session_destroy();
            header("Location:login.php");
            }
    }



?>