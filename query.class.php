<?php
    define("SELECT", "SELECT");
    define("UPDATE", "UPDATE");
    define("DELETE", "DELETE");
    define("INSERT", "INSERT");
    

    class Query {
        var $type = "";
        var $table = "";
        var $columns = [];
        var $where = [];
        var $order = "";
        var $limit = "";
        
		function select() {
			$this->type = SELECT;
        }

        function update() {
            $this->type = UPDATE;
        }
        function insert() {
            $this->type = INSERT;
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
                    $queryString .= implode($this->columns, ", ");
                } else {
                    $queryString .= "*";
                }

                $queryString .= " FROM `".$this->table."`";
                break;
            }

            if(count($this->where)){
                $queryString .= " WHERE " . implode($this->where, " AND ");
            }

            if($this->order != ""){
                $queryString .= " ORDER " . $this->order;
            }

            if($this->limit != ""){
                $queryString .= " LIMIT " . $this->limit;
            }


            return $queryString;
        }
        
	}
?>