<?php


/**
 * ���ݿ�ģ����
 */
class M {

    // ���ݿ�����ID ֧�ֶ������
    protected $linkID = array();
    // ��ǰ���ݿ��������
    protected $db = null;
    // ��ǰ��ѯID
    protected $queryID = null;
    // ��ǰSQLָ��
    protected $queryStr = '';
    // �Ƿ��Ѿ��������ݿ�
    protected $connected = false;
    // ���ػ���Ӱ���¼��
    protected $numRows = 0;
    // �����ֶ���
    protected $numCols = 0;
    // ���������Ϣ
    protected $error = '';

    public function __construct() {
        $this->db = $this->connect();
    }

    /**
     * �������ݿⷽ��
     */
    public function connect() 
    {
      $connected = mysql_connect("content","root","nyit");
if (!$connected)
  {
  die('Could not connect: ' . mysql_error());
  }
    }

    /**
     * ��ʼ�����ݿ�����
     */
    protected function initConnect() {
        if (!$this->connected) {
            $this->db = $this->connect();
        }
    }

    /**
     * ������еĲ�ѯ����
     * @access private
     * @param string $sql  sql���
     * @return array
     */
    public function select($sql) {
        $this->initConnect();
        if (!$this->db)
            return false;
        $query = $this->db->query($sql);
        $list = array();
        if (!$query)
            return $list;
        while ($rows = $query->fetch_assoc()) {
            $list[] = $rows;
        }
        return $list;
    }

    /**
     * ֻ��ѯһ������
     */
    public function find($sql) {
        $resultSet = $this->select($sql);
        if (false === $resultSet) {
            return false;
        }
        if (empty($resultSet)) {// ��ѯ���Ϊ��
            return null;
        }
        $data = $resultSet[0];
        return $data;
    }

    /**
     * ��ȡһ����¼��ĳ���ֶ�ֵ , sql ���Լ���֯
     * ���ӣ� $model->getField("select id from user limit 1")
     */
    public function getField($sql) {
        $resultSet = $this->select($sql);
        if (!empty($resultSet)) {
            return reset($resultSet[0]);
        }
    }

    /**
     * ִ�в�ѯ �������ݼ�
     */
    public function query($str) {
        $this->initConnect();
        if (!$this->db) {
            if (C("debug"))
                echo "connect to database error";
            return false;
        }
        $this->queryStr = $str;
        //�ͷ�ǰ�εĲ�ѯ���
        if ($this->queryID)
            $this->free();
        $this->queryID = $this->db->query($str);
        // �Դ洢���̸Ľ�
        if ($this->db->more_results()) {
            while (($res = $this->db->next_result()) != NULL) {
                $res->free_result();
            }
        }
        //$this->debug();
        if (false === $this->queryID) {
            echo $this->error();
            return false;
        } else {
            $this->numRows = $this->queryID->num_rows;
            $this->numCols = $this->queryID->field_count;
            return $this->getAll();
        }
    }

    /**
     * ִ����� �� ������룬���²���
     * @access public
     * @param string $str  sqlָ��
     * @return integer
     */
    public function execute($str) {
        $this->initConnect();
        if (!$this->db)
            return false;
        $this->queryStr = $str;
        //�ͷ�ǰ�εĲ�ѯ���
        if ($this->queryID)
            $this->free();
        $result = $this->db->query($str);
        if (false === $result) {
            $this->error();
            return false;
        } else {
            $this->numRows = $this->db->affected_rows;
            $this->lastInsID = $this->db->insert_id;
            return $this->numRows;
        }
    }

    /**
     * ������еĲ�ѯ����
     * @access private
     * @param string $sql  sql���
     * @return array
     */
    private function getAll() {
        //�������ݼ�
        $result = array();
        if ($this->numRows > 0) {
            //�������ݼ�
            for ($i = 0; $i < $this->numRows; $i) {
                $result[$i] = $this->queryID->fetch_assoc();
            }
            $this->queryID->data_seek(0);
        }
        return $result;
    }

