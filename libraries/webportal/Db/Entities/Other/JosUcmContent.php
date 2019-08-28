<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUcmContent
 *
 * @ORM\Table(name="jos_ucm_content", indexes={@ORM\Index(name="tag_idx", columns={"core_state", "core_access"}), @ORM\Index(name="idx_access", columns={"core_access"}), @ORM\Index(name="idx_alias", columns={"core_alias"}), @ORM\Index(name="idx_language", columns={"core_language"}), @ORM\Index(name="idx_title", columns={"core_title"}), @ORM\Index(name="idx_modified_time", columns={"core_modified_time"}), @ORM\Index(name="idx_created_time", columns={"core_created_time"}), @ORM\Index(name="idx_content_type", columns={"core_type_alias"}), @ORM\Index(name="idx_core_modified_user_id", columns={"core_modified_user_id"}), @ORM\Index(name="idx_core_checked_out_user_id", columns={"core_checked_out_user_id"}), @ORM\Index(name="idx_core_created_user_id", columns={"core_created_user_id"}), @ORM\Index(name="idx_core_type_id", columns={"core_type_id"})})
 * @ORM\Entity
 */
class JosUcmContent
{
    /**
     * @var int
     *
     * @ORM\Column(name="core_content_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coreContentId;

    /**
     * @var string
     *
     * @ORM\Column(name="core_type_alias", type="string", length=400, nullable=false, options={"comment"="FK to the content types table"})
     */
    private $coreTypeAlias = '';

