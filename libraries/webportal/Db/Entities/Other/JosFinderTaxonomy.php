<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosFinderTaxonomy
 *
 * @ORM\Table(name="jos_finder_taxonomy", indexes={@ORM\Index(name="parent_id", columns={"parent_id"}), @ORM\Index(name="state", columns={"state"}), @ORM\Index(name="ordering", columns={"ordering"}), @ORM\Index(name="access", columns={"access"}), @ORM\Index(name="idx_parent_published", columns={"parent_id", "state", "access"})})
 * @ORM\Entity
 */
class JosFinderTaxonomy
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $parentId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=false, options={"default"="1"})
     */
    private $state = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="access", type="boolean", nullable=false)
     */
    private $access;

    /**
     * @var bool
     *
     * @ORM\Column(name="ordering", type="boolean", nullable=false)
     */
    private $ordering;


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
     * @return JosFinderTaxonomy
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
     * Set title.
     *
     * @param string $title
     *
     * @return JosFinderTaxonomy
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
     * Set state.
     *
     * @param bool $state
     *
     * @return JosFinderTaxonomy
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return bool
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set access.
     *
     * @param bool $access
     *
     * @return JosFinderTaxonomy
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access.
     *
     * @return bool
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set ordering.
     *
     * @param bool $ordering
     *
     * @return JosFinderTaxonomy
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering.
     *
     * @return bool
     */
    public function getOrdering()
    {
        return $this->ordering;
    }
}
