<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Entity\Corporation\PlayerCorporation;
use Adam\Model\Entity\Item\Item;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Alliance
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="character_alliance")
 */
class Alliance extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Corporation\PlayerCorporation")
     * @ORM\JoinColumn(name="creator_corporation_id", referencedColumnName="id", nullable=false)
     */
    private PlayerCorporation $creator_corporation;

    /**
     * @ORM\ManyToOne(targetEntity="PlayerCharacter")
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=false)
     */
    private PlayerCharacter $creator;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Corporation\PlayerCorporation")
     * @ORM\JoinColumn(name="executor_id", referencedColumnName="id", nullable=false)
     */
    private PlayerCorporation $executor;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private string $ticker;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $date_founded;

    /**
     * @return PlayerCorporation
     */
    public function getCreatorCorporation(): PlayerCorporation
    {
        return $this->creator_corporation;
    }

    /**
     * @return PlayerCharacter
     */
    public function getCreator(): PlayerCharacter
    {
        return $this->creator;
    }

    /**
     * @return PlayerCorporation
     */
    public function getExecutor(): PlayerCorporation
    {
        return $this->executor;
    }

    /**
     * @return string
     */
    public function getTicker(): string
    {
        return $this->ticker;
    }

    /**
     * @return DateTime
     */
    public function getDateFounded(): DateTime
    {
        return $this->date_founded;
    }
}
