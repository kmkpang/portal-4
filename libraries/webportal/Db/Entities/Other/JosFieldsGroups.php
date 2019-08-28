<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosFieldsGroups
 *
 * @ORM\Table(name="jos_fields_groups", indexes={@ORM\Index(name="idx_checkout", columns={"checked_out"}), @ORM\Index(name="idx_state", columns={"state"}), @ORM\Index(name="idx_created_by", columns={"created_by"}), @ORM\Index(name="idx_access", columns={"access"}), @ORM\Index(name="idx_context", columns={"context"}), @ORM\Index(name="idx_language", columns={"language"})})
 * @ORM\Entity
 */
class JosFieldsGroups
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
     * @ORM\Column(name="asset_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $assetId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="string", length=255, nullable=false)
     */
    private $context = '';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=false)
     */
    private $note = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=false)
     */
    private $state = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="checked_out", type="integer", nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=7, nullable=false, options={"fixed"=true})
     */
    private $language = '';

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
     * @ORM\Column(name="access", type="integer", nullable=false, options={"default"="1"})
     */
    private $access = '1';


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
     * @return JosFieldsGroups
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
     * Set context.
     *
     * @param string $context
     *
     * @return JosFieldsGroups
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context.
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return JosFieldsGroups
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
     * Set note.
     *
     * @param string $note
     *
     * @return JosFieldsGroups
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

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return JosFieldsGroups
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
     * Set state.
     *
     * @param bool $state
     *
     * @return JosFieldsGroups
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
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosFieldsGroups
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
     * @return JosFieldsGroups
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
     * @return JosFieldsGroups
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
     * @return JosFieldsGroups
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
     * Set language.
     *
     * @param string $language
     *
     * @return JosFieldsGroups
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
     * @return JosFieldsGroups
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
     * @return JosFieldsGroups
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
     * Set modified.
     *
     * @param \DateTime $modified
     *
     * @return JosFieldsGroups
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
     * @return JosFieldsGroups
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
     * Set access.
     *
     * @param int $access
     *
     * @return JosFieldsGroups
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
}
