<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosBanners
 *
 * @ORM\Table(name="jos_banners", indexes={@ORM\Index(name="idx_state", columns={"state"}), @ORM\Index(name="idx_own_prefix", columns={"own_prefix"}), @ORM\Index(name="idx_metakey_prefix", columns={"metakey_prefix"}), @ORM\Index(name="idx_banner_catid", columns={"catid"}), @ORM\Index(name="idx_language", columns={"language"})})
 * @ORM\Entity
 */
class JosBanners
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="cid", type="integer", nullable=false)
     */
    private $cid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=400, nullable=false)
     */
    private $alias = '';

    /**
     * @var int
     *
     * @ORM\Column(name="imptotal", type="integer", nullable=false)
     */
    private $imptotal = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="impmade", type="integer", nullable=false)
     */
    private $impmade = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="clicks", type="integer", nullable=false)
     */
    private $clicks = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="clickurl", type="string", length=200, nullable=false)
     */
    private $clickurl = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=false)
     */
    private $state = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="catid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $catid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="custombannercode", type="string", length=2048, nullable=false)
     */
    private $custombannercode;

    /**
     * @var bool
     *
     * @ORM\Column(name="sticky", type="boolean", nullable=false)
     */
    private $sticky = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ordering", type="integer", nullable=false)
     */
    private $ordering = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="metakey", type="text", length=65535, nullable=false)
     */
    private $metakey;

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params;

    /**
     * @var bool
     *
     * @ORM\Column(name="own_prefix", type="boolean", nullable=false)
     */
    private $ownPrefix = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="metakey_prefix", type="string", length=400, nullable=false)
     */
    private $metakeyPrefix = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="purchase_type", type="boolean", nullable=false, options={"default"="-1"})
     */
    private $purchaseType = '-1';

    /**
     * @var bool
     *
     * @ORM\Column(name="track_clicks", type="boolean", nullable=false, options={"default"="-1"})
     */
    private $trackClicks = '-1';

    /**
     * @var bool
     *
     * @ORM\Column(name="track_impressions", type="boolean", nullable=false, options={"default"="-1"})
     */
    private $trackImpressions = '-1';

    /**
     * @var int
     *
     * @ORM\Column(name="checked_out", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $checkedOut = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checked_out_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $checkedOutTime = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_up", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $publishUp = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_down", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $publishDown = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reset", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $reset = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $created = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=7, nullable=false, options={"fixed"=true})
     */
    private $language = '';

    /**
     * @var int
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $createdBy = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="created_by_alias", type="string", length=255, nullable=false)
     */
    private $createdByAlias = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $modified = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="modified_by", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $modifiedBy = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="version", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $version = '1';


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
     * Set cid.
     *
     * @param int $cid
     *
     * @return JosBanners
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid.
     *
     * @return int
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set type.
     *
     * @param int $type
     *
     * @return JosBanners
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return JosBanners
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
     * Set alias.
     *
     * @param string $alias
     *
     * @return JosBanners
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias.
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set imptotal.
     *
     * @param int $imptotal
     *
     * @return JosBanners
     */
    public function setImptotal($imptotal)
    {
        $this->imptotal = $imptotal;

        return $this;
    }

    /**
     * Get imptotal.
     *
     * @return int
     */
    public function getImptotal()
    {
        return $this->imptotal;
    }

    /**
     * Set impmade.
     *
     * @param int $impmade
     *
     * @return JosBanners
     */
    public function setImpmade($impmade)
    {
        $this->impmade = $impmade;

        return $this;
    }

    /**
     * Get impmade.
     *
     * @return int
     */
    public function getImpmade()
    {
        return $this->impmade;
    }

    /**
     * Set clicks.
     *
     * @param int $clicks
     *
     * @return JosBanners
     */
    public function setClicks($clicks)
    {
        $this->clicks = $clicks;

        return $this;
    }

    /**
     * Get clicks.
     *
     * @return int
     */
    public function getClicks()
    {
        return $this->clicks;
    }

    /**
     * Set clickurl.
     *
     * @param string $clickurl
     *
     * @return JosBanners
     */
    public function setClickurl($clickurl)
    {
        $this->clickurl = $clickurl;

        return $this;
    }

    /**
     * Get clickurl.
     *
     * @return string
     */
    public function getClickurl()
    {
        return $this->clickurl;
    }

    /**
     * Set state.
     *
     * @param bool $state
     *
     * @return JosBanners
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
     * Set catid.
     *
     * @param int $catid
     *
     * @return JosBanners
     */
    public function setCatid($catid)
    {
        $this->catid = $catid;

        return $this;
    }

    /**
     * Get catid.
     *
     * @return int
     */
    public function getCatid()
    {
        return $this->catid;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return JosBanners
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set custombannercode.
     *
     * @param string $custombannercode
     *
     * @return JosBanners
     */
    public function setCustombannercode($custombannercode)
    {
        $this->custombannercode = $custombannercode;

        return $this;
    }

    /**
     * Get custombannercode.
     *
     * @return string
     */
    public function getCustombannercode()
    {
        return $this->custombannercode;
    }

    /**
     * Set sticky.
     *
     * @param bool $sticky
     *
     * @return JosBanners
     */
    public function setSticky($sticky)
    {
        $this->sticky = $sticky;

        return $this;
    }

    /**
     * Get sticky.
     *
     * @return bool
     */
    public function getSticky()
    {
        return $this->sticky;
    }

    /**
     * Set ordering.
     *
     * @param int $ordering
     *
     * @return JosBanners
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
     * Set metakey.
     *
     * @param string $metakey
     *
     * @return JosBanners
     */
    public function setMetakey($metakey)
    {
        $this->metakey = $metakey;

        return $this;
    }

    /**
     * Get metakey.
     *
     * @return string
     */
    public function getMetakey()
    {
        return $this->metakey;
    }

    /**
     * Set params.
     *
     * @param string $params
     *
     * @return JosBanners
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params.
     *
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set ownPrefix.
     *
     * @param bool $ownPrefix
     *
     * @return JosBanners
     */
    public function setOwnPrefix($ownPrefix)
    {
        $this->ownPrefix = $ownPrefix;

        return $this;
    }

    /**
     * Get ownPrefix.
     *
     * @return bool
     */
    public function getOwnPrefix()
    {
        return $this->ownPrefix;
    }

    /**
     * Set metakeyPrefix.
     *
     * @param string $metakeyPrefix
     *
     * @return JosBanners
     */
    public function setMetakeyPrefix($metakeyPrefix)
    {
        $this->metakeyPrefix = $metakeyPrefix;

        return $this;
    }

    /**
     * Get metakeyPrefix.
     *
     * @return string
     */
    public function getMetakeyPrefix()
    {
        return $this->metakeyPrefix;
    }

    /**
     * Set purchaseType.
     *
     * @param bool $purchaseType
     *
     * @return JosBanners
     */
    public function setPurchaseType($purchaseType)
    {
        $this->purchaseType = $purchaseType;

        return $this;
    }

    /**
     * Get purchaseType.
     *
     * @return bool
     */
    public function getPurchaseType()
    {
        return $this->purchaseType;
    }

    /**
     * Set trackClicks.
     *
     * @param bool $trackClicks
     *
     * @return JosBanners
     */
    public function setTrackClicks($trackClicks)
    {
        $this->trackClicks = $trackClicks;

        return $this;
    }

    /**
     * Get trackClicks.
     *
     * @return bool
     */
    public function getTrackClicks()
    {
        return $this->trackClicks;
    }

    /**
     * Set trackImpressions.
     *
     * @param bool $trackImpressions
     *
     * @return JosBanners
     */
    public function setTrackImpressions($trackImpressions)
    {
        $this->trackImpressions = $trackImpressions;

        return $this;
    }

    /**
     * Get trackImpressions.
     *
     * @return bool
     */
    public function getTrackImpressions()
    {
        return $this->trackImpressions;
    }

    /**
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosBanners
     */
    public function setCheckedOut($checkedOut)
    {
        $this->checkedOut = $checkedOut;

        return $this;
    }

    /**
     * Get checkedOut.
     *
     * @return int
     */
    public function getCheckedOut()
    {
        return $this->checkedOut;
    }

    /**
     * Set checkedOutTime.
     *
     * @param \DateTime $checkedOutTime
     *
     * @return JosBanners
     */
    public function setCheckedOutTime($checkedOutTime)
    {
        $this->checkedOutTime = $checkedOutTime;

        return $this;
    }

    /**
     * Get checkedOutTime.
     *
     * @return \DateTime
     */
    public function getCheckedOutTime()
    {
        return $this->checkedOutTime;
    }

    /**
     * Set publishUp.
     *
     * @param \DateTime $publishUp
     *
     * @return JosBanners
     */
    public function setPublishUp($publishUp)
    {
        $this->publishUp = $publishUp;

        return $this;
    }

    /**
     * Get publishUp.
     *
     * @return \DateTime
     */
    public function getPublishUp()
    {
        return $this->publishUp;
    }

    /**
     * Set publishDown.
     *
     * @param \DateTime $publishDown
     *
     * @return JosBanners
     */
    public function setPublishDown($publishDown)
    {
        $this->publishDown = $publishDown;

        return $this;
    }

    /**
     * Get publishDown.
     *
     * @return \DateTime
     */
    public function getPublishDown()
    {
        return $this->publishDown;
    }

    /**
     * Set reset.
     *
     * @param \DateTime $reset
     *
     * @return JosBanners
     */
    public function setReset($reset)
    {
        $this->reset = $reset;

        return $this;
    }

    /**
     * Get reset.
     *
     * @return \DateTime
     */
    public function getReset()
    {
        return $this->reset;
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return JosBanners
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return JosBanners
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
     * Set createdBy.
     *
     * @param int $createdBy
     *
     * @return JosBanners
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy.
     *
     * @return int
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set createdByAlias.
     *
     * @param string $createdByAlias
     *
     * @return JosBanners
     */
    public function setCreatedByAlias($createdByAlias)
    {
        $this->createdByAlias = $createdByAlias;

        return $this;
    }

    /**
     * Get createdByAlias.
     *
     * @return string
     */
    public function getCreatedByAlias()
    {
        return $this->createdByAlias;
    }

    /**
     * Set modified.
     *
     * @param \DateTime $modified
     *
     * @return JosBanners
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified.
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set modifiedBy.
     *
     * @param int $modifiedBy
     *
     * @return JosBanners
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy.
     *
     * @return int
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set version.
     *
     * @param int $version
     *
     * @return JosBanners
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }
}
