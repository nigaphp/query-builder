<?php
/*
 * This file is part of the Niga framework package.
 *
 * (c) Abass Dev <abass@abassdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Niga\Framework\QueryBuilder;

  /**
   * AbstractQueryBuilder
   *
   * @package Niga
   * @subpackage QueryBuilder
   * @author Abass Dev <abass@abassdev.com>
   */
abstract class AbstractQueryBuilder
{
   
  /**
  * @var string[] DEFAULT_KEY
  */
    protected const QUERY_KEY = [
    "select",
    "insert",
    "update",
    "delete"
    ];

  /**
  * @var array<string, array> DEFAULT_SQL
  */
    protected const DEFAULT_SQL = [
    "primary_key" => "",
    "selectors" => [],
    "distinct" => false,
    "replace" => false,
    "orderBy" => [],
    "fields" => "*",
    "where" => null,
    "limit" => 0,
    "table" => "",
    "from" => [],
    "type" => "",
    "and" => [],
    "raw" => "",
    "or" => []
    ];

  /**
   * Query type checker
   *
   * @return bool
   */
    public function isValidQueryKey(string $type): bool
    {
        if (in_array($type, self::QUERY_KEY)) {
            return true;
        }
        return false;
    }
}
