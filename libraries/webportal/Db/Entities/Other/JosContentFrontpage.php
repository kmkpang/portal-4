<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosContentFrontpage
 *
 * @ORM\Table(name="jos_content_frontpage")
 * @ORM\Entity
 */
class JosContentFrontpage
{
    /**
     * @var int
     *
     * @ORM\Column(name="content_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contentId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ordering", type="integer", nullable=false)
     */
    private $ordering = '0';


    /**
     * Get contentId.
     *
     * @return int
     */
    public function getContentId()
    {
        return $this->contentId;
    }

    /**
     * Set ordering.
     *
     * @param int $ordering
     *
     * @return JosContentFrontpage
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
}
