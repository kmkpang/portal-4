<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosRedirectLinks
 *
 * @ORM\Table(name="jos_redirect_links", indexes={@ORM\Index(name="idx_old_url", columns={"old_url"}), @ORM\Index(name="idx_link_modifed", columns={"modified_date"})})
 * @ORM\Entity
 */
class JosRedirectLinks
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
     * @var string
     *
     * @ORM\Column(name="old_url", type="string", length=2048, nullable=false)
     */
    private $oldUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="new_url", type="string", length=2048, nullable=true)
     */
    private $newUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="referer", type="string", length=2048, nullable=false)
     */
    private $referer;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=false)
     */
    private $comment = '';

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $hits = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean", nullable=false)
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $createdDate = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_date", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $modifiedDate = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="header", type="smallint", nullable=false, options={"default"="301"})
     */
    private $header = '301';


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
     * Set oldUrl.
     *
     * @param string $oldUrl
     *
     * @return JosRedirectLinks
     */
    public function setOldUrl($oldUrl)
    {
        $this->oldUrl = $oldUrl;

        return $this;
    }

    /**
     * Get oldUrl.
     *
     * @return string
     */
    public function getOldUrl()
    {
        return $this->oldUrl;
    }

    /**
     * Set newUrl.
     *
     * @param string|null $newUrl
     *
     * @return JosRedirectLinks
     */
    public function setNewUrl($newUrl = null)
    {
        $this->newUrl = $newUrl;

        return $this;
    }

    /**
     * Get newUrl.
     *
     * @return string|null
     */
    public function getNewUrl()
    {
        return $this->newUrl;
    }

    /**
     * Set referer.
     *
     * @param string $referer
     *
     * @return JosRedirectLinks
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer.
     *
     * @return string
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set comment.
     *
     * @param string $comment
     *
     * @return JosRedirectLinks
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set hits.
     *
     * @param int $hits
     *
     * @return JosRedirectLinks
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * Get hits.
     *
     * @return int
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Set published.
     *
     * @param bool $published
     *
     * @return JosRedirectLinks
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published.
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set createdDate.
     *
     * @param \DateTime $createdDate
     *
     * @return JosRedirectLinks
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate.
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set modifiedDate.
     *
     * @param \DateTime $modifiedDate
     *
     * @return JosRedirectLinks
     */
    public function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;

        return $this;
    }

    /**
     * Get modifiedDate.
     *
     * @return \DateTime
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * Set header.
     *
     * @param int $header
     *
     * @return JosRedirectLinks
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get header.
     *
     * @return int
     */
    public function getHeader()
    {
        return $this->header;
    }
}
