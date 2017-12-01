<?php namespace ZN\Database\Drivers;

use ZN\Database\Abstracts\DriverConnectionMappingAbstract;
use ZN\IndividualStructures\Security;
use ZN\IndividualStructures\Support;
use ZN\ErrorHandling\Errors;
use stdClass;

class ODBCDriver extends DriverConnectionMappingAbstract
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Operators
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $operators =
    [
        'like' => '*'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Statements
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $statements =
    [
        'autoincrement' => 'AUTOINCREMENT',
        'primarykey'    => 'PRIMARY KEY',
        'foreignkey'    => 'FOREIGN KEY',
        'unique'        => 'UNIQUE',
        'null'          => 'NULL',
        'notnull'       => 'NOT NULL',
        'exists'        => 'EXISTS',
        'notexists'     => 'NOT EXISTS',
        'constraint'    => 'CONSTRAINT',
        'default'       => 'DEFAULT'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Variable Types
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $variableTypes =
    [
        'int'           => 'INTEGER',
        'smallint'      => 'SMALLINT',
        'tinyint'       => 'TINYINT',
        'mediumint'     => 'INTEGER',
        'bigint'        => 'BIGINT',
        'decimal'       => 'DECIMAL',
        'double'        => 'DOUBLE PRECISION',
        'float'         => 'FLOAT',
        'char'          => 'CHAR',
        'varchar'       => 'VARCHAR',
        'tinytext'      => 'VARCHAR(255)',
        'text'          => 'VARCHAR(65535)',
        'mediumtext'    => 'VARCHAR(16277215)',
        'longtext'      => 'VARCHAR(16277215)',
        'date'          => 'DATE',
        'datetime'      => 'UTCDATETIME',
        'time'          => 'TIME',
        'timestamp'     => 'TIMESTAMP'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Construct
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        Support::func('odbc_connect', 'Microsoft Access(ODBC)');
    }

    //--------------------------------------------------------------------------------------------------------
    // Connect
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $config
    //
    //--------------------------------------------------------------------------------------------------------
    public function connect($config = [])
    {
        $this->config = $config;

        $dsn =  ( ! empty($this->config['dsn']) )
                ? $this->config['dsn']
                : 'DRIVER='.$this->config['host'].';SERVER='.$this->config['server'].';DATABASE='.$this->config['database'];


        $this->connect =    ( $this->config['pconnect'] === true )
                            ? @odbc_pconnect($dsn , $this->config['user'], $this->config['password'])
                            : @odbc_connect($dsn , $this->config['user'], $this->config['password']);

        if( empty($this->connect) )
        {
            die(Errors::message('Database', 'connectError'));
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Exec
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $query
    // @param array  $security
    //
    //--------------------------------------------------------------------------------------------------------
    public function exec($query, $security = NULL)
    {
        if( empty($query) )
        {
            return false;
        }

        return odbc_exec($this->connect, $query);
    }

    //--------------------------------------------------------------------------------------------------------
    // Multi Query
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $query
    // @param array  $security
    //
    //--------------------------------------------------------------------------------------------------------
    public function multiQuery($query, $security = NULL)
    {
        return $this->query($query, $security);
    }

    //--------------------------------------------------------------------------------------------------------
    // Query
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $query
    // @param array  $security
    //
    //--------------------------------------------------------------------------------------------------------
    public function query($query, $security = [])
    {
        $this->query = odbc_prepare($this->connect, $query);
        return odbc_execute($this->query, $security);
    }

    //--------------------------------------------------------------------------------------------------------
    // Trans Start
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function transStart()
    {
        return odbc_autocommit($this->connect, false);
    }

    //--------------------------------------------------------------------------------------------------------
    // Trans Roll Back
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function transRollback()
    {
        $rollback = odbc_rollback($this->connect);
        odbc_autocommit($this->connect, true);
        return $rollback;
    }

    //--------------------------------------------------------------------------------------------------------
    // Trans Commit
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function transCommit()
    {
        $commit = odbc_commit($this->connect);
        odbc_autocommit($this->connect, true);
        return $commit;
    }

    //--------------------------------------------------------------------------------------------------------
    // Column Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $column
    //
    //--------------------------------------------------------------------------------------------------------
    public function columnData($col = '')
    {
        if( empty($this->query) )
        {
            return false;
        }

        $columns   = [];
        $numFields = $this->numFields();

        for( $index = 1; $index <= $numFields; $index++ )
        {
            $fieldName = odbc_field_name($this->query, $index);

            $columns[$fieldName]             = new stdClass();
            $columns[$fieldName]->name       = $fieldName;
            $columns[$fieldName]->type       = odbc_field_type($this->query, $index);
            $columns[$fieldName]->maxLength  = odbc_field_len($this->query, $index);
            $columns[$fieldName]->primaryKey = NULL;
            $columns[$fieldName]->default    = NULL;
        }

        return $columns[$col] ?? $columns;
    }

    //--------------------------------------------------------------------------------------------------------
    // Num Rows
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function numRows()
    {
        if( ! empty($this->query) )
        {
            return odbc_num_rows($this->query);
        }
        else
        {
            return 0;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Columns
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function columns()
    {
        if( empty($this->query) )
        {
            return [];
        }

        $columns   = [];
        $numFields = $this->numFields();

        for( $index = 1;  $index <= $numFields; $index++ )
        {
            $columns[] = odbc_field_name($this->query, $index);
        }

        return $columns;
    }

    //--------------------------------------------------------------------------------------------------------
    // Num Fields
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function numFields()
    {
        if( ! empty($this->query) )
        {
            return odbc_num_fields($this->query);
        }
        else
        {
            return 0;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Real Escape String
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function realEscapeString($data = '')
    {
        return Security\Injection::escapeStringEncode($data);
    }

    //--------------------------------------------------------------------------------------------------------
    // Error
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function error()
    {
        if( ! empty($this->connect) )
        {
            return odbc_error($this->connect);
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Fetch Array
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function fetchArray()
    {
        if( ! empty($this->query) )
        {
            return odbc_fetch_array($this->query);
        }
        else
        {
            return [];
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Fetch Assoc
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function fetchAssoc()
    {
        if( ! empty($this->query) )
        {
            return odbc_fetch_array($this->query);
        }
        else
        {
            return [];
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Fetch Row
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function fetchRow()
    {
        if( ! empty($this->query) )
        {
            return odbc_fetch_row($this->query);
        }
        else
        {
            return [];
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Affected Rows
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function affectedRows()
    {
        if( ! empty($this->connect) )
        {
            return 0;
        }
        else
        {
            return 0;
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Close
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function close()
    {
        if( ! empty($this->connect) )
        {
            @odbc_close($this->connect);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Version
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function version()
    {
        // Desteklenmiyor.
        if( ! empty($this->connect) )
        {
            return false;
        }
    }
}
