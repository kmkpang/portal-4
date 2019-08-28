<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosContentRating
 *
 * @ORM\Table(name="jos_content_rating")
 * @ORM\Entity
 */
class JosContentRating
{
    /**
     * @var int
     *
     * @ORM\Column(name="content_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $contentId;

    /**
     * @var int
     *
     * @ORM\Column(name="rating_sum", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $ratingSum;

    /**
     * @var int
     *
     * @ORM\Column(name="rating_count", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $ratingCount;

    /**
     * @var string
     *
     * @ORM\Column(name="lastip", type="string", length=50, nullable=false)
     */
    private $lastip;


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
     * Set ratingSum.
     *
     * @param int $ratingSum
     *
     * @return JosContentRating
     */
    public function setRatingSum($ratingSum)
    {
        $this->ratingSum = $ratingSum;

        return $this;
    }

    /**
     * Get ratingSum.
     *
     * @return int
     */
    public function getRatingSum()
    {
        return $this->ratingSum;
    }

    /**
     * Set ratingCount.
     *
     * @param int $ratingCount
     *
     * @return JosContentRating
     */
    public function setRatingCount($ratingCount)
    {
        $this->ratingCount = $ratingCount;

        return $this;
    }

    /**
     * Get ratingCount.
     *
     * @return int
     */
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * Set lastip.
     *
     * @param string $lastip
     *
     * @return JosContentRating
     */
    public function setLastip($lastip)
    {
        $this->lastip = $lastip;

        return $this;
    }

    /**
     * Get lastip.
     *
     * @return string
     */
    public function getLastip()
    {
        return $this->lastip;
    }
}
