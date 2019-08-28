<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosContactDetails
 *
 * @ORM\Table(name="jos_contact_details", indexes={@ORM\Index(name="idx_access", columns={"access"}), @ORM\Index(name="idx_checkout", columns={"checked_out"}), @ORM\Index(name="idx_state", columns={"published"}), @ORM\Index(name="idx_catid", columns={"catid"}), @ORM\Index(name="idx_createdby", columns={"created_by"}), @ORM\Index(name="idx_featured_catid", columns={"featured", "catid"}), @ORM\Index(name="idx_language", columns={"language"}), @ORM\Index(name="idx_xreference", columns={"xreference"})})
 * @ORM\Entity
 */
class JosContactDetails
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=400, nullable=false)
     */
    private $alias;

    /**
     * @var string|null
     *
     * @ORM\Column(name="con_position", type="string", length=255, nullable=true)
     */
    private $conPosition;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="text", length=65535, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="suburb", type="string", length=100, nullable=true)
     */
    private $suburb;

    /**
     * @var string|null
     *
     * @ORM\Column(name="state", type="string", length=100, nullable=true)
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=100, nullable=true)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postcode", type="string", length=100, nullable=true)
     */
    private $postcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="misc", type="text", length=16777215, nullable=true)
     */
    private $misc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email_to", type="string", length=255, nullable=true)
     */
    private $emailTo;

    /**
     * @var bool
     *
     * @ORM\Column(name="default_con", type="boolean", nullable=false)
     */
    private $defaultCon = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean", nullable=false)
     */
    private $published = '0';

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
     * @var int
     *
     * @ORM\Column(name="ordering", type="integer", nullable=false)
     */
    private $ordering = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="catid", type="integer", nullable=false)
     */
    private $catid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="access", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $access = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255, nullable=false)
     */
    private $mobile = '';

    /**
     * @var string
     *
     * @ORM\Column(name="webpage", type="string", length=255, nullable=false)
     */
    private $webpage = '';

    /**
     * @var string
     *
     * @ORM\Column(name="sortname1", type="string", length=255, nullable=false)
     */
    private $sortname1 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="sortname2", type="string", length=255, nullable=false)
     */
    private $sortname2 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="sortname3", type="string", length=255, nullable=false)
     */
    private $sortname3 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=7, nullable=false)
     */
    private $language;

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
     * @var string
     *
     * @ORM\Column(name="metadata", type="text", length=65535, nullable=false)
     */
    private $metadata;

    /**
     * @var bool
     *
     * @ORM\Column(name="featured", type="boolean", nullable=false, options={"comment"="Set if contact is featured."})
     */
    private $featured = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="xreference", type="string", length=50, nullable=false, options={"comment"="A reference to enable linkages to external data sets."})
     */
    private $xreference = '';

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
     * @var int
     *
     * @ORM\Column(name="version", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $version = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $hits = '0';


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
     * Set name.
     *
     * @param string $name
     *
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * Set conPosition.
     *
     * @param string|null $conPosition
     *
     * @return JosContactDetails
     */
    public function setConPosition($conPosition = null)
    {
        $this->conPosition = $conPosition;

        return $this;
    }

    /**
     * Get conPosition.
     *
     * @return string|null
     */
    public function getConPosition()
    {
        return $this->conPosition;
    }

    /**
     * Set address.
     *
     * @param string|null $address
     *
     * @return JosContactDetails
     */
    public function setAddress($address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set suburb.
     *
     * @param string|null $suburb
     *
     * @return JosContactDetails
     */
    public function setSuburb($suburb = null)
    {
        $this->suburb = $suburb;

        return $this;
    }

    /**
     * Get suburb.
     *
     * @return string|null
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * Set state.
     *
     * @param string|null $state
     *
     * @return JosContactDetails
     */
    public function setState($state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set country.
     *
     * @param string|null $country
     *
     * @return JosContactDetails
     */
    public function setCountry($country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postcode.
     *
     * @param string|null $postcode
     *
     * @return JosContactDetails
     */
    public function setPostcode($postcode = null)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode.
     *
     * @return string|null
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set telephone.
     *
     * @param string|null $telephone
     *
     * @return JosContactDetails
     */
    public function setTelephone($telephone = null)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone.
     *
     * @return string|null
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set fax.
     *
     * @param string|null $fax
     *
     * @return JosContactDetails
     */
    public function setFax($fax = null)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax.
     *
     * @return string|null
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set misc.
     *
     * @param string|null $misc
     *
     * @return JosContactDetails
     */
    public function setMisc($misc = null)
    {
        $this->misc = $misc;

        return $this;
    }

    /**
     * Get misc.
     *
     * @return string|null
     */
    public function getMisc()
    {
        return $this->misc;
    }

    /**
     * Set image.
     *
     * @param string|null $image
     *
     * @return JosContactDetails
     */
    public function setImage($image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set emailTo.
     *
     * @param string|null $emailTo
     *
     * @return JosContactDetails
     */
    public function setEmailTo($emailTo = null)
    {
        $this->emailTo = $emailTo;

        return $this;
    }

    /**
     * Get emailTo.
     *
     * @return string|null
     */
    public function getEmailTo()
    {
        return $this->emailTo;
    }

    /**
     * Set defaultCon.
     *
     * @param bool $defaultCon
     *
     * @return JosContactDetails
     */
    public function setDefaultCon($defaultCon)
    {
        $this->defaultCon = $defaultCon;

        return $this;
    }

    /**
     * Get defaultCon.
     *
     * @return bool
     */
    public function getDefaultCon()
    {
        return $this->defaultCon;
    }

    /**
     * Set published.
     *
     * @param bool $published
     *
     * @return JosContactDetails
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
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * Set ordering.
     *
     * @param int $ordering
     *
     * @return JosContactDetails
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
     * Set params.
     *
     * @param string $params
     *
     * @return JosContactDetails
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
     * Set userId.
     *
     * @param int $userId
     *
     * @return JosContactDetails
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set catid.
     *
     * @param int $catid
     *
     * @return JosContactDetails
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
     * Set access.
     *
     * @param int $access
     *
     * @return JosContactDetails
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
     * Set mobile.
     *
     * @param string $mobile
     *
     * @return JosContactDetails
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile.
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set webpage.
     *
     * @param string $webpage
     *
     * @return JosContactDetails
     */
    public function setWebpage($webpage)
    {
        $this->webpage = $webpage;

        return $this;
    }

    /**
     * Get webpage.
     *
     * @return string
     */
    public function getWebpage()
    {
        return $this->webpage;
    }

    /**
     * Set sortname1.
     *
     * @param string $sortname1
     *
     * @return JosContactDetails
     */
    public function setSortname1($sortname1)
    {
        $this->sortname1 = $sortname1;

        return $this;
    }

    /**
     * Get sortname1.
     *
     * @return string
     */
    public function getSortname1()
    {
        return $this->sortname1;
    }

    /**
     * Set sortname2.
     *
     * @param string $sortname2
     *
     * @return JosContactDetails
     */
    public function setSortname2($sortname2)
    {
        $this->sortname2 = $sortname2;

        return $this;
    }

    /**
     * Get sortname2.
     *
     * @return string
     */
    public function getSortname2()
    {
        return $this->sortname2;
    }

    /**
     * Set sortname3.
     *
     * @param string $sortname3
     *
     * @return JosContactDetails
     */
    public function setSortname3($sortname3)
    {
        $this->sortname3 = $sortname3;

        return $this;
    }

    /**
     * Get sortname3.
     *
     * @return string
     */
    public function getSortname3()
    {
        return $this->sortname3;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return JosContactDetails
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
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * Set metakey.
     *
     * @param string $metakey
     *
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * Set metadata.
     *
     * @param string $metadata
     *
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * Set xreference.
     *
     * @param string $xreference
     *
     * @return JosContactDetails
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
     * Set publishUp.
     *
     * @param \DateTime $publishUp
     *
     * @return JosContactDetails
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
     * @return JosContactDetails
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
     * Set version.
     *
     * @param int $version
     *
     * @return JosContactDetails
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
     * Set hits.
     *
     * @param int $hits
     *
     * @return JosContactDetails
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
}
