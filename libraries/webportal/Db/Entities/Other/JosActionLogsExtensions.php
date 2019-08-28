<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosActionLogsExtensions
 *
 * @ORM\Table(name="jos_action_logs_extensions")
 * @ORM\Entity
 */
class JosActionLogsExtensions
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
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=255, nullable=false)
     */
    private $extension = '';


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
     * Set extension.
     *
     * @param string $extension
     *
     * @return JosActionLogsExtensions
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension.
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
}
