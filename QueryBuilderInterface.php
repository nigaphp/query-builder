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

  /**
   * SQL QueryBuilderInterface
   *
   * @package Nigatedev
   * @subpackage QueryBuilder
   * @author Abass Ben Cheik <cheikabassben@gmail.com>
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
