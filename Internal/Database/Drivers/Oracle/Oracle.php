<?php namespace ZN\Database\Drivers;

use ZN\Database\Abstracts\DriverConnectionMappingAbstract;
use ZN\IndividualStructures\Security;
use ZN\IndividualStructures\Support;
use ZN\ErrorHandling\Errors;
use stdClass;

class OracleDriver extends DriverConnectionMappingAbstract
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
        'like' => '%'
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
        'autoincrement' => 'CREATE SEQUENCE % MINVALUE 1 STARVALUE WITH 1 INCREMENT BY 1;',
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
        'int'           => 'NUMERIC',
        'smallint'      => 'NUMERIC',
        'tinyint'       => 'NUMERIC',
        'mediumint'     => 'NUMERIC',
        'bigint'        => 'NUMERIC',
        'decimal'       => 'DECIMAL',
        'double'        => 'BINARY_DOUBLE',
        'float'         => 'BINARY_FLOAT',
        'char'          => 'CHAR',
        'varchar'       => 'VARCHAR2',
        'tinytext'      => 'VARCHAR2(255)',
        'text'          => 'VARCHAR2(65535)',
        'mediumtext'    => 'VARCHAR2(16277215)',
        'longtext'      => 'CLOB',
        'date'          => 'DATE',
        'datetime'      => 'TIMESTAMP',
        'time'          => 'TIMESTAMP',
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
        Support::func('oci_connect', 'Oracle 8');
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

        $dsn =  ( ! empty($this->config['dsn']))
                ? $this->config['dsn']
                : $this->config['host'];

        if( $this->config['pconnect'] === true )
        {
            $this->connect =    (empty($this->config['charset']))
                                ? @oci_pconnect
                                  (
                                    $this->config['user'],
                                    $this->config['password'],
                                    $dsn
                                  )
                                : @oci_pconnect
                                  (
                                    $this->config['user'],
                                    $this->config['password'],
                                    $dsn,
                                    $this->config['charset']
                                  );
        }
        else
        {
            $this->connect =    (empty($this->config['charset']))
                                ? @oci_connect
                                  (
                                    $this->config['user'],
                                    $this->config['password'],
                                    $dsn
                                  )
                                : @oci_connect
                                  (
                                    $this->config['user'],
                                    $this->config['password'],
                                    $dsn,
                                    $this->config['charset']
                                  );
        }


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

        $que = oci_parse($this->connect, $query);
        oci_execute($que);

        return $que;
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
        $this->query = oci_parse($this->connect, $query);
        return oci_execute($this->query);
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
        $this->exec(OCI_NO_AUTO_COMMIT);
        return true;
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
        oci_rollback($this->connect);
        return $this->exec(OCI_COMMIT_ON_SUCCESS);
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
        oci_commit($this->connect);
        return $this->exec(OCI_COMMIT_ON_SUCCESS);
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

        for( $i = 1; $i <= $numFields; $i++ )
        {
            $fieldName = oci_field_name($this->query, $i);

            $columns[$fieldName]             = new stdClass();
            $columns[$fieldName]->name       = $fieldName;
            $columns[$fieldName]->type       = oci_field_type($this->query, $i);
            $columns[$fieldName]->maxLength  = oci_field_size($this->query, $i);
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
            return oci_num_rows($this->query);
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

        for( $i = 0; $i < $numFields; $i++ )
        {
                $columns[] = oci_field_name($this->query, $i);
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
            return oci_num_fields($this->query);
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
            return  oci_error($this->connect)['message'];
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
            return oci_fetch_array($this->query);
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
            return oci_fetch_assoc($this->query);
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
            return oci_fetch_row($this->query);
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
            @oci_close($this->connect);
        }
        else
        {
            return false;
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
        if( ! empty($this->connect) )
        {
            return oci_server_version($this->connect);
        }
        else
        {
            return false;
        }
    }
}
