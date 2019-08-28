<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUserKeys
 *
 * @ORM\Table(name="jos_user_keys", uniqueConstraints={@ORM\UniqueConstraint(name="series", columns={"series"})}, indexes={@ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class JosUserKeys
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
     * @ORM\Column(name="user_id", type="string", length=150, nullable=false)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="series", type="string", length=191, nullable=false)
     */
    private $series;

    /**
     * @var bool
     *
     * @ORM\Column(name="invalid", type="boolean", nullable=false)
     */
    private $invalid;

    /**
     * @var string
     *
     * @ORM\Column(name="time", type="string", length=200, nullable=false)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="uastring", type="string", length=255, nullable=false)
     */
    private $uastring;


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
     * @param string $userId
     *
     * @return JosUserKeys
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set token.
     *
     * @param string $token
     *
     * @return JosUserKeys
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

    /**
     * Set series.
     *
     * @param string $series
     *
     * @return JosUserKeys
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series.
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set invalid.
     *
     * @param bool $invalid
     *
     * @return JosUserKeys
     */
    public function setInvalid($invalid)
    {
        $this->invalid = $invalid;

        return $this;
    }

    /**
     * Get invalid.
     *
     * @return bool
     */
    public function getInvalid()
    {
        return $this->invalid;
    }

    /**
     * Set time.
     *
     * @param string $time
     *
     * @return JosUserKeys
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time.
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set uastring.
     *
     * @param string $uastring
     *
     * @return JosUserKeys
     */
    public function setUastring($uastring)
    {
        $this->uastring = $uastring;

        return $this;
    }

    /**
     * Get uastring.
     *
     * @return string
     */
    public function getUastring()
    {
        return $this->uastring;
    }
}
