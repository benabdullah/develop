<?php namespace ZN\Database;

class DriverForge
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
    // Create Database
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $dbname
    // @param mixed  $extras
    //
    //--------------------------------------------------------------------------------------------------------
    public function createDatabase($dbname, $extras)
    {
        return 'CREATE DATABASE ' . $dbname . $this->_extras($extras);
    }

    //--------------------------------------------------------------------------------------------------------
    // Drop Database
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $dbname
    //
    //--------------------------------------------------------------------------------------------------------
    public function dropDatabase($dbname)
    {
        return 'DROP DATABASE ' . $dbname;
    }

    //--------------------------------------------------------------------------------------------------------
    // Create Table
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $table
    //
    // @param mixed  $extras
    //
    //--------------------------------------------------------------------------------------------------------
    public function createTable($table, $columns, $extras)
    {
        $column = '';

        foreach( $columns as $key => $value )
        {
            $values = '';

            if( is_array($value) ) foreach( $value as $val )
            {
                $values .= ' ' . $val;
            }
            else
            {
                $values = $value;
            }

            $column .= $key . ' ' . $values . ',';
        }

        return 'CREATE TABLE ' . $table . '(' .rtrim(trim($column), ',') . ')' . $this->_extras($extras);
    }

    //--------------------------------------------------------------------------------------------------------
    // Drop Table
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $table
    //
    //--------------------------------------------------------------------------------------------------------
    public function dropTable($table)
    {
        return 'DROP TABLE ' . $table;
    }

    //--------------------------------------------------------------------------------------------------------
    // Alter Table
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $table
    // @param mixed  $condition
    //
    //--------------------------------------------------------------------------------------------------------
    public function alterTable($table, $condition){}

    //--------------------------------------------------------------------------------------------------------
    // Rename Table
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $newName
    //
    //--------------------------------------------------------------------------------------------------------
    public function renameTable($name, $newName)
    {
        return 'ALTER TABLE ' . $name . ' RENAME TO ' . $newName;
    }

    //--------------------------------------------------------------------------------------------------------
    // Truncate
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $table
    //
    //--------------------------------------------------------------------------------------------------------
    public function truncate($table)
    {
        return 'TRUNCATE TABLE ' . $table;
    }

    //--------------------------------------------------------------------------------------------------------
    // Add Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $table
    // @param mixed  $column
    //
    //--------------------------------------------------------------------------------------------------------
    public function addColumn($table, $columns)
    {
        return 'ALTER TABLE ' . $table . ' ADD (' . $this->_extractColumn($columns) . ');';
    }

    //--------------------------------------------------------------------------------------------------------
    // Drop Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $table
    // @param mixed  $column
    //
    //--------------------------------------------------------------------------------------------------------
    public function dropColumn($table, $column)
    {
        return 'ALTER TABLE ' . $table . ' DROP ' . $column . ';';
    }

    //--------------------------------------------------------------------------------------------------------
    // Modify Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $table
    // @param mixed  $columns
    //
    //--------------------------------------------------------------------------------------------------------
    public function modifyColumn($table, $columns)
    {
        return 'ALTER TABLE ' . $table . ' MODIFY ' . $this->_extractColumn($columns) . ';';
    }

    //--------------------------------------------------------------------------------------------------------
    // Rename Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $table
    // @param mixed  $column
    //
    //--------------------------------------------------------------------------------------------------------
    public function renameColumn($table, $columns)
    {
        return 'ALTER TABLE ' . $table . ' CHANGE COLUMN ' . $this->_extractColumn($columns) . ';';
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Syntax
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed  $column
    // @param string $sep
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _syntax($column, $sep = NULL)
    {
        return key($column) . ' ' . $sep . ' ' . (is_array($cols = current($column)) ? implode(' ', $cols) : $cols);
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Extract Column
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed $columns
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _extractColumn($columns)
    {
        $con = NULL;

        foreach( $columns as $column => $values )
        {
            $colvals = '';

            if( is_array($values) )
            {
                foreach( $values as $val )
                {
                    $colvals .= ' ' . $val;
                }
            }
            else
            {
                $colvals .= ' ' . $values;
            }

            $con .= $column . $colvals . ',';
        }

        return rtrim($con, ',');
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected _extras()
    //--------------------------------------------------------------------------------------------------------
    protected function _extras($extras)
    {
        if( is_array($extras) )
        {
            $extraCodes = ' ' . implode(' ', $extras) . ';';
        }
        elseif( is_string($extras) )
        {
            $extraCodes = ' ' . $extras . ';';
        }
        else
        {
            $extraCodes = '';
        }

        return $extraCodes;
    }
}
