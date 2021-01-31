<?php
/**
 * UserRepositoryTest.php
 *
 * desc exemple
 *
 * @author Jjeanniard
 * @version 0.0.1
 */

namespace App\Tests\Repository;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
{
    public function testCount(){

        self::bootKernel();

        $users = self::$container->get(UserRepository::class)->count([]);

        $this->assertEquals(1, $users);
    }
}