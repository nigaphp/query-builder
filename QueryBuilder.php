<?php
/*
 * This file is part of the Nigatedev framework package.
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nigatedev\Framework\QueryBuilder;

use PDO;

/**
* SQL QueryBuilder
*
* This QueryBuilder class is use to easily create/build SQL query
*
* @package Nigatedev
* @subpackage QueryBuilder
* @author Abass Ben Cheik <cheikabassben@gmail.com>
*/
class QueryBuilder extends AbstractQueryBuilder implements QueryBuilderInterface
{
     /**
     * @var mixed
     */
    protected $key = [];
    
    private $db = null;
    
    public function __construct(PDO $db = null)
    {
        if (!is_null($db)) {
            $this->db = $db;
        }
    }

    public function from(string $table): self
    {
        $this->key["table"] = $table;
        return $this;
    }

    public function where(string $where): self
    {
        $this->key["where"] = $where;
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->key["limit"] = $limit;
        return $this;
    }

   /**
    * @param string[] $fields
    */
    public function select(...$fields): self
    {
        $this->key["type"] = "select";
        
        if (!$fields) {
            $fields = ["*"];
        }
        if (!is_array($fields[0])) {
            $this->key["fields"] = implode(", ", $fields);
        } else {
            $this->key["fields"] = implode(", ", $fields[0]);
        }

        return $this;
    }

  /**
  * @{inheritdoc}
  */
    public function selectQuery(): string
    {
        $key = array_merge(self::DEFAULT_SQL, $this->key);

        $sql = "SELECT {$key["fields"]} FROM {$key["table"]}";

        if ($key["where"]) {
            $sql .= " WHERE {$key["where"]}";
        }
        if ($key["limit"] > 0) {
            $limit = (int)$key["limit"];
            $sql .= " LIMIT {$limit}";
        }

        return $sql;
    }

  /**
  * @{inheritdoc}
  */
    public function insertQuery(): string
    {
      // TODO...
        return "";
    }

  /**
  * @{inheritdoc}
  */
    public function updateQuery(): string
    {
      // TODO...
        return "";
    }

  /**
  * @{inheritdoc}
  */
    public function deleteQuery(): string
    {
      // TODO...
        return "";
    }

  /**
  * @{inheritdoc}
  */
    public function rawQuery(): string
    {
      // TODO...
        return "";
    }

    /**
     * @return mixed
     */
    public function toSQL()
    {
        if (isset($this->key["type"])) {
            switch ($this->key["type"]) {
                case 'select':
                    return $this->selectQuery();
                case "insert":
                    return $this->insertQuery();
                case "update":
                    return $this->updateQuery();
                case "delete":
                    return $this->deleteQuery();
            }
        } elseif (isset($this->key['table'])) {
            return "SELECT * FROM {$this->key['table']}";
        } else {
            throw new QueryBuilderException("ERRORS: Can't built empty query");
        }
    }
    
    /**
     * Fetch data
     * 
     * @throws PDOException
     * @return mixed
     */
    public function fetch($fetchMode = PDO::FETCH_ASSOC)
    {
        return $this->db->query($this->toSQL())->fetch($fetchMode);
    }
}
