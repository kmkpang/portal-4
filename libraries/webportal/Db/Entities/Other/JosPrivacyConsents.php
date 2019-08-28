<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosPrivacyConsents
 *
 * @ORM\Table(name="jos_privacy_consents", indexes={@ORM\Index(name="idx_user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class JosPrivacyConsents
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
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $userId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="state", type="integer", nullable=false, options={"default"="1"})
     */
    private $state = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $created = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=false)
     */
    private $subject = '';

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", length=65535, nullable=false)
     */
    private $body;

    /**
     * @var bool
     *
     * @ORM\Column(name="remind", type="boolean", nullable=false)
     */
    private $remind = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=100, nullable=false)
     */
    private $token = '';


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
     * Set userId.
     *
     * @param int $userId
     *
     * @return JosPrivacyConsents
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
     * Set state.
     *
     * @param int $state
     *
     * @return JosPrivacyConsents
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return JosPrivacyConsents
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set subject.
     *
     * @param string $subject
     *
     * @return JosPrivacyConsents
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
     * Set body.
     *
     * @param string $body
     *
     * @return JosPrivacyConsents
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set remind.
     *
     * @param bool $remind
     *
     * @return JosPrivacyConsents
     */
    public function setRemind($remind)
    {
        $this->remind = $remind;

        return $this;
    }

    /**
     * Get remind.
     *
     * @return bool
     */
    public function getRemind()
    {
        return $this->remind;
    }

    /**
     * Set token.
     *
     * @param string $token
     *
     * @return JosPrivacyConsents
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
