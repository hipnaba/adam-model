<?php
namespace Adam\Model\Entity\Corporation;

use Adam\Model\Entity\Character\Alliance;
use Adam\Model\Entity\Character\PlayerCharacter;
use Adam\Model\Entity\Item\Item;
use Adam\Model\Entity\Station\Station;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class PlayerCorporation
 *
 * @package Adam\Model\Entity\Corporation
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="corporation_player")
 */
class PlayerCorporation extends Item
{
    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\Alliance")
     * @ORM\JoinColumn(name="alliance_id", referencedColumnName="id", nullable=true)
     */
    private ?Alliance $alliance;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\PlayerCharacter")
     * @ORM\JoinColumn(name="ceo_id", referencedColumnName="id", nullable=false)
     */
    private PlayerCharacter $ceo;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Character\PlayerCharacter")
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=false)
     */
    private PlayerCharacter $creator;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $date_founded;

    /**
     * @ORM\ManyToOne(targetEntity="\Adam\Model\Entity\Station\Station")
     * @ORM\JoinColumn(name="home_station_id", referencedColumnName="id", nullable=false)
     */
    private Station $home_station;

    /**
     * @ORM\Column(type="integer")
     */
    private int $member_count;

    /**
     * @ORM\Column(type="integer")
     */
    private int $shares;

    /**
     * @ORM\Column(type="float")
     */
    private float $tax_rate;

    /**
     * @ORM\Column(type="string")
     */
    private string $ticker;

    /**
     * @ORM\Column(type="string")
     */
    private string $url;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $war_eligible;

    /**
     * @return Alliance|null
     */
    public function getAlliance(): ?Alliance
    {
        return $this->alliance;
    }

    /**
     * @return PlayerCharacter
     */
    public function getCeo(): PlayerCharacter
    {
        return $this->ceo;
    }

    /**
     * @return PlayerCharacter
     */
    public function getCreator(): PlayerCharacter
    {
        return $this->creator;
    }

    /**
     * @return DateTime
     */
    public function getDateFounded(): DateTime
    {
        return $this->date_founded;
    }

    /**
     * @return Station
     */
    public function getHomeStation(): Station
    {
        return $this->home_station;
    }

    /**
     * @return int
     */
    public function getMemberCount(): int
    {
        return $this->member_count;
    }

    /**
     * @return int
     */
    public function getShares(): int
    {
        return $this->shares;
    }

    /**
     * @return float
     */
    public function getTaxRate(): float
    {
        return $this->tax_rate;
    }

    /**
     * @return string
     */
    public function getTicker(): string
    {
        return $this->ticker;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function isWarEligible(): bool
    {
        return $this->war_eligible;
    }
}
