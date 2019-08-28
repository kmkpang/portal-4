<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosContent
 *
 * @ORM\Table(name="jos_content", indexes={@ORM\Index(name="idx_access", columns={"access"}), @ORM\Index(name="idx_checkout", columns={"checked_out"}), @ORM\Index(name="idx_state", columns={"state"}), @ORM\Index(name="idx_catid", columns={"catid"}), @ORM\Index(name="idx_createdby", columns={"created_by"}), @ORM\Index(name="idx_featured_catid", columns={"featured", "catid"}), @ORM\Index(name="idx_language", columns={"language"}), @ORM\Index(name="idx_xreference", columns={"xreference"}), @ORM\Index(name="idx_alias", columns={"alias"})})
 * @ORM\Entity
 */
class JosContent
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
     * @ORM\Column(name="asset_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="FK to the #__assets table."})
     */
    private $assetId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=400, nullable=false)
     */
    private $alias = '';

    /**
     * @var string
     *
     * @ORM\Column(name="introtext", type="text", length=16777215, nullable=false)
     */
    private $introtext;

    /**
     * @var string
     *
     * @ORM\Column(name="fulltext", type="text", length=16777215, nullable=false)
     */
    private $fulltext;

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
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $created = '0000-00-00 00:00:00';

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
     * @var string
     *
     * @ORM\Column(name="images", type="text", length=65535, nullable=false)
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="urls", type="text", length=65535, nullable=false)
     */
    private $urls;

    /**
     * @var string
     *
     * @ORM\Column(name="attribs", type="string", length=5120, nullable=false)
     */
    private $attribs;

    /**
     * @var int
     *
     * @ORM\Column(name="version", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $version = '1';

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
     * @ORM\Column(name="metadesc", type="text", length=65535, nullable=false)
     */
    private $metadesc;

    /**
     * @var int
     *
     * @ORM\Column(name="access", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $access = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $hits = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="metadata", type="text", length=65535, nullable=false)
     */
    private $metadata;

    /**
     * @var bool
     *
     * @ORM\Column(name="featured", type="boolean", nullable=false, options={"comment"="Set if article is featured."})
     */
    private $featured = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=7, nullable=false, options={"fixed"=true,"comment"="The language code for the article."})
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="xreference", type="string", length=50, nullable=false, options={"comment"="A reference to enable linkages to external data sets."})
     */
    private $xreference = '';

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=false)
     */
    private $note = '';


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
     * Set assetId.
     *
     * @param int $assetId
     *
     * @return JosContent
     */
    public function setAssetId($assetId)
    {
        $this->assetId = $assetId;

        return $this;
    }

    /**
     * Get assetId.
     *
     * @return int
     */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return JosContent
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
     * Set alias.
     *
     * @param string $alias
     *
     * @return JosContent
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
     * Set introtext.
     *
     * @param string $introtext
     *
     * @return JosContent
     */
    public function setIntrotext($introtext)
    {
        $this->introtext = $introtext;

        return $this;
    }

    /**
     * Get introtext.
     *
     * @return string
     */
    public function getIntrotext()
    {
        return $this->introtext;
    }

    /**
     * Set fulltext.
     *
     * @param string $fulltext
     *
     * @return JosContent
     */
    public function setFulltext($fulltext)
    {
        $this->fulltext = $fulltext;

        return $this;
    }

    /**
     * Get fulltext.
     *
     * @return string
     */
    public function getFulltext()
    {
        return $this->fulltext;
    }

    /**
     * Set state.
     *
     * @param bool $state
     *
     * @return JosContent
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
     * @return JosContent
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
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return JosContent
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
     * Set createdBy.
     *
     * @param int $createdBy
     *
     * @return JosContent
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
     * @return JosContent
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
     * @return JosContent
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
     * @return JosContent
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
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosContent
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
     * @return JosContent
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
     * @return JosContent
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
     * @return JosContent
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
     * Set images.
     *
     * @param string $images
     *
     * @return JosContent
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images.
     *
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set urls.
     *
     * @param string $urls
     *
     * @return JosContent
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;

        return $this;
    }

    /**
     * Get urls.
     *
     * @return string
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * Set attribs.
     *
     * @param string $attribs
     *
     * @return JosContent
     */
    public function setAttribs($attribs)
    {
        $this->attribs = $attribs;

        return $this;
    }

    /**
     * Get attribs.
     *
     * @return string
     */
    public function getAttribs()
    {
        return $this->attribs;
    }

    /**
     * Set version.
     *
     * @param int $version
     *
     * @return JosContent
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

    /**
     * Set ordering.
     *
     * @param int $ordering
     *
     * @return JosContent
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
     * @return JosContent
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
     * Set metadesc.
     *
     * @param string $metadesc
     *
     * @return JosContent
     */
    public function setMetadesc($metadesc)
    {
        $this->metadesc = $metadesc;

        return $this;
    }

    /**
     * Get metadesc.
     *
     * @return string
     */
    public function getMetadesc()
    {
        return $this->metadesc;
    }

    /**
     * Set access.
     *
     * @param int $access
     *
     * @return JosContent
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access.
     *
     * @return int
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set hits.
     *
     * @param int $hits
     *
     * @return JosContent
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
     * Set metadata.
     *
     * @param string $metadata
     *
     * @return JosContent
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Get metadata.
     *
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Set featured.
     *
     * @param bool $featured
     *
     * @return JosContent
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured.
     *
     * @return bool
     */
    public function getFeatured()
    {
        return $this->featured;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return JosContent
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
     * Set xreference.
     *
     * @param string $xreference
     *
     * @return JosContent
     */
    public function setXreference($xreference)
    {
        $this->xreference = $xreference;

        return $this;
    }

    /**
     * Get xreference.
     *
     * @return string
     */
    public function getXreference()
    {
        return $this->xreference;
    }

    /**
     * Set note.
     *
     * @param string $note
     *
     * @return JosContent
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
}
