<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosModules
 *
 * @ORM\Table(name="jos_modules", indexes={@ORM\Index(name="published", columns={"published", "access"}), @ORM\Index(name="newsfeeds", columns={"module", "published"}), @ORM\Index(name="idx_language", columns={"language"})})
 * @ORM\Entity
 */
class JosModules
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
     * @ORM\Column(name="asset_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="FK to the #__assets table."})
     */
    private $assetId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
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
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="ordering", type="integer", nullable=false)
     */
    private $ordering = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=50, nullable=false)
     */
    private $position = '';

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
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean", nullable=false)
     */
    private $published = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="module", type="string", length=50, nullable=true)
     */
    private $module;

    /**
     * @var int
     *
     * @ORM\Column(name="access", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $access = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="showtitle", type="boolean", nullable=false, options={"default"="1"})
     */
    private $showtitle = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params;

    /**
     * @var bool
     *
     * @ORM\Column(name="client_id", type="boolean", nullable=false)
     */
    private $clientId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=7, nullable=false, options={"fixed"=true})
     */
    private $language;


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
     * @return JosModules
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
     * @return JosModules
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
     * @return JosModules
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
     * Set content.
     *
     * @param string $content
     *
     * @return JosModules
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set ordering.
     *
     * @param int $ordering
     *
     * @return JosModules
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
     * Set position.
     *
     * @param string $position
     *
     * @return JosModules
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position.
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosModules
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
     * @return JosModules
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
     * @return JosModules
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
     * @return JosModules
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
     * Set published.
     *
     * @param bool $published
     *
     * @return JosModules
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
     * Set module.
     *
     * @param string|null $module
     *
     * @return JosModules
     */
    public function setModule($module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module.
     *
     * @return string|null
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set access.
     *
     * @param int $access
     *
     * @return JosModules
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
     * Set showtitle.
     *
     * @param bool $showtitle
     *
     * @return JosModules
     */
    public function setShowtitle($showtitle)
    {
        $this->showtitle = $showtitle;

        return $this;
    }

    /**
     * Get showtitle.
     *
     * @return bool
     */
    public function getShowtitle()
    {
        return $this->showtitle;
    }

    /**
     * Set params.
     *
     * @param string $params
     *
     * @return JosModules
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
     * Set clientId.
     *
     * @param bool $clientId
     *
     * @return JosModules
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return bool
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return JosModules
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
}
