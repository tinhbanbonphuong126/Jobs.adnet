<?php
/*
-----------------------------------------
+	This class connection to databse 	+
-----------------------------------------
*/
include_once(dirname(__FILE__) . '/../Config.php');
abstract class Model{

	protected $pdo;
	protected $query;

	protected $columns;
	protected $table_name;
	protected $where;
	protected $page;
	protected $limit;
	protected $offset;
	protected $params;
	/*
		set connection params
	*/
	public function __construct(array $columns = array()){
		$db_host = DB_HOST;
		$db_name = DB_NAME;
		$db_user = DB_USER;
		$db_pass = DB_PASS;
		$db_port = DB_PORT;
		try {
			$conn = sprintf('mysql:dbname=%s;host=%s;port=%s;charset=utf8', DB_NAME, DB_HOST, DB_PORT);
    		$this->pdo = new PDO($conn, DB_USER, DB_PASS);
		} catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
		$this->columns = $columns;
		return $this;
	}

    public function query($query){
        if($query){
            $query = $this->pdo->prepare($query);
            $query->execute();
            return $query->fetchAll();
        }else{
            print "Error!: query failed, query not null! <br/>";
            die();
        }
    }

	public function select($table){
		$this->table_name = $table;
		$this->query = "SELECT [*] FROM ".$table;
		return $this;
	}

	public function where($where){
		$this->query .= " WHERE ".$where ;
		$this->where = $where;
		return $this;
	}

	public function order($order, $type = "ASC"){
		$this->query .= " ORDER BY ".$order." " .$type;
		return $this;
	}

	public function page($page = 1, $limit = 10){
		$this->page = $page;
		$this->limit = $limit;
		$this->offset = ($page - 1) * $limit;
		$this->query .= " LIMIT ".$this->offset.",".$limit;
		return $this;
	}

	public function get($column = "*"){

		$this->query = str_replace("[*]", $column, $this->query);

		$query = $this->pdo->prepare($this->query);
		$query->execute();

		return $query->fetchAll(PDO::FETCH_CLASS, get_class($this));
	}

	public function one($column = "*"){
		$this->query = str_replace("[*]", $column, $this->query);
		$query = $this->pdo->prepare($this->query);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}

	public function pagination(){
		$q ="SELECT COUNT(*) AS number_records FROM $this->table_name".( $this->where ? "WHERE $this->where" : "" );
		$query = $this->pdo->prepare($q);
		$query->execute();
		$number_records = $query->fetch();
		$number_records = $number_records['number_records'];
		$pages = (int) ($number_records / $this->limit) 
			   + ($number_records % $this->limit === 0 ? 0 : 1);
		$data = array(
			"total_record" => $number_records,
			"pages" => $pages <= 1 ? 0 : $pages,
			"current" => $this->page,
		);
		return $data;
	}

	public function save(){
		try{
            $sql = "INSERT INTO ".$this->table." ( ";
            $values = " VALUES (";
            $data = array();
            $first_key = array_shift(array_keys($this->columns));
            foreach ($this->columns as $key => $value) {
                if($first_key != $key){
                    $sql.=", ";
                    $values.=", ";
                }
                $sql.= $key;
                $values.= "?";
                $data[] = $value;
            }
            $sql.=" )";
            $values.=" )";
            $stmt = $this->pdo->prepare($sql.$values);
            return $stmt->execute($data);
        }catch (PDOException $ex){
		    return $ex;
        }
	}

	public function delete(){
		try{
		    $this->query = "DELETE FROM ".$this->table." WHERE ".$this->where;
            $stmt = $this->pdo->prepare($this->query);
            return $stmt->execute($this->params);
        }catch (PDOException $ex){
		    return $ex;
        }
	}

	public function update($columns){
		try{
		    $this->query = "UPDATE ".$this->table." SET [*] WHERE ".$this->where;
		    $sets = "";
            $data = array();
            foreach ($columns as $key => $value) {
                if($sets){
                    $sets.=", ";
                }
                $sets.="$key = ?";
                $data[] = $value;
            }
            $this->query = str_replace("[*]", $sets, $this->query);
            $stmt = $this->pdo->prepare($this->query);
            return $stmt->execute(array_merge($data,$this->params));
        }catch (PDOException $ex){
		    return $ex;
        }
	}

	public function find($id){
	    $this->where = "id=?";
	    $this->params = array();
	    $this->params[] = $id;
        return $this;
	}

}

