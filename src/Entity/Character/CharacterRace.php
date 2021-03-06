<?php
namespace Adam\Model\Entity\Character;

use Adam\Model\Traits\DescriptionTrait;
use Adam\Model\Traits\IdTrait;
use Adam\Model\Traits\Item\ItemIconTrait;
use Adam\Model\Traits\NameTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class CharacterRace
 *
 * @package Adam\Model\Entity\Character
 * @author Danijel Fabijan <hipnaba@gmail.com>
 * @link https://github.com/hipnaba/adam-model
 *
 * @ORM\Entity()
 * @ORM\Table(name="character_race")
 */
class CharacterRace
{
    use IdTrait;
    use NameTrait;
    use ItemIconTrait;
    use DescriptionTrait;

    /**
     * @ORM\OneToMany(targetEntity="\Adam\Model\Entity\Character\CharacterBloodline", mappedBy="race")
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private Collection $bloodlines;

    /**
     * @ORM\Column(type="text")
     */
    private string $short_description;

    /**
     * CharacterRace constructor.
     */
    public function __construct()
    {
        $this->bloodlines = new ArrayCollection();
    }

    /**
     * @return CharacterBloodline[]|Collection
     */
    public function getBloodlines(): Collection
    {
        return $this->bloodlines;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->short_description;
    }
}
