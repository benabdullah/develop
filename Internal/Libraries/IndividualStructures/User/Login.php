<?php namespace ZN\IndividualStructures\User;

use Encode, DB, Method, Session, Cookie;

class Login extends UserExtends implements LoginInterface
{
    //--------------------------------------------------------------------------------------------------------
    // Username
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $username
    // @return this
    //
    //--------------------------------------------------------------------------------------------------------
    public function username(string $username) : Login
    {
        Properties::$parameters['username'] = $username;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Password
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $password
    // @return this
    //
    //--------------------------------------------------------------------------------------------------------
    public function password(string $password) : Login
    {
        Properties::$parameters['password'] = $password;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Remember
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  bool $remember
    // @return this
    //
    //--------------------------------------------------------------------------------------------------------
    public function remember(bool $remember = true) : Login
    {
        Properties::$parameters['remember'] = $remember;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Login
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $un
    // @param  string $pw
    // @param  bool   $rememberMe
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function do(string $un = NULL, string $pw = NULL, $rememberMe = false) : bool
    {
        $un         = Properties::$parameters['username'] ?? $un;
        $pw         = Properties::$parameters['password'] ?? $pw;
        $rememberMe = Properties::$parameters['remember'] ?? $rememberMe;

        Properties::$parameters = [];

        if( ! is_scalar($rememberMe) )
        {
            $rememberMe = false;
        }

        $username   = $un;
        $encodeType = INDIVIDUALSTRUCTURES_USER_CONFIG['encode'];

        $password   = ! empty($encodeType) ? Encode::type($pw, $encodeType) : $pw;

        // ------------------------------------------------------------------------------
        // Settings
        // ------------------------------------------------------------------------------
        $tableName          = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
        $getColumns         = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
        $passwordColumn     = $getColumns['password'];
        $usernameColumn     = $getColumns['username'];
        $emailColumn        = $getColumns['email'];
        $bannedColumn       = $getColumns['banned'];
        $activeColumn       = $getColumns['active'];
        $activationColumn   = $getColumns['activation'];
        // ------------------------------------------------------------------------------

        $r = DB::where($usernameColumn, $username)
               ->get($tableName)
               ->row();

        if( ! isset($r->$passwordColumn) )
        {
            return ! Properties::$error = lang('IndividualStructures', 'user:loginError');
        }

        $passwordControl   = $r->$passwordColumn;
        $bannedControl     = '';
        $activationControl = '';

        if( ! empty($bannedColumn) )
        {
            $banned = $bannedColumn ;
            $bannedControl = $r->$banned ;
        }

        if( ! empty($activationColumn) )
        {
            $activationControl = $r->$activationColumn ;
        }

        if( ! empty($r->$usernameColumn) && $passwordControl == $password )
        {
            if( ! empty($bannedColumn) && ! empty($bannedControl) )
            {
                return ! Properties::$error = lang('IndividualStructures', 'user:bannedError');
            }

            if( ! empty($activationColumn) && empty($activationControl) )
            {
                return ! Properties::$error = lang('IndividualStructures', 'user:activationError');
            }

            Session::insert($usernameColumn, $username);
            Session::insert($passwordColumn, $password);

            if( Method::post($rememberMe) || ! empty($rememberMe) )
            {
                if( Cookie::select($usernameColumn) !== $username )
                {
                    Cookie::insert($usernameColumn, $username);
                    Cookie::insert($passwordColumn, $password);
                }
            }

            if( ! empty($activeColumn) )
            {
                DB::where($usernameColumn, $username)->update($tableName, [$activeColumn  => 1]);
            }

            return Properties::$success = lang('IndividualStructures', 'user:loginSuccess');
        }
        else
        {
            return ! Properties::$error = lang('IndividualStructures', 'user:loginError');
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Is Login
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  void
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------------
    public function is() : bool
    {
        $getColumns = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['columns'];
        $tableName  = INDIVIDUALSTRUCTURES_USER_CONFIG['matching']['table'];
        $username   = $getColumns['username'];
        $password   = $getColumns['password'];

        $cUsername  = Cookie::select($username);
        $cPassword  = Cookie::select($password);

        $result     = NULL;

        if( ! empty($cUsername) && ! empty($cPassword) )
        {
            $result = DB::where($username, $cUsername, 'and')
                        ->where($password, $cPassword)
                        ->get($tableName)
                        ->totalRows();
        }

        if( isset(Factory::class('Data')->get($tableName)->$username) )
        {
            $isLogin = true;
        }
        elseif( ! empty($result) )
        {
            Session::insert($username, $cUsername);
            Session::insert($password, $cPassword);

            $isLogin = true;
        }
        else
        {
            $isLogin = false;
        }

        return $isLogin;
    }
}
