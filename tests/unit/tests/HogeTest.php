<?php
declare(strict_types=1);
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class HogeTest extends \PHPUnit\Framework\TestCase
{

    function test_hoge()
    {
        $con = $this->getConnection();

        $sql = 'SELECT * FROM posts WHERE id=:id';
        $params = ['id'=>3];
        $stmt = $con->prepare($sql);
        $stmt->execute($params);

        $result = $stmt->fetchAll();

        $this->assertSame('3', $result[0]['id']);
    }

    private function getConnection() {
        $dsn = [
            'dbname' => 'doctrine_dbal_study01',
            'user' => 'dbuser',
            'password' => 'dbpass',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
            'driverOptions' => [
                PDO::ATTR_EMULATE_PREPARES => true,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_AUTOCOMMIT => false,
            ],
            'charset' => 'utf8mb4'
        ];
        $config = new Configuration();
        $con = DriverManager::getConnection($dsn, $config);
        return $con;
    }
}