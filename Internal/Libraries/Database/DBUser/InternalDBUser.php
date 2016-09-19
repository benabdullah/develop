<?php namespace ZN\Database;

class InternalDBUser extends Connection implements InternalDBUserInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // User
    //--------------------------------------------------------------------------------------------------------
    //
    // @var object
    //
    //--------------------------------------------------------------------------------------------------------
    protected $user;

    //--------------------------------------------------------------------------------------------------------
    // Database Manipulation Methods Başlangıç
    //--------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();

        $this->user = $this->_drvlib('User');
    }


    //--------------------------------------------------------------------------------------------------------
    // name()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name: USER()
    //
    //--------------------------------------------------------------------------------------------------------
    public function name(String $name) : InternalDBUser
    {
        $this->user->name($name);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // host()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $host: localhost
    //
    //--------------------------------------------------------------------------------------------------------
    public function host(String $host) : InternalDBUser
    {
        $this->user->host($host);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // password()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $authString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function password(String $authString) : InternalDBUser
    {
        $this->user->password($authString);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // identifiedBy()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $authString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedBy(String $authString) : InternalDBUser
    {
        $this->user->identifiedBy($authString);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // identifiedByPassword()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $hashString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedByPassword(String $hashString) : InternalDBUser
    {
        $this->user->identifiedByPassword($hashString);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // identifiedWith()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $authPlugin: empty
    // @param string $type      : empty
    // @param string $authString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedWith(String $authPlugin, String $type, String $authString) : InternalDBUser
    {
        $this->user->identifiedWith($authPlugin, $type, $authString);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // identifiedWithBy()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $authPlugin: empty
    // @param string $authString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedWithBy(String $authPlugin, String $authString) : InternalDBUser
    {
        $this->user->identifiedWithBy($authPlugin, $authString);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // identifiedWithAs()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $hashPlugin: empty
    // @param string $hashString: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function identifiedWithAs(String $hashPlugin, String $hashString) : InternalDBUser
    {
        $this->user->identifiedWithAs($hashPlugin, $hashString);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // required()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function required() : InternalDBUser
    {
        $this->user->required();

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // with()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function with() : InternalDBUser
    {
        $this->user->with();

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // option()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function option(String $name, String $value) : InternalDBUser
    {
        $this->user->option($name, $value);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // encode()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $type     : SSL, X509, CIPHER value, ISSUER value, SUBJECT value
    // @param string $string   : empty value
    // @param string $condition: and, or
    //
    //--------------------------------------------------------------------------------------------------------
    public function encode(String $type, String $string, String $condition = NULL) : InternalDBUser
    {
        $this->user->encode($type, $string, $condition);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // resource()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $resource: query       => MAX_QUERIES_PER_HOUR
    //                          update      => 'MAX_UPDATES_PER_HOUR
    //                          connection  => 'MAX_CONNECTIONS_PER_HOUR
    //                          user        => 'MAX_USER_CONNECTIONS
    // @param string $count   : 0
    //
    //--------------------------------------------------------------------------------------------------------
    public function resource(String $resource, $count = 0) : InternalDBUser
    {
        $this->user->resource($resource, $count);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // passwordExpire()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $type: empty, DEFAULT, NEVER, INTERVAL
    // @param numeric $n   : 0
    //
    //--------------------------------------------------------------------------------------------------------
    public function passwordExpire(String $type = NULL, $n = 0) : InternalDBUser
    {
        $this->user->passwordExpire($type, $n);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // lock()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $type: lock, unlock
    //
    //--------------------------------------------------------------------------------------------------------
    public function lock(String $type = 'lock') : InternalDBUser
    {
        $this->user->lock($type);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // unlock()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $type: unlock, lock
    //
    //--------------------------------------------------------------------------------------------------------
    public function unlock(String $type = 'unlock') : InternalDBUser
    {
        $this->user->unlock($type);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // type()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $type: TABLE, FUNCTION, PROCEDURE
    //
    //--------------------------------------------------------------------------------------------------------
    public function type(String $type = 'TABLE') : InternalDBUser
    {
        $this->user->type($type);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // select()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $select: *.*
    //
    //--------------------------------------------------------------------------------------------------------
    public function select(String $select = '*.*') : InternalDBUser
    {
        $this->user->select($select);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // grantOption()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void()
    //
    //--------------------------------------------------------------------------------------------------------
    public function grantOption() : InternalDBUser
    {
        $this->user->grantOption();

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // alter()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name: USER()
    //
    //--------------------------------------------------------------------------------------------------------
    public function alter(String $name = NULL) : Bool
    {
        nullCoalesce($name, 'USER()');

        $query = $this->user->alter($name);

        return $this->_runQuery($query);
    }

    //--------------------------------------------------------------------------------------------------------
    // create()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name: USER()
    //
    //--------------------------------------------------------------------------------------------------------
    public function create(String $name = NULL) : Bool
    {
        nullCoalesce($name, 'USER()');

        $query = $this->user->create($name);

        return $this->_runQuery($query);
    }

    //--------------------------------------------------------------------------------------------------------
    // drop()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name: USER()
    //
    //--------------------------------------------------------------------------------------------------------
    public function drop(String $name = NULL) : Bool
    {
        nullCoalesce($name, 'USER()');

        $query = $this->user->drop($name);

        return $this->_runQuery($query);
    }

    //--------------------------------------------------------------------------------------------------------
    // grant()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name  : ALL
    // @param string  $type  : *.*
    // @param string  $select: *.*
    //
    //--------------------------------------------------------------------------------------------------------
    public function grant(String $name = 'ALL', String $type = NULL, String $select = '*.*') : Bool
    {
        $query = $this->user->grant($name, $type, $select);

        return $this->_runQuery($query);
    }

    //--------------------------------------------------------------------------------------------------------
    // revoke()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $name  : ALL
    // @param string  $type  : *.*
    // @param string  $select: *.*
    //
    //--------------------------------------------------------------------------------------------------------
    public function revoke(String $name = 'ALL', String $type = NULL, String $select = '*.*') : Bool
    {
        $query = $this->user->revoke($name, $type, $select);

        return $this->_runQuery($query);
    }

    //--------------------------------------------------------------------------------------------------------
    // rename()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $oldName: empty
    // @param string  $newName: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function rename(String $oldName, String $newName) : Bool
    {
        $query = $this->user->rename($oldName, $newName);

        return $this->_runQuery($query);
    }

    //--------------------------------------------------------------------------------------------------------
    // setPassword()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string  $user: empty
    // @param string  $pass: empty
    //
    //--------------------------------------------------------------------------------------------------------
    public function setPassword(String $user = NULL, String $pass = NULL) : Bool
    {
        $query = $this->user->setPassword($user, $pass);

        return $this->_runQuery($query);
    }
}