    /**
     * �����������ID
     */
    public function getLastInsID() {
        return $this->db->insert_id;
    }

    // �������ִ�е�sql���
    public function _sql() {
        return $this->queryStr;
    }

    /**
     * ���ݿ������Ϣ
     */
    public function error() {
        $this->error = $this->db->errno . ':' . $this->db->error;
        if ('' != $this->queryStr) {
            $this->error .= "\n [ SQL��� ] : " . $this->queryStr;
        }
        //trace($this->error, '', 'ERR');
        return $this->error;
    }

    /**
     * �ͷŲ�ѯ���
     */
    public function free() {
        $this->queryID->free_result();
        $this->queryID = null;
    }

    /**
     * �ر����ݿ�
     */
    public function close() {
        if ($this->db) {
            $this->db->close();
        }
        $this->db = null;
    }

    /**
     * ��������
     */
    public function __destruct() {
        if ($this->queryID) {
            $this->free();
        }
        // �ر�����
        $this->close();
    }

}

function USERCHECK($username) 
{ 
		$model = M();
    $sql = "select * from userid where  username ='" . $username . "'";
    $d = $model->find($sql);
    if ($d == null || $d == false)
    {
    	return false;
    }
    else
    {
    	return true;
    }
  
}


function USERGEGISTER($username,$passwd)
{
	$model = M();
    $sql = "select userid from userid where  username ='" . $username . "' and passwd = '" . $passwd ."'";
    $d = $model->find($sql);
    if ($d == null || $d == false)
    {
    	return false;
    }
    else	
    {
    	return true;
    }
}


function GETLOGIN($username,$passwd)
{
		$model = M();
    $sql = "select userid from userid where  username ='" .  $username . "' and passwd = '" . $passwd ."'";
    $d = $model->find($sql);
    if ($d == null || $d == false)
    {
    	return NULL; 
   
    }
    else	
    {
    	return $d;
    }
}

function REGSESSION($username,$passwd)
{
		$model = M();
    $sql = "select userid from userid where  username ='" . $username . "' and passwd = '" . $passwd ."'";
    $d = $model->find($sql);
    if ($d == null || $d == false)
    {
    	return false;
    }
    else	
    {
    $sql = "insert into sessionid(sessionid,userid) values('" .	$_SESSION ."','". $d."'";
    return $model->execute($sql);
    }
}

function GETDATA($userid)
{
	 
		$model = M();
    $sql = "select Words from userid where userid ='" . $userid."'";
    $d = $model->find($sql);
    if ($d == null || $d == false)
    {
    	return ""; 
   
    }
    else	
    {
    	return $d;
    }
 
}


function CHECKSESSION($sessionid)
{
	 
		$model = M();
    $sql = "select userid from sessionid where sessionid ='" . $sessionid."'";
    $d = $model->find($sql);
    if ($d == null || $d == false)
    {
    	return ""; 
   
    }
    else	
    {
    	return $d;
    }
 
}


function LOGOUT($userid)
{	
		$model = M();
    $sql = "delete userid from sessionid where userid ='" . $userid."'";
    $d = $model->execute($sql);
    if ($d == 1)    {
    	return true; 
   
    }
    else	
    {
    	return false;
    }
	
}

function GETTEXT($contextid)
{

    $model = M();
    $sql = "select context from Context where contextid ='" . $contextid . "'";
    $d = $model->find($sql);
    if ($d == null || $d == false) {
        return "";

    } else {
        return $d;
    }


    function SETDATA($userid, $error, $word, $time)
    {
        $model = M();
        $sql = "insert into userid(userid,error,word,time) values(" . $userid . ",'" . $error . "','" . word . "'," . time . ")";
        $d = $model->execute($sql);
        if ($d == 1) {
            return true;

        } else {
            return false;
        }

    }
}
	
