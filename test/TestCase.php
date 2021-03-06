<?php
namespace AdamTest\Model;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Container\ContainerInterface;

/**
 * Class AbstractTestCase
 *
 * @package IndigoTest\ORM
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/indigo-orm
 */
abstract class TestCase extends BaseTestCase
{
    private ContainerInterface $container;
    private EntityManagerInterface $em;

    /**
     * @throws ToolsException
     */
    protected function setUp(): void
    {
        parent::setUp();

        $em = $this->getEntityManager();
        $schemaTool = new SchemaTool($em);
        $schemaTool->createSchema($em->getMetadataFactory()->getAllMetadata());
    }

    /**
     * @return ContainerInterface
     */
    protected function getContainer(): ContainerInterface
    {
        if (!isset($this->container)) {
            $this->container = include __DIR__ . '/container.php';
        }

        return $this->container;
    }

    /**
     * @return EntityManagerInterface
     */
    protected function getEntityManager(): EntityManagerInterface
    {
        if (!isset($this->em)) {
            $container = $this->getContainer();
            $this->em = $container->get(EntityManagerInterface::class);
        }

        return $this->em;
    }
}
