<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUpdateSites
 *
 * @ORM\Table(name="jos_update_sites")
 * @ORM\Entity
 */
class JosUpdateSites
{
    /**
     * @var int
     *
     * @ORM\Column(name="update_site_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $updateSiteId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="text", length=65535, nullable=false)
     */
    private $location;

    /**
     * @var int|null
     *
     * @ORM\Column(name="enabled", type="integer", nullable=true)
     */
    private $enabled;

    /**
     * @var int|null
     *
     * @ORM\Column(name="last_check_timestamp", type="bigint", nullable=true)
     */
    private $lastCheckTimestamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="extra_query", type="string", length=1000, nullable=true)
     */
    private $extraQuery;


    /**
     * Get updateSiteId.
     *
     * @return int
     */
    public function getUpdateSiteId()
    {
        return $this->updateSiteId;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return JosUpdateSites
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
     * Set type.
     *
     * @param string|null $type
     *
     * @return JosUpdateSites
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
     * Set location.
     *
     * @param string $location
     *
     * @return JosUpdateSites
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set enabled.
     *
     * @param int|null $enabled
     *
     * @return JosUpdateSites
     */
    public function setEnabled($enabled = null)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled.
     *
     * @return int|null
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set lastCheckTimestamp.
     *
     * @param int|null $lastCheckTimestamp
     *
     * @return JosUpdateSites
     */
    public function setLastCheckTimestamp($lastCheckTimestamp = null)
    {
        $this->lastCheckTimestamp = $lastCheckTimestamp;

        return $this;
    }

    /**
     * Get lastCheckTimestamp.
     *
     * @return int|null
     */
    public function getLastCheckTimestamp()
    {
        return $this->lastCheckTimestamp;
    }

    /**
     * Set extraQuery.
     *
     * @param string|null $extraQuery
     *
     * @return JosUpdateSites
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