    /**
     * @var string
     *
     * @ORM\Column(name="core_title", type="string", length=400, nullable=false)
     */
    private $coreTitle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="core_alias", type="string", length=400, nullable=false)
     */
    private $coreAlias = '';

    /**
     * @var string
     *
     * @ORM\Column(name="core_body", type="text", length=16777215, nullable=false)
     */
    private $coreBody;

    /**
     * @var bool
     *
     * @ORM\Column(name="core_state", type="boolean", nullable=false)
     */
    private $coreState = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="core_checked_out_time", type="string", length=255, nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $coreCheckedOutTime = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="core_checked_out_user_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $coreCheckedOutUserId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="core_access", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $coreAccess = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="core_params", type="text", length=65535, nullable=false)
     */
    private $coreParams;

    /**
     * @var bool
     *
     * @ORM\Column(name="core_featured", type="boolean", nullable=false)
     */
    private $coreFeatured = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="core_metadata", type="string", length=2048, nullable=false, options={"comment"="JSON encoded metadata properties."})
     */
    private $coreMetadata = '';

    /**
     * @var int
     *
     * @ORM\Column(name="core_created_user_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $coreCreatedUserId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="core_created_by_alias", type="string", length=255, nullable=false)
     */
    private $coreCreatedByAlias = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="core_created_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $coreCreatedTime = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="core_modified_user_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="Most recent user that modified"})
     */
    private $coreModifiedUserId = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="core_modified_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $coreModifiedTime = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="core_language", type="string", length=7, nullable=false, options={"fixed"=true})
     */
    private $coreLanguage = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="core_publish_up", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $corePublishUp = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="core_publish_down", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $corePublishDown = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="core_content_item_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="ID from the individual type table"})
     */
    private $coreContentItemId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="asset_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="FK to the #__assets table."})
     */
    private $assetId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="core_images", type="text", length=65535, nullable=false)
     */
    private $coreImages;

    /**
     * @var string
     *
     * @ORM\Column(name="core_urls", type="text", length=65535, nullable=false)
     */
    private $coreUrls;

    /**
     * @var int
     *
     * @ORM\Column(name="core_hits", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $coreHits = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="core_version", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $coreVersion = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="core_ordering", type="integer", nullable=false)
     */
    private $coreOrdering = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="core_metakey", type="text", length=65535, nullable=false)
     */
    private $coreMetakey;

    /**
     * @var string
     *
     * @ORM\Column(name="core_metadesc", type="text", length=65535, nullable=false)
     */
    private $coreMetadesc;

    /**
     * @var int
     *
     * @ORM\Column(name="core_catid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $coreCatid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="core_xreference", type="string", length=50, nullable=false, options={"comment"="A reference to enable linkages to external data sets."})
     */
    private $coreXreference = '';

    /**
     * @var int
     *
     * @ORM\Column(name="core_type_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $coreTypeId = '0';


    /**
     * Get coreContentId.
     *
     * @return int
     */
    public function getCoreContentId()
    {
        return $this->coreContentId;
    }

    /**
     * Set coreTypeAlias.
     *
     * @param string $coreTypeAlias
     *
     * @return JosUcmContent
     */
    public function setCoreTypeAlias($coreTypeAlias)
    {
        $this->coreTypeAlias = $coreTypeAlias;

        return $this;
    }

    /**
     * Get coreTypeAlias.
     *
     * @return string
     */
    public function getCoreTypeAlias()
    {
        return $this->coreTypeAlias;
    }

    /**
     * Set coreTitle.
     *
     * @param string $coreTitle
     *
     * @return JosUcmContent
     */
    public function setCoreTitle($coreTitle)
    {
        $this->coreTitle = $coreTitle;

        return $this;
    }

    /**
     * Get coreTitle.
     *
     * @return string
     */
    public function getCoreTitle()
    {
        return $this->coreTitle;
    }

    /**
     * Set coreAlias.
     *
     * @param string $coreAlias
     *
     * @return JosUcmContent
     */
    public function setCoreAlias($coreAlias)
    {
        $this->coreAlias = $coreAlias;

        return $this;
    }

    /**
     * Get coreAlias.
     *
     * @return string
     */
    public function getCoreAlias()
    {
        return $this->coreAlias;
    }

    /**
     * Set coreBody.
     *
     * @param string $coreBody
     *
     * @return JosUcmContent
     */
    public function setCoreBody($coreBody)
    {
        $this->coreBody = $coreBody;

        return $this;
    }

    /**
     * Get coreBody.
     *
     * @return string
     */
    public function getCoreBody()
    {
        return $this->coreBody;
    }

    /**
     * Set coreState.
     *
     * @param bool $coreState
     *
     * @return JosUcmContent
     */
    public function setCoreState($coreState)
    {
        $this->coreState = $coreState;

        return $this;
    }

    /**
     * Get coreState.
     *
     * @return bool
     */
    public function getCoreState()
    {
        return $this->coreState;
    }

    /**
     * Set coreCheckedOutTime.
     *
     * @param string $coreCheckedOutTime
     *
     * @return JosUcmContent
     */
    public function setCoreCheckedOutTime($coreCheckedOutTime)
    {
        $this->coreCheckedOutTime = $coreCheckedOutTime;

        return $this;
    }

    /**
     * Get coreCheckedOutTime.
     *
     * @return string
     */
    public function getCoreCheckedOutTime()
    {
        return $this->coreCheckedOutTime;
    }

    /**
     * Set coreCheckedOutUserId.
     *
     * @param int $coreCheckedOutUserId
     *
     * @return JosUcmContent
     */
    public function setCoreCheckedOutUserId($coreCheckedOutUserId)
    {
        $this->coreCheckedOutUserId = $coreCheckedOutUserId;

        return $this;
    }

    /**
     * Get coreCheckedOutUserId.
     *
     * @return int
     */
    public function getCoreCheckedOutUserId()
    {
        return $this->coreCheckedOutUserId;
    }

    /**
     * Set coreAccess.
     *
     * @param int $coreAccess
     *
     * @return JosUcmContent
     */
    public function setCoreAccess($coreAccess)
    {
        $this->coreAccess = $coreAccess;

        return $this;
    }

    /**
     * Get coreAccess.
     *
     * @return int
     */
    public function getCoreAccess()
    {
        return $this->coreAccess;
    }

    /**
     * Set coreParams.
     *
     * @param string $coreParams
     *
     * @return JosUcmContent
     */
    public function setCoreParams($coreParams)
    {
        $this->coreParams = $coreParams;

        return $this;
    }

    /**
     * Get coreParams.
     *
     * @return string
     */
    public function getCoreParams()
    {
        return $this->coreParams;
    }

    /**
     * Set coreFeatured.
     *
     * @param bool $coreFeatured
     *
     * @return JosUcmContent
     */
    public function setCoreFeatured($coreFeatured)
    {
        $this->coreFeatured = $coreFeatured;

        return $this;
    }

    /**
     * Get coreFeatured.
     *
     * @return bool
     */
    public function getCoreFeatured()
    {
        return $this->coreFeatured;
    }

    /**
     * Set coreMetadata.
     *
     * @param string $coreMetadata
     *
     * @return JosUcmContent
     */
    public function setCoreMetadata($coreMetadata)
    {
        $this->coreMetadata = $coreMetadata;

        return $this;
    }

    /**
     * Get coreMetadata.
     *
     * @return string
     */
    public function getCoreMetadata()
    {
        return $this->coreMetadata;
    }

    /**
     * Set coreCreatedUserId.
     *
     * @param int $coreCreatedUserId
     *
     * @return JosUcmContent
     */
    public function setCoreCreatedUserId($coreCreatedUserId)
    {
        $this->coreCreatedUserId = $coreCreatedUserId;

        return $this;
    }

    /**
     * Get coreCreatedUserId.
     *
     * @return int
     */
    public function getCoreCreatedUserId()
    {
        return $this->coreCreatedUserId;
    }

    /**
     * Set coreCreatedByAlias.
     *
     * @param string $coreCreatedByAlias
     *
     * @return JosUcmContent
     */
    public function setCoreCreatedByAlias($coreCreatedByAlias)
    {
        $this->coreCreatedByAlias = $coreCreatedByAlias;

        return $this;
    }

    /**
     * Get coreCreatedByAlias.
     *
     * @return string
     */
    public function getCoreCreatedByAlias()
    {
        return $this->coreCreatedByAlias;
    }

    /**
     * Set coreCreatedTime.
     *
     * @param \DateTime $coreCreatedTime
     *
     * @return JosUcmContent
     */
    public function setCoreCreatedTime($coreCreatedTime)
    {
        $this->coreCreatedTime = $coreCreatedTime;

        return $this;
    }

    /**
     * Get coreCreatedTime.
     *
     * @return \DateTime
     */
    public function getCoreCreatedTime()
    {
        return $this->coreCreatedTime;
    }

    /**
     * Set coreModifiedUserId.
     *
     * @param int $coreModifiedUserId
     *
     * @return JosUcmContent
     */
    public function setCoreModifiedUserId($coreModifiedUserId)
    {
        $this->coreModifiedUserId = $coreModifiedUserId;

        return $this;
    }

    /**
     * Get coreModifiedUserId.
     *
     * @return int
     */
    public function getCoreModifiedUserId()
    {
        return $this->coreModifiedUserId;
    }

    /**
     * Set coreModifiedTime.
     *
     * @param \DateTime $coreModifiedTime
     *
     * @return JosUcmContent
     */
    public function setCoreModifiedTime($coreModifiedTime)
    {
        $this->coreModifiedTime = $coreModifiedTime;

        return $this;
    }

    /**
     * Get coreModifiedTime.
     *
     * @return \DateTime
     */
    public function getCoreModifiedTime()
    {
        return $this->coreModifiedTime;
    }

    /**
     * Set coreLanguage.
     *
     * @param string $coreLanguage
     *
     * @return JosUcmContent
     */
    public function setCoreLanguage($coreLanguage)
    {
        $this->coreLanguage = $coreLanguage;

        return $this;
    }

    /**
     * Get coreLanguage.
     *
     * @return string
     */
    public function getCoreLanguage()
    {
        return $this->coreLanguage;
    }

    /**
     * Set corePublishUp.
     *
     * @param \DateTime $corePublishUp
     *
     * @return JosUcmContent
     */
    public function setCorePublishUp($corePublishUp)
    {
        $this->corePublishUp = $corePublishUp;

        return $this;
    }

    /**
     * Get corePublishUp.
     *
     * @return \DateTime
     */
    public function getCorePublishUp()
    {
        return $this->corePublishUp;
    }

    /**
     * Set corePublishDown.
     *
     * @param \DateTime $corePublishDown
     *
     * @return JosUcmContent
     */
    public function setCorePublishDown($corePublishDown)
    {
        $this->corePublishDown = $corePublishDown;

        return $this;
    }

    /**
     * Get corePublishDown.
     *
     * @return \DateTime
     */
    public function getCorePublishDown()
    {
        return $this->corePublishDown;
    }

    /**
     * Set coreContentItemId.
     *
     * @param int $coreContentItemId
     *
     * @return JosUcmContent
     */
    public function setCoreContentItemId($coreContentItemId)
    {
        $this->coreContentItemId = $coreContentItemId;

        return $this;
    }

    /**
     * Get coreContentItemId.
     *
     * @return int
     */
    public function getCoreContentItemId()
    {
        return $this->coreContentItemId;
    }

    /**
     * Set assetId.
     *
     * @param int $assetId
     *
     * @return JosUcmContent
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
     * Set coreImages.
     *
     * @param string $coreImages
     *
     * @return JosUcmContent
     */
    public function setCoreImages($coreImages)
    {
        $this->coreImages = $coreImages;

        return $this;
    }

    /**
     * Get coreImages.
     *
     * @return string
     */
    public function getCoreImages()
    {
        return $this->coreImages;
    }

    /**
     * Set coreUrls.
     *
     * @param string $coreUrls
     *
     * @return JosUcmContent
     */
    public function setCoreUrls($coreUrls)
    {
        $this->coreUrls = $coreUrls;

        return $this;
    }

    /**
     * Get coreUrls.
     *
     * @return string
     */
    public function getCoreUrls()
    {
        return $this->coreUrls;
    }

    /**
     * Set coreHits.
     *
     * @param int $coreHits
     *
     * @return JosUcmContent
     */
    public function setCoreHits($coreHits)
    {
        $this->coreHits = $coreHits;

        return $this;
    }

    /**
     * Get coreHits.
     *
     * @return int
     */
    public function getCoreHits()
    {
        return $this->coreHits;
    }

    /**
     * Set coreVersion.
     *
     * @param int $coreVersion
     *
     * @return JosUcmContent
     */
    public function setCoreVersion($coreVersion)
    {
        $this->coreVersion = $coreVersion;

        return $this;
    }

    /**
     * Get coreVersion.
     *
     * @return int
     */
    public function getCoreVersion()
    {
        return $this->coreVersion;
    }

    /**
     * Set coreOrdering.
     *
     * @param int $coreOrdering
     *
     * @return JosUcmContent
     */
    public function setCoreOrdering($coreOrdering)
    {
        $this->coreOrdering = $coreOrdering;

        return $this;
    }

    /**
     * Get coreOrdering.
     *
     * @return int
     */
    public function getCoreOrdering()
    {
        return $this->coreOrdering;
    }

    /**
     * Set coreMetakey.
     *
     * @param string $coreMetakey
     *
     * @return JosUcmContent
     */
    public function setCoreMetakey($coreMetakey)
    {
        $this->coreMetakey = $coreMetakey;

        return $this;
    }

    /**
     * Get coreMetakey.
     *
     * @return string
     */
    public function getCoreMetakey()
    {
        return $this->coreMetakey;
    }

    /**
     * Set coreMetadesc.
     *
     * @param string $coreMetadesc
     *
     * @return JosUcmContent
     */
    public function setCoreMetadesc($coreMetadesc)
    {
        $this->coreMetadesc = $coreMetadesc;

        return $this;
    }

    /**
     * Get coreMetadesc.
     *
     * @return string
     */
    public function getCoreMetadesc()
    {
        return $this->coreMetadesc;
    }

    /**
     * Set coreCatid.
     *
     * @param int $coreCatid
     *
     * @return JosUcmContent
     */
    public function setCoreCatid($coreCatid)
    {
        $this->coreCatid = $coreCatid;

        return $this;
    }

    /**
     * Get coreCatid.
     *
     * @return int
     */
    public function getCoreCatid()
    {
        return $this->coreCatid;
    }

    /**
     * Set coreXreference.
     *
     * @param string $coreXreference
     *
     * @return JosUcmContent
     */
    public function setCoreXreference($coreXreference)
    {
        $this->coreXreference = $coreXreference;

        return $this;
    }

    /**
     * Get coreXreference.
     *
     * @return string
     */
    public function getCoreXreference()
    {
        return $this->coreXreference;
    }

    /**
     * Set coreTypeId.
     *
     * @param int $coreTypeId
     *
     * @return JosUcmContent
     */
    public function setCoreTypeId($coreTypeId)
    {
        $this->coreTypeId = $coreTypeId;

        return $this;
    }

    /**
     * Get coreTypeId.
     *
     * @return int
     */
    public function getCoreTypeId()
    {
        return $this->coreTypeId;
    }
}
