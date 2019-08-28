<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUpdateSitesExtensions
 *
 * @ORM\Table(name="jos_update_sites_extensions")
 * @ORM\Entity
 */
class JosUpdateSitesExtensions
{
    /**
     * @var int
     *
     * @ORM\Column(name="update_site_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $updateSiteId;

    /**
     * @var int
     *
     * @ORM\Column(name="extension_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $extensionId;


    /**
     * Set updateSiteId.
     *
     * @param int $updateSiteId
     *
     * @return JosUpdateSitesExtensions
     */
    public function setUpdateSiteId($updateSiteId)
    {
        $this->updateSiteId = $updateSiteId;

        return $this;
    }

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
     * Set extensionId.
     *
     * @param int $extensionId
     *
     * @return JosUpdateSitesExtensions
     */
    public function setExtensionId($extensionId)
    {
        $this->extensionId = $extensionId;

        return $this;
    }

    /**
     * Get extensionId.
     *
     * @return int
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }
}
