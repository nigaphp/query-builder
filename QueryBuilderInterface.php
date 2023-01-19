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
   * SQL QueryBuilderInterface
   *
   * @package Niga
   * @subpackage QueryBuilder
   * @author Abass Dev <abass@abassdev.com>
   */
interface QueryBuilderInterface
{
  
    /**
     * Select query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function selectQuery(): string;
    
    /**
     * Insert query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function insertQuery(): string;
    
    /**
     * Update query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function updateQuery(): string;
    
    /**
     * Delete query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function deleteQuery(): string;
    
    /**
     * Raw query constructor
     * 
     * @return string
     * @throws Exception
     */
    public function rawQuery(): string;
}
