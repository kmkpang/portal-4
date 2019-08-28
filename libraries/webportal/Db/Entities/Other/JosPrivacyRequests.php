<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosPrivacyRequests
 *
 * @ORM\Table(name="jos_privacy_requests")
 * @ORM\Entity
 */
class JosPrivacyRequests
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
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requested_at", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $requestedAt = '0000-00-00 00:00:00';

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="request_type", type="string", length=25, nullable=false)
     */
    private $requestType = '';

    /**
     * @var string
     *
     * @ORM\Column(name="confirm_token", type="string", length=100, nullable=false)
     */
    private $confirmToken = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="confirm_token_created_at", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $confirmTokenCreatedAt = '0000-00-00 00:00:00';


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
     * Set email.
     *
     * @param string $email
     *
     * @return JosPrivacyRequests
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set requestedAt.
     *
     * @param \DateTime $requestedAt
     *
     * @return JosPrivacyRequests
     */
    public function setRequestedAt($requestedAt)
    {
        $this->requestedAt = $requestedAt;

        return $this;
    }

    /**
     * Get requestedAt.
     *
     * @return \DateTime
     */
    public function getRequestedAt()
    {
        return $this->requestedAt;
    }

    /**
     * Set status.
     *
     * @param bool $status
     *
     * @return JosPrivacyRequests
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set requestType.
     *
     * @param string $requestType
     *
     * @return JosPrivacyRequests
     */
    public function setRequestType($requestType)
    {
        $this->requestType = $requestType;

        return $this;
    }

    /**
     * Get requestType.
     *
     * @return string
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * Set confirmToken.
     *
     * @param string $confirmToken
     *
     * @return JosPrivacyRequests
     */
    public function setConfirmToken($confirmToken)
    {
        $this->confirmToken = $confirmToken;

        return $this;
    }

    /**
     * Get confirmToken.
     *
     * @return string
     */
    public function getConfirmToken()
    {
        return $this->confirmToken;
    }

    /**
     * Set confirmTokenCreatedAt.
     *
     * @param \DateTime $confirmTokenCreatedAt
     *
     * @return JosPrivacyRequests
     */
    public function setConfirmTokenCreatedAt($confirmTokenCreatedAt)
    {
        $this->confirmTokenCreatedAt = $confirmTokenCreatedAt;

        return $this;
    }

    /**
     * Get confirmTokenCreatedAt.
     *
     * @return \DateTime
     */
    public function getConfirmTokenCreatedAt()
    {
        return $this->confirmTokenCreatedAt;
    }
}
