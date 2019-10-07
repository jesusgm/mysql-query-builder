<?php
    define("SELECT", "SELECT");
    define("UPDATE", "UPDATE");
    define("DELETE", "DELETE");
    define("INSERT", "INSERT");
    

    class Query {
        var $type = "";
        var $table = "";
        var $columns = [];
        var $values = [];
        var $where = [];
        var $orWhere = [];
        var $order = "";
        var $limit = "";
        
		function select() {
			$this->type = SELECT;
        }

        function update($values) {
            $this->type = UPDATE;
            $this->values = $values;
        }
        function insert($values) {
            $this->type = INSERT;
            $this->values = $values;
        }

        function delete() {
            $this->type = DELETE;
        }
        
        function table($table) {
            $this->table = $table;
        }

        function columns($columns) {
            $this->columns = $columns;
        }

        function where($where) {
            $this->where = $where;
        }

        function orWhere($orWhere) {
            $this->orWhere = $orWhere;
        }

        function order($order) {
            $this->order = $order;
        }

        function limit($limit) {
            $this->limit = $limit;
        }


        function build() {
            $queryString = "";
            switch($this->type) {
                case SELECT:
                    $queryString = "SELECT ";
                    if(count($this->columns)) {
                        $queryString .= "`" . implode($this->columns, ", ") . "`";
                    } else {
                        $queryString .= "*";
                    }

                    $queryString .= " FROM `".$this->table."`";
                    break;
                case INSERT:
                    $queryString = "INSERT INTO `".$this->table."` (`".implode($this->columns, "`, `")."`)";
                    $queryString .= " VALUES (".implode($this->values, ",").") ";
                    break;
                case UPDATE:
                    $queryString = "UPDATE `".$this->table."`";
                    $queryString .= " SET ";
                    
                    $map = array();
                    for($i = 0; $i < count($this->columns); $i++){
                        $map[] = "`".$this->columns[$i] . "`=" . $this->values[$i];
                    }

                    $queryString .= implode($map, ", ");
                    break;
                case DELETE:
                    $queryString = "DELETE FROM `".$this->table."`";
                    break;
            }

            if(count($this->where) || count($this->orWhere)){
                $queryString .= " WHERE ";
            }

            if(count($this->where)){
                $queryString .= "(" . implode($this->where, " AND ") .")";
            }

            if(count($this->orWhere)){
                if(count($this->where)){
                    $queryString .= " AND ";
                }
                $queryString .= "(" . implode($this->orWhere, " OR ") . ")";
            }

            if($this->order != ""){
                $queryString .= " ORDER BY " . $this->order;
            }

            if($this->limit != ""){
                $queryString .= " LIMIT " . $this->limit;
            }


            return $queryString . ";";
        }
        
	}
?>