<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosActionLogs
 *
 * @ORM\Table(name="jos_action_logs", indexes={@ORM\Index(name="idx_user_id", columns={"user_id"}), @ORM\Index(name="idx_user_id_logdate", columns={"user_id", "log_date"}), @ORM\Index(name="idx_user_id_extension", columns={"user_id", "extension"}), @ORM\Index(name="idx_extension_item_id", columns={"extension", "item_id"})})
 * @ORM\Entity
 */
class JosActionLogs
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
     * @ORM\Column(name="message_language_key", type="string", length=255, nullable=false)
     */
    private $messageLanguageKey = '';

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="log_date", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $logDate = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="extension", type="string", length=50, nullable=false)
     */
    private $extension = '';

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="item_id", type="integer", nullable=false)
     */
    private $itemId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=40, nullable=false, options={"default"="0.0.0.0"})
     */
    private $ipAddress = '0.0.0.0';


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
     * Set messageLanguageKey.
     *
     * @param string $messageLanguageKey
     *
     * @return JosActionLogs
     */
    public function setMessageLanguageKey($messageLanguageKey)
    {
        $this->messageLanguageKey = $messageLanguageKey;

        return $this;
    }

    /**
     * Get messageLanguageKey.
     *
     * @return string
     */
    public function getMessageLanguageKey()
    {
        return $this->messageLanguageKey;
    }

    /**
     * Set message.
     *
     * @param string $message
     *
     * @return JosActionLogs
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set logDate.
     *
     * @param \DateTime $logDate
     *
     * @return JosActionLogs
     */
    public function setLogDate($logDate)
    {
        $this->logDate = $logDate;

        return $this;
    }

    /**
     * Get logDate.
     *
     * @return \DateTime
     */
    public function getLogDate()
    {
        return $this->logDate;
    }

    /**
     * Set extension.
     *
     * @param string $extension
     *
     * @return JosActionLogs
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

    /**
     * Set userId.
     *
     * @param int $userId
     *
     * @return JosActionLogs
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

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
     * Set itemId.
     *
     * @param int $itemId
     *
     * @return JosActionLogs
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId.
     *
     * @return int
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set ipAddress.
     *
     * @param string $ipAddress
     *
     * @return JosActionLogs
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress.
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }
}
