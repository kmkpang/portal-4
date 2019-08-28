<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosExtensions
 *
 * @ORM\Table(name="jos_extensions", indexes={@ORM\Index(name="element_clientid", columns={"element", "client_id"}), @ORM\Index(name="element_folder_clientid", columns={"element", "folder", "client_id"}), @ORM\Index(name="extension", columns={"type", "element", "folder", "client_id"})})
 * @ORM\Entity
 */
class JosExtensions
{
    /**
     * @var int
     *
     * @ORM\Column(name="extension_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $extensionId;

    /**
     * @var int
     *
     * @ORM\Column(name="package_id", type="integer", nullable=false, options={"comment"="Parent package ID for extensions installed as a package."})
     */
    private $packageId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="element", type="string", length=100, nullable=false)
     */
    private $element;

    /**
     * @var string
     *
     * @ORM\Column(name="folder", type="string", length=100, nullable=false)
     */
    private $folder;

    /**
     * @var bool
     *
     * @ORM\Column(name="client_id", type="boolean", nullable=false)
     */
    private $clientId;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="access", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $access = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="protected", type="boolean", nullable=false)
     */
    private $protected = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="manifest_cache", type="text", length=65535, nullable=false)
     */
    private $manifestCache;

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params;

    /**
     * @var string
     *
     * @ORM\Column(name="custom_data", type="text", length=65535, nullable=false)
     */
    private $customData;

    /**
     * @var string
     *
     * @ORM\Column(name="system_data", type="text", length=65535, nullable=false)
     */
    private $systemData;

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
     * @var int|null
     *
     * @ORM\Column(name="ordering", type="integer", nullable=true)
     */
    private $ordering = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="state", type="integer", nullable=true)
     */
    private $state = '0';


    /**
     * Get extensionId.
     *
     * @return int
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }

    /**
     * Set packageId.
     *
     * @param int $packageId
     *
     * @return JosExtensions
     */
    public function setPackageId($packageId)
    {
        $this->packageId = $packageId;

        return $this;
    }

    /**
     * Get packageId.
     *
     * @return int
     */
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return JosExtensions
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
     * Set type.
     *
     * @param string $type
     *
     * @return JosExtensions
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
     * Set element.
     *
     * @param string $element
     *
     * @return JosExtensions
     */
    public function setElement($element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * Get element.
     *
     * @return string
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Set folder.
     *
     * @param string $folder
     *
     * @return JosExtensions
     */
    public function setFolder($folder)
    {
        $this->folder = $folder;

        return $this;
    }

    /**
     * Get folder.
     *
     * @return string
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Set clientId.
     *
     * @param bool $clientId
     *
     * @return JosExtensions
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
     * Set enabled.
     *
     * @param bool $enabled
     *
     * @return JosExtensions
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled.
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set access.
     *
     * @param int $access
     *
     * @return JosExtensions
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
     * Set protected.
     *
     * @param bool $protected
     *
     * @return JosExtensions
     */
    public function setProtected($protected)
    {
        $this->protected = $protected;

        return $this;
    }

    /**
     * Get protected.
     *
     * @return bool
     */
    public function getProtected()
    {
        return $this->protected;
    }

    /**
     * Set manifestCache.
     *
     * @param string $manifestCache
     *
     * @return JosExtensions
     */
    public function setManifestCache($manifestCache)
    {
        $this->manifestCache = $manifestCache;

        return $this;
    }

    /**
     * Get manifestCache.
     *
     * @return string
     */
    public function getManifestCache()
    {
        return $this->manifestCache;
    }

    /**
     * Set params.
     *
     * @param string $params
     *
     * @return JosExtensions
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
     * Set customData.
     *
     * @param string $customData
     *
     * @return JosExtensions
     */
    public function setCustomData($customData)
    {
        $this->customData = $customData;

        return $this;
    }

    /**
     * Get customData.
     *
     * @return string
     */
    public function getCustomData()
    {
        return $this->customData;
    }

    /**
     * Set systemData.
     *
     * @param string $systemData
     *
     * @return JosExtensions
     */
    public function setSystemData($systemData)
    {
        $this->systemData = $systemData;

        return $this;
    }

    /**
     * Get systemData.
     *
     * @return string
     */
    public function getSystemData()
    {
        return $this->systemData;
    }

    /**
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosExtensions
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
     * @return JosExtensions
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
     * @param int|null $ordering
     *
     * @return JosExtensions
     */
    public function setOrdering($ordering = null)
    {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering.
     *
     * @return int|null
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set state.
     *
     * @param int|null $state
     *
     * @return JosExtensions
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
}
