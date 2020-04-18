<?php
namespace Adam\Model\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait SyncableTrait
 *
 * @package Adam\Model\Traits
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 */
trait SyncableTrait
{
    /**
     * @ORM\Column(type="datetime")
     */
    protected ?DateTime $lastSync;

    /**
     * @return DateTime|null
     */
    public function getLastSync(): ?DateTime
    {
        return $this->lastSync;
    }

    /**
     * @param DateTime $lastSync
     */
    public function setLastSync(DateTime $lastSync): void
    {
        $this->lastSync = $lastSync;
    }
}
