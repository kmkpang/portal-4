<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosMessages
 *
 * @ORM\Table(name="jos_messages", indexes={@ORM\Index(name="useridto_state", columns={"user_id_to", "state"})})
 * @ORM\Entity
 */
class JosMessages
{
    /**
     * @var int
     *
     * @ORM\Column(name="message_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $messageId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id_from", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $userIdFrom = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="user_id_to", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $userIdTo = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="folder_id", type="boolean", nullable=false)
     */
    private $folderId = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $dateTime = '0000-00-00 00:00:00';

    /**
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=false)
     */
    private $state = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="priority", type="boolean", nullable=false)
     */
    private $priority = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=false)
     */
    private $subject = '';

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=false)
     */
    private $message;


    /**
     * Get messageId.
     *
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * Set userIdFrom.
     *
     * @param int $userIdFrom
     *
     * @return JosMessages
     */
    public function setUserIdFrom($userIdFrom)
    {
        $this->userIdFrom = $userIdFrom;

        return $this;
    }

    /**
     * Get userIdFrom.
     *
     * @return int
     */
    public function getUserIdFrom()
    {
        return $this->userIdFrom;
    }

    /**
     * Set userIdTo.
     *
     * @param int $userIdTo
     *
     * @return JosMessages
     */
    public function setUserIdTo($userIdTo)
    {
        $this->userIdTo = $userIdTo;

        return $this;
    }

    /**
     * Get userIdTo.
     *
     * @return int
     */
    public function getUserIdTo()
    {
        return $this->userIdTo;
    }

    /**
     * Set folderId.
     *
     * @param bool $folderId
     *
     * @return JosMessages
     */
    public function setFolderId($folderId)
    {
        $this->folderId = $folderId;

        return $this;
    }

    /**
     * Get folderId.
     *
     * @return bool
     */
    public function getFolderId()
    {
        return $this->folderId;
    }

    /**
     * Set dateTime.
     *
     * @param \DateTime $dateTime
     *
     * @return JosMessages
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime.
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set state.
     *
     * @param bool $state
     *
     * @return JosMessages
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
     * Set priority.
     *
     * @param bool $priority
     *
     * @return JosMessages
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority.
     *
     * @return bool
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set subject.
     *
     * @param string $subject
     *
     * @return JosMessages
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject.
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set message.
     *
     * @param string $message
     *
     * @return JosMessages
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
}
