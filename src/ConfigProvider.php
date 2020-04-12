<?php
namespace Adam\Model;

/**
 * Class ConfigProvider
 *
 * @package Adam\Model
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
final class ConfigProvider
{
    /**
     * @return array
     */
    public function __invoke(): array
    {
        return [
            'orm' => $this->getOrmConfig(),
        ];
    }

    /**
     * @return array
     */
    public function getOrmConfig(): array
    {
        return [
            'entity_paths' => [
                __DIR__ . '/Entity',
            ],
        ];
    }
}
