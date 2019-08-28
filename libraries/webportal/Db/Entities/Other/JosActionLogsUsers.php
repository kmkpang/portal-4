<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosActionLogsUsers
 *
 * @ORM\Table(name="jos_action_logs_users", indexes={@ORM\Index(name="idx_notify", columns={"notify"})})
 * @ORM\Entity
 */
class JosActionLogsUsers
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var bool
     *
     * @ORM\Column(name="notify", type="boolean", nullable=false)
     */
    private $notify;

    /**
     * @var string
     *
     * @ORM\Column(name="extensions", type="text", length=65535, nullable=false)
     */
    private $extensions;


    /**
     * Get userId.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set notify.
     *
     * @param bool $notify
     *
     * @return JosActionLogsUsers
     */
    public function setNotify($notify)
    {
        $this->notify = $notify;

        return $this;
    }

    /**
     * Get notify.
     *
     * @return bool
     */
    public function getNotify()
    {
        return $this->notify;
    }

    /**
     * Set extensions.
     *
     * @param string $extensions
     *
     * @return JosActionLogsUsers
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * Get extensions.
     *
     * @return string
     */
    public function getExtensions()
    {
        return $this->extensions;
    }
}
