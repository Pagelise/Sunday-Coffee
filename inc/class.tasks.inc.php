class Tasks
{

    private $_db;

    public function __construct($db=NULL)
    {
        if(is_object($db))
        {
            $this->_db = $db;
        }
        else
        {
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        }
    }

public function loadTasksByUser()
    {
        $result = mysql_query("SELECT Name FROM Task");
	while($row = mysql_fetch_array($result))
 	 {
 	 echo $row['Name'];
  	 echo "<br />";
  	}
}
