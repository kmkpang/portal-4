<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosSchemas
 *
 * @ORM\Table(name="jos_schemas")
 * @ORM\Entity
 */
class JosSchemas
{
    /**
     * @var int
     *
     * @ORM\Column(name="extension_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $extensionId;

    /**
     * @var string
     *
     * @ORM\Column(name="version_id", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $versionId;


    /**
     * Set extensionId.
     *
     * @param int $extensionId
     *
     * @return JosSchemas
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

    /**
     * Set versionId.
     *
     * @param string $versionId
     *
     * @return JosSchemas
     */
    public function setVersionId($versionId)
    {
        $this->versionId = $versionId;

        return $this;
    }

    /**
     * Get versionId.
     *
     * @return string
     */
    public function getVersionId()
    {
        return $this->versionId;
    }
}
