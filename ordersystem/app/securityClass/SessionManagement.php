<?php
//Author : Lee Jun Jie
class SessionManagement {

    // The number of seconds of inactivity before a session expires.
    protected static $SESSION_AGE = 1800;

    // Writes a value to the current session data.
    // $key String identifier.
    // $value Single value or array of values to be written.
    public static function write($key, $value) {
        self::_init();
        $_SESSION[$key] = $value;
        self::_age();
        return $value;
    }

    // Reads a specific value from the current session data.
    // $key String identifier.
    // $child for accessing array elements.
    public static function read($key, $child = false) {
        self::_init();
        if (isset($_SESSION[$key])) {
            self::_age();

            if (false == $child) {
                return $_SESSION[$key];
            } else {
                if (isset($_SESSION[$key][$child])) {
                    return $_SESSION[$key][$child];
                }
            }
        }
        return false;
    }

    //Deletes the value from the $key session.
    //$key String identifying the array key to delete.
    public static function delete($key) {
        self::_init();
        unset($_SESSION[$key]);
        self::_age();
    }

    // Display current session data.

    public static function display() {
        self::_init();
        echo print_r($_SESSION); //display information of the $_SESSION
    }

    //Starts or resumes a session 
    public static function start() {
        return self::_init();
    }

    // Expires a session if it has been inactive for a specified amount of time.
    private static function _age() {
        $last = isset($_SESSION['LAST_ACTIVE']) ? $_SESSION['LAST_ACTIVE'] : false;
        if (false !== $last && (time() - $last > self::$SESSION_AGE)) {
            self::destroy();
        }
        $_SESSION['LAST_ACTIVE'] = time();
    }

    //Returns current session cookie parameters
    public static function params() {
        $r = array();
        if ('' !== session_id()) {
            $r = session_get_cookie_params();
        }
        return $r;
    }

    //Closes the current session and releases session file lock.
    public static function close() {
        if ('' !== session_id()) {
            return session_write_close();
        }
        return true;
    }

    //Removes session data and destroys the current session.
    public static function destroy() {
        if ('' !== session_id()) {
            $_SESSION = array();

            //Kill the session and delete the cookies
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                );
            }

            session_destroy();
        }
    }

    //Initializes a new secure session or resumes an existing session.
    private static function _init() {
        if ('' === session_id()) {
            $secure = true;
            $httponly = true;
            $params = session_get_cookie_params();
            session_set_cookie_params($params['lifetime'],
                    $params['path'], $params['domain'],
                    $secure, $httponly
            );
            return session_start();
        }
    }
}
?>