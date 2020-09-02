<?php

class DB
{
    private $host    = "localhost";
    private $username = "root";
    private $password = "";
    private $database     = "boutique";
		public $db;

		public function __construct($host = null, $username = null, $password = null, $database = null){
			if($host != null){
				$this->host = $host;
				$this->username = $username;
				$this->password = $password;
				$this->database = $database;
			}
			try{
				$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password,
				// on interragit avec la BDD en UTF8 ce qui empêche les problèmes d'accent
				// indique la requête sql à lancer quand on se connecte
				array(
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
				//mode d'erreur pour avoir des warning
						PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
					));
			//récupération des erreurs
			}catch(PDOException $e)
			{
				die('<h1>Impossible de se connecter a la BDD</h1>');
			}
		}


		public function connectDb(){
	        try{
				$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password,
				// on interragit avec la BDD en UTF8 ce qui empêche les problèmes d'accent
				// indique la requête sql à lancer quand on se connecte
				array(
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
				//mode d'erreur pour avoir des warning
						PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
					));
			    return $this->db;
			//récupération des erreurs
			}catch(PDOException $e)
			{
				die('<h1>Impossible de se connecter a la BDD</h1>');
			}
	    }

    //méthode qui permet de faire une requête  SELECT rapidement, prend en paramètre la requête à faire
    // pour faire une requête : $db->query('SELECT * FROM table')
    public function query($sql, $data = array())
    {
        $req =$this->db->prepare($sql);
        $req->execute($data);
        //le résultat est retourné sous forme d'objet
        return $req->fetchAll(PDO::FETCH_OBJ);
    }



    //CRUD utilisé pour les modifications du projet


    public function getRows($table, $conditions = array())
    {
        $sql = 'SELECT ';
        $sql .= array_key_exists("select", $conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        if (array_key_exists("where", $conditions)) {
            $sql .= ' WHERE ';
            $i = 0;
            foreach ($conditions['where'] as $key => $value) {
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }

        if (array_key_exists("order_by", $conditions)) {
            $sql .= ' ORDER BY '.$conditions['order_by'];
        }

        if (array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
        } elseif (!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)) {
            $sql .= ' LIMIT '.$conditions['limit'];
        }

        $query = $this->db->prepare($sql);
        $query->execute();

        if (array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all') {
            switch ($conditions['return_type']) {
                    case 'count':
                        $data = $query->rowCount();
                        break;
                    case 'single':
                        $data = $query->fetch(PDO::FETCH_ASSOC);
                        break;
                    default:
                        $data = '';
                }
        } else {
            if ($query->rowCount() > 0) {
                $data = $query->fetchAll();
            }
        }
        return !empty($data)?$data:false;
    }

    /*
     * Insert des données dans la BDD
     * @param string nom de la table
     */
    public function insert($table, $data)
    {
        if (!empty($data) && is_array($data)) {
            $columns = '';
            $values  = '';
            $i = 0;
            if (!array_key_exists('date_registration', $data)) {
                $data['date_registration'] = date("Y-m-d H:i:s");
            }


            $columnString = implode(',', array_keys($data));
            $valueString = ":".implode(',:', array_keys($data));
            $sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
            $query = $this->db->prepare($sql);
            foreach ($data as $key=>$val) {
                $query->bindValue(':'.$key, $val);
            }
            $insert = $query->execute();
            return $insert?$this->db->lastInsertId():false;
        } else {
            return false;
        }
    }

    public function insertArticle($table, $data)
    {
        if (!empty($data) && is_array($data)) {
            $columns = '';
            $values  = '';
            $i = 0;
            if (!array_key_exists('date_registration', $data)) {
                $data['date_registration'] = date("Y-m-d H:i:s");
            }


            $columnString = implode(',', array_keys($data));
            $valueString = ":".implode(',:', array_keys($data));
            $sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
            $query = $this->db->prepare($sql);
            foreach ($data as $key=>$val) {
                $query->bindValue(':'.$key, $val);
            }
            $insert = $query->execute();
            return $insert?$this->db->lastInsertId():false;
        } else {
            return false;
        }
    }

    /*
     * Update des données dans la BDD
     * @param string nom de la table
     * @param array les données à mettre à jour
     */
    public function update($table, $data, $conditions)
    {
        if (!empty($data) && is_array($data)) {
            $colvalSet = '';
            $whereSql = '';
            $i = 0;

            foreach ($data as $key=>$val) {
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if (!empty($conditions)&& is_array($conditions)) {
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach ($conditions as $key => $value) {
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $sql = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
            $query = $this->db->prepare($sql);
            $update = $query->execute();
            return $update?$query->rowCount():false;
        } else {
            return false;
        }
    }

    /*
     * Supprime les données DELETE
     * string nom de la table
     */
    public function delete($table, $conditions)
    {
        $whereSql = '';
        if (!empty($conditions)&& is_array($conditions)) {
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach ($conditions as $key => $value) {
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql = "DELETE FROM ".$table.$whereSql;
        $delete = $this->db->exec($sql);
        return $delete?$delete:false;
    }
}
