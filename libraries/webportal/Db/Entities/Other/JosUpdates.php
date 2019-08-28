<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUpdates
 *
 * @ORM\Table(name="jos_updates")
 * @ORM\Entity
 */
class JosUpdates
{
    /**
     * @var int
     *
     * @ORM\Column(name="update_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $updateId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="update_site_id", type="integer", nullable=true)
     */
    private $updateSiteId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="extension_id", type="integer", nullable=true)
     */
    private $extensionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="element", type="string", length=100, nullable=true)
     */
    private $element;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="folder", type="string", length=20, nullable=true)
     */
    private $folder;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="client_id", type="boolean", nullable=true)
     */
    private $clientId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="version", type="string", length=32, nullable=true)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="text", length=65535, nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="detailsurl", type="text", length=65535, nullable=false)
     */
    private $detailsurl;

    /**
     * @var string
     *
     * @ORM\Column(name="infourl", type="text", length=65535, nullable=false)
     */
    private $infourl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="extra_query", type="string", length=1000, nullable=true)
     */
    private $extraQuery;


    /**
     * Get updateId.
     *
     * @return int
     */
    public function getUpdateId()
    {
        return $this->updateId;
    }

    /**
     * Set updateSiteId.
     *
     * @param int|null $updateSiteId
     *
     * @return JosUpdates
     */
    public function setUpdateSiteId($updateSiteId = null)
    {
        $this->updateSiteId = $updateSiteId;

        return $this;
    }

    /**
     * Get updateSiteId.
     *
     * @return int|null
     */
    public function getUpdateSiteId()
    {
        return $this->updateSiteId;
    }

    /**
     * Set extensionId.
     *
     * @param int|null $extensionId
     *
     * @return JosUpdates
     */
    public function setExtensionId($extensionId = null)
    {
        $this->extensionId = $extensionId;

        return $this;
    }

    /**
     * Get extensionId.
     *
     * @return int|null
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return JosUpdates
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return JosUpdates
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
     * Set element.
     *
     * @param string|null $element
     *
     * @return JosUpdates
     */
    public function setElement($element = null)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * Get element.
     *
     * @return string|null
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Set type.
     *
     * @param string|null $type
     *
     * @return JosUpdates
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set folder.
     *
     * @param string|null $folder
     *
     * @return JosUpdates
     */
    public function setFolder($folder = null)
    {
        $this->folder = $folder;

        return $this;
    }

    /**
     * Get folder.
     *
     * @return string|null
     */
    public function getFolder()
    {
        return $this->folder;
    }

    /**
     * Set clientId.
     *
     * @param bool|null $clientId
     *
     * @return JosUpdates
     */
    public function setClientId($clientId = null)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return bool|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set version.
     *
     * @param string|null $version
     *
     * @return JosUpdates
     */
    public function setVersion($version = null)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version.
     *
     * @return string|null
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set data.
     *
     * @param string $data
     *
     * @return JosUpdates
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data.
     *
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set detailsurl.
     *
     * @param string $detailsurl
     *
     * @return JosUpdates
     */
    public function setDetailsurl($detailsurl)
    {
        $this->detailsurl = $detailsurl;

        return $this;
    }

    /**
     * Get detailsurl.
     *
     * @return string
     */
    public function getDetailsurl()
    {
        return $this->detailsurl;
    }

    /**
     * Set infourl.
     *
     * @param string $infourl
     *
     * @return JosUpdates
     */
    public function setInfourl($infourl)
    {
        $this->infourl = $infourl;

        return $this;
    }

    /**
     * Get infourl.
     *
     * @return string
     */
    public function getInfourl()
    {
        return $this->infourl;
    }

    /**
     * Set extraQuery.
     *
     * @param string|null $extraQuery
     *
     * @return JosUpdates
     */
    public function setExtraQuery($extraQuery = null)
    {
        $this->extraQuery = $extraQuery;

        return $this;
    }

    /**
     * Get extraQuery.
     *
     * @return string|null
     */
    public function getExtraQuery()
    {
        return $this->extraQuery;
    }
}
