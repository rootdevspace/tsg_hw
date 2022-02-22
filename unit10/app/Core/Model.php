<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Model
 */
abstract class Model implements DbModelInterface {

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var string
     */
    protected $idColumn;

    /**
     * @var array
     */
    protected $columns = [];

    /**
     * @var
     */
    protected $collection;

    /**
     * @var string
     */
    protected $sql;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @return $this
     */
    public function initCollection() {
        $columns = implode(',', $this->getColumns());
        $this->sql = "select $columns from " . $this->getTableName();

        return $this;
    }

    /**
     * @return array
     */
    public function getColumns() {
        $db = new DB();
        $sql = "show columns from {$this->getTableName()};";
        $results = $db->query($sql);
        foreach ($results as $result) {
            $this->columns[] = $result['Field'];
        }
        return $this->columns;
    }

    /**
     * @param $params
     * @return $this
     */
    public function sort($params) {
        $this->sql .= " order by";
        $i = 0;
        $params_count = count($params);
        foreach ($params as $k => $v) {
            if ($i === ($params_count - 1)) {
                $this->sql .= " $k $v";
            } else {
                $this->sql .= " $k $v,";
            }
            $i++;
        }

        /*
          TODO
          return $this;
         */
        return $this;
    }

    /**
     * @param $params
     */
    public function filter($params) {
        /*
          TODO
         */
        return $this;
    }

    /**
     * @return $this
     */
    public function getCollection() {
        $db = new DB();
        $this->sql .= ";";
        $this->collection = $db->query($this->sql, $this->params);
        return $this;
    }

    /**
     * @return mixed
     */
    public function select() {
        return $this->collection;
    }

    /**
     * @return array|null
     */
    public function selectFirst(): ?array {
        return $this->collection[0] ?? null;
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getItem($id): ?array {
        $sql = "select * from {$this->getTableName()} where $this->idColumn = ?;";
        $db = new DB();
        $params = [$id];
        return $db->query($sql, $params)[0] ?? null;
    }

    /**
     * @return array
     */
    public function getPostValues() {
        $values = [];
        $columns = $this->getColumns();
        foreach ($columns as $column) {
            /*
              if ( isset($_POST[$column]) && $column !== $this->id_column ) {
              $values[$column] = $_POST[$column];
              }
             * 
             */
            $column_value = filter_input(INPUT_POST, $column);
            if ($column_value && $column !== $this->idColumn) {
                $values[$column] = $column_value;
            }
        }
        return $values;
    }

    /**
     * @return string
     */
    public function getTableName(): string {
        return $this->tableName;
    }

    public function getPrimaryKeyName(): string {
        return $this->idColumn;
    }

    public function getId(): ?int {
        return 1;
    }

    //----------------------------------------------

    public function addItem(array $values): ?bool {
        $params = array();

        foreach ($values as $value) {
            $params[] = $value;
        }

        array_splice($this->columns, 0, 1);
        $columns = implode(',', $this->columns);

        $sql = "insert into {$this->getTableName()} ($columns) values (?,?,?,?,?);";

        $db = new DB();
        $resultQuery = $db->queryInsertUpdDel($sql, $params);
        return $resultQuery;
    }

    public function saveItem($id, $values): void {
        $params = array();

        foreach ($values as $value) {
            $params[] = $value;
        }

        array_splice($this->columns, 0, 1);

        $sql = "update {$this->getTableName()} set `" . $this->columns[0] . "`=?, `" . $this->columns[1] . "`=?, `" . $this->columns[2] . "`=?, `" . $this->columns[3] . "`=?, `" . $this->columns[4] . "`=? where `id`=$id;";

        $db = new DB();
        $db->queryInsertUpdDel($sql, $params);
    }

    public function delItem($id): void {
        $params = array();
        $params[] = $id;

        $sql = "delete from {$this->getTableName()} where `id`=?;";
        $db = new DB();
        $db->queryInsertUpdDel($sql, $params);
    }

}
