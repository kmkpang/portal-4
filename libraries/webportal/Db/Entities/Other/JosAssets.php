<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosAssets
 *
 * @ORM\Table(name="jos_assets", uniqueConstraints={@ORM\UniqueConstraint(name="idx_asset_name", columns={"name"})}, indexes={@ORM\Index(name="idx_lft_rgt", columns={"lft", "rgt"}), @ORM\Index(name="idx_parent_id", columns={"parent_id"})})
 * @ORM\Entity
 */
class JosAssets
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true,"comment"="Primary Key"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false, options={"comment"="Nested set parent."})
     */
    private $parentId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="integer", nullable=false, options={"comment"="Nested set lft."})
     */
    private $lft = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="integer", nullable=false, options={"comment"="Nested set rgt."})
     */
    private $rgt = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer", nullable=false, options={"unsigned"=true,"comment"="The cached level in the nested tree."})
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false, options={"comment"="The unique name for the asset.
"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false, options={"comment"="The descriptive title for the asset."})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="rules", type="string", length=5120, nullable=false, options={"comment"="JSON encoded access control."})
     */
    private $rules;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set parentId.
     *
     * @param int $parentId
     *
     * @return JosAssets
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId.
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set lft.
     *
     * @param int $lft
     *
     * @return JosAssets
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft.
     *
     * @return int
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt.
     *
     * @param int $rgt
     *
     * @return JosAssets
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt.
     *
     * @return int
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set level.
     *
     * @param int $level
     *
     * @return JosAssets
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return JosAssets
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return JosAssets
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set rules.
     *
     * @param string $rules
     *
     * @return JosAssets
     */
    public function setRules($rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Get rules.
     *
     * @return string
     */
    public function getRules()
    {
        return $this->rules;
    }
}
