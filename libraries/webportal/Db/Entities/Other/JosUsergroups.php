<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUsergroups
 *
 * @ORM\Table(name="jos_usergroups", uniqueConstraints={@ORM\UniqueConstraint(name="idx_usergroup_parent_title_lookup", columns={"parent_id", "title"})}, indexes={@ORM\Index(name="idx_usergroup_title_lookup", columns={"title"}), @ORM\Index(name="idx_usergroup_adjacency_lookup", columns={"parent_id"}), @ORM\Index(name="idx_usergroup_nested_set_lookup", columns={"lft", "rgt"})})
 * @ORM\Entity
 */
class JosUsergroups
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
     * @ORM\Column(name="parent_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="Adjacency List Reference Id"})
     */
    private $parentId;

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="integer", nullable=false, options={"comment"="Nested set lft."})
     */
    private $lft;

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="integer", nullable=false, options={"comment"="Nested set rgt."})
     */
    private $rgt;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;


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
     * @return JosUsergroups
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
     * @return JosUsergroups
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
     * @return JosUsergroups
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
     * Set title.
     *
     * @param string $title
     *
     * @return JosUsergroups
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
}
