<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosFinderLinks
 *
 * @ORM\Table(name="jos_finder_links", indexes={@ORM\Index(name="idx_type", columns={"type_id"}), @ORM\Index(name="idx_title", columns={"title"}), @ORM\Index(name="idx_md5", columns={"md5sum"}), @ORM\Index(name="idx_url", columns={"url"}), @ORM\Index(name="idx_published_list", columns={"published", "state", "access", "publish_start_date", "publish_end_date", "list_price"}), @ORM\Index(name="idx_published_sale", columns={"published", "state", "access", "publish_start_date", "publish_end_date", "sale_price"})})
 * @ORM\Entity
 */
class JosFinderLinks
{
    /**
     * @var int
     *
     * @ORM\Column(name="link_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $linkId;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    private $route;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=400, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="indexdate", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $indexdate = '0000-00-00 00:00:00';

    /**
     * @var string|null
     *
     * @ORM\Column(name="md5sum", type="string", length=32, nullable=true)
     */
    private $md5sum;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean", nullable=false, options={"default"="1"})
     */
    private $published = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="state", type="integer", nullable=true, options={"default"="1"})
     */
    private $state = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="access", type="integer", nullable=true)
     */
    private $access = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=8, nullable=false)
     */
    private $language;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_start_date", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $publishStartDate = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_end_date", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $publishEndDate = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $startDate = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $endDate = '0000-00-00 00:00:00';

    /**
     * @var float
     *
     * @ORM\Column(name="list_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $listPrice = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="sale_price", type="float", precision=10, scale=0, nullable=false)
     */
    private $salePrice = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="type_id", type="integer", nullable=false)
     */
    private $typeId;

    /**
     * @var string
     *
     * @ORM\Column(name="object", type="blob", length=16777215, nullable=false)
     */
    private $object;


    /**
     * Get linkId.
     *
     * @return int
     */
    public function getLinkId()
    {
        return $this->linkId;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return JosFinderLinks
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set route.
     *
     * @param string $route
     *
     * @return JosFinderLinks
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route.
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return JosFinderLinks
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return JosFinderLinks
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set indexdate.
     *
     * @param \DateTime $indexdate
     *
     * @return JosFinderLinks
     */
    public function setIndexdate($indexdate)
    {
        $this->indexdate = $indexdate;

        return $this;
    }

    /**
     * Get indexdate.
     *
     * @return \DateTime
     */
    public function getIndexdate()
    {
        return $this->indexdate;
    }

    /**
     * Set md5sum.
     *
     * @param string|null $md5sum
     *
     * @return JosFinderLinks
     */
    public function setMd5sum($md5sum = null)
    {
        $this->md5sum = $md5sum;

        return $this;
    }

    /**
     * Get md5sum.
     *
     * @return string|null
     */
    public function getMd5sum()
    {
        return $this->md5sum;
    }

    /**
     * Set published.
     *
     * @param bool $published
     *
     * @return JosFinderLinks
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
     * Set state.
     *
     * @param int|null $state
     *
     * @return JosFinderLinks
     */
    public function setState($state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return int|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set access.
     *
     * @param int|null $access
     *
     * @return JosFinderLinks
     */
    public function setAccess($access = null)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access.
     *
     * @return int|null
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return JosFinderLinks
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set publishStartDate.
     *
     * @param \DateTime $publishStartDate
     *
     * @return JosFinderLinks
     */
    public function setPublishStartDate($publishStartDate)
    {
        $this->publishStartDate = $publishStartDate;

        return $this;
    }

    /**
     * Get publishStartDate.
     *
     * @return \DateTime
     */
    public function getPublishStartDate()
    {
        return $this->publishStartDate;
    }

    /**
     * Set publishEndDate.
     *
     * @param \DateTime $publishEndDate
     *
     * @return JosFinderLinks
     */
    public function setPublishEndDate($publishEndDate)
    {
        $this->publishEndDate = $publishEndDate;

        return $this;
    }

    /**
     * Get publishEndDate.
     *
     * @return \DateTime
     */
    public function getPublishEndDate()
    {
        return $this->publishEndDate;
    }

    /**
     * Set startDate.
     *
     * @param \DateTime $startDate
     *
     * @return JosFinderLinks
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate.
     *
     * @param \DateTime $endDate
     *
     * @return JosFinderLinks
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set listPrice.
     *
     * @param float $listPrice
     *
     * @return JosFinderLinks
     */
    public function setListPrice($listPrice)
    {
        $this->listPrice = $listPrice;

        return $this;
    }

    /**
     * Get listPrice.
     *
     * @return float
     */
    public function getListPrice()
    {
        return $this->listPrice;
    }

    /**
     * Set salePrice.
     *
     * @param float $salePrice
     *
     * @return JosFinderLinks
     */
    public function setSalePrice($salePrice)
    {
        $this->salePrice = $salePrice;

        return $this;
    }

    /**
     * Get salePrice.
     *
     * @return float
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * Set typeId.
     *
     * @param int $typeId
     *
     * @return JosFinderLinks
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId.
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set object.
     *
     * @param string $object
     *
     * @return JosFinderLinks
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object.
     *
     * @return string
     */
    public function getObject()
    {
        return $this->object;
    }
}
