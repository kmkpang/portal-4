<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosViewlevels
 *
 * @ORM\Table(name="jos_viewlevels", uniqueConstraints={@ORM\UniqueConstraint(name="idx_assetgroup_title_lookup", columns={"title"})})
 * @ORM\Entity
 */
class JosViewlevels
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title = '';

    /**
     * @var int
     *
     * @ORM\Column(name="ordering", type="integer", nullable=false)
     */
    private $ordering = '0';

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
     * Set title.
     *
     * @param string $title
     *
     * @return JosViewlevels
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
     * Set ordering.
     *
     * @param int $ordering
     *
     * @return JosViewlevels
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering.
     *
     * @return int
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set rules.
     *
     * @param string $rules
     *
     * @return JosViewlevels
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
