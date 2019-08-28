<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosFields
 *
 * @ORM\Table(name="jos_fields", indexes={@ORM\Index(name="idx_checkout", columns={"checked_out"}), @ORM\Index(name="idx_state", columns={"state"}), @ORM\Index(name="idx_created_user_id", columns={"created_user_id"}), @ORM\Index(name="idx_access", columns={"access"}), @ORM\Index(name="idx_context", columns={"context"}), @ORM\Index(name="idx_language", columns={"language"})})
 * @ORM\Entity
 */
class JosFields
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
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $groupId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label = '';

    /**
     * @var string
     *
     * @ORM\Column(name="default_value", type="text", length=65535, nullable=false)
     */
    private $defaultValue;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false, options={"default"="text"})
     */
    private $type = 'text';

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
     * @var bool
     *
     * @ORM\Column(name="required", type="boolean", nullable=false)
     */
    private $required = '0';

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
     * @ORM\Column(name="fieldparams", type="text", length=65535, nullable=false)
     */
    private $fieldparams;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=7, nullable=false, options={"fixed"=true})
     */
    private $language = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $createdTime = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="created_user_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $createdUserId = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $modifiedTime = '0000-00-00 00:00:00';

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
     * @return JosFields
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
     * @return JosFields
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
     * Set groupId.
     *
     * @param int $groupId
     *
     * @return JosFields
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;

        return $this;
    }

    /**
     * Get groupId.
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return JosFields
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
     * Set name.
     *
     * @param string $name
     *
     * @return JosFields
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
     * Set label.
     *
     * @param string $label
     *
     * @return JosFields
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set defaultValue.
     *
     * @param string $defaultValue
     *
     * @return JosFields
     */
    public function setDefaultValue($defaultValue)
    {
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * Get defaultValue.
     *
     * @return string
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return JosFields
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set note.
     *
     * @param string $note
     *
     * @return JosFields
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
     * @return JosFields
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
     * @return JosFields
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
     * Set required.
     *
     * @param bool $required
     *
     * @return JosFields
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required.
     *
     * @return bool
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosFields
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
     * @return JosFields
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
     * @return JosFields
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
     * @return JosFields
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
     * Set fieldparams.
     *
     * @param string $fieldparams
     *
     * @return JosFields
     */
    public function setFieldparams($fieldparams)
    {
        $this->fieldparams = $fieldparams;

        return $this;
    }

    /**
     * Get fieldparams.
     *
     * @return string
     */
    public function getFieldparams()
    {
        return $this->fieldparams;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return JosFields
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
     * Set createdTime.
     *
     * @param \DateTime $createdTime
     *
     * @return JosFields
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;

        return $this;
    }

    /**
     * Get createdTime.
     *
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * Set createdUserId.
     *
     * @param int $createdUserId
     *
     * @return JosFields
     */
    public function setCreatedUserId($createdUserId)
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }

    /**
     * Get createdUserId.
     *
     * @return int
     */
    public function getCreatedUserId()
    {
        return $this->createdUserId;
    }

    /**
     * Set modifiedTime.
     *
     * @param \DateTime $modifiedTime
     *
     * @return JosFields
     */
    public function setModifiedTime($modifiedTime)
    {
        $this->modifiedTime = $modifiedTime;

        return $this;
    }

    /**
     * Get modifiedTime.
     *
     * @return \DateTime
     */
    public function getModifiedTime()
    {
        return $this->modifiedTime;
    }

    /**
     * Set modifiedBy.
     *
     * @param int $modifiedBy
     *
     * @return JosFields
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
     * @return JosFields
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
