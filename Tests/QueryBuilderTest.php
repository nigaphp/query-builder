<?php

class QueryBuilderTest extends \PHPUnit\Framework\TestCase {
    
    public function setUp(): void
    {
        $db = new PDO("sqlite::memory:");
        
        $db->exec("CREATE TABLE IF NOT EXISTS product
        (id INTEGER PRIMARY KEY AUTOINCREMENT,
        title VARCHAR(100) NOT NULL,
        desk TEXT NOT NULL);");
       
        $db->exec("INSERT INTO product
        (title, desk)
        VALUES
        ('Infinix Zero 5 Pro', 'Find the best and most updated price of Zero 5 Pro...'),
        ('Nokia 6310', 'Nokia 6310 (2021)'),
        ('Samsung Galaxy S10+', 'Samsung has once again topped the competition with the Galaxy S10+...');");
        
        $this->query = new \Niga\Framework\QueryBuilder\QueryBuilder($db);
    }
    
    /**
     * @test
     */
    public function select()
    {
        $q = $this->query
                  ->from("product")
                  ->toSQL(); 
        $this->assertEquals("SELECT * FROM product", $q);
    }
    
    /**
     * @test
     */
    public function selectMultiple()
    {
        $q = $this->query
                  ->select("title", "desk")
                  ->from("product")
                  ->toSQL(); 
        $this->assertEquals("SELECT title, desk FROM product", $q);
    }
    
    /**
     * @test
     */
    public function fetch()
    {
        $q = $this->query
                  ->from("product")
                  ->fetch();
        $this->assertIsArray($q);
    }
    
    
    /**
     * @test
     */
    public function fetchAll()
    {
        $q = $this->query
                  ->from("product")
                  ->fetchAll();
        $this->assertIsArray($q);
    }
    
}