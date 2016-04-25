<?php

class DB
{
    /** @var \mysqli */
    private $link;

    /** @var \mysqli_result */
    private $res;

    public function Query($query, $save = 0)
    {
        $this->res = mysqli_query($this->link, $query);
        return $this->res;
    }

    /**
     * @return int
     */
    public function errno() {
        if (!$this->link) {
            return 0;
        }
        return mysqli_errno($this->link);
    }

    public function free_result()
    {
        return mysqli_free_result($this->res);
    }

    /**
     * @return bool
     */
    public function close() {
        if (!mysqli_ping($this->link)) {
            return true;
        }
        return mysqli_close($this->link);
    }

    public function numRows()
    {
        return $this->res->num_rows;
    }

    public function insert_id()
    {
        return mysqli_insert_id($this->link);
    }

    /**
     * @param bool $free_result
     * @return mixed
     */
    public function fetchRow($free_result = true) {
        $result = array();
        if (is_bool($this->res)) {
            return $result;
        }
        $result = $this->res->fetch_array(MYSQLI_ASSOC);
        if ($free_result) {
            $this->res->free_result();
        }
        return $result;
    }

    public function freeResult() {
        $this->res->free_result();
    }

    /**
     * @return array
     */
    public function fetchAll()
    {
        $result = array();
        if (is_bool($this->res)) {
            return $result;
        }
        while ($row = $this->res->fetch_array(MYSQLI_ASSOC)) {
            $result[] = $row;
        }
        $this->free_result();
        return $result;
    }

    public function fetchArray()
    {
        return $this->res->fetch_array(MYSQLI_ASSOC);
    }

    public function __construct($db_host = 0, $db_name = '')
    {
        $this->Host     = '127.0.0.1';
        $this->User     = 'root';
        $this->Password    = '';
        $this->DBName   = 'laki';

        $this->Connect();
        $this->setCharset();
    }

    public function Connect()
    {
        $this->link = mysqli_connect($this->Host, $this->User, $this->Password, $this->DBName) or $this->saveToLog(mysqli_connect_error(), 1);
    }

    public function setCharset() {
        mysqli_set_charset($this->link, 'utf8');
    }

    public function mysql_real_escape_string($data)
    {
        return mysqli_real_escape_string($this->link, $data);
    }
}
?>