<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosSession
 *
 * @ORM\Table(name="jos_session", indexes={@ORM\Index(name="userid", columns={"userid"}), @ORM\Index(name="time", columns={"time"})})
 * @ORM\Entity
 */
class JosSession
{
    /**
     * @var binary
     *
     * @ORM\Column(name="session_id", type="binary", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sessionId;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="client_id", type="boolean", nullable=true)
     */
    private $clientId;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="guest", type="boolean", nullable=true, options={"default"="1"})
     */
    private $guest = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="time", type="integer", nullable=false)
     */
    private $time = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="data", type="text", length=16777215, nullable=true)
     */
    private $data;

    /**
     * @var int|null
     *
     * @ORM\Column(name="userid", type="integer", nullable=true)
     */
    private $userid = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=150, nullable=true)
     */
    private $username = '';


    /**
     * Get sessionId.
     *
     * @return binary
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set clientId.
     *
     * @param bool|null $clientId
     *
     * @return JosSession
     */
    public function setClientId($clientId = null)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return bool|null
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set guest.
     *
     * @param bool|null $guest
     *
     * @return JosSession
     */
    public function setGuest($guest = null)
    {
        $this->guest = $guest;

        return $this;
    }

    /**
     * Get guest.
     *
     * @return bool|null
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * Set time.
     *
     * @param int $time
     *
     * @return JosSession
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time.
     *
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set data.
     *
     * @param string|null $data
     *
     * @return JosSession
     */
    public function setData($data = null)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data.
     *
     * @return string|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set userid.
     *
     * @param int|null $userid
     *
     * @return JosSession
     */
    public function setUserid($userid = null)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid.
     *
     * @return int|null
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set username.
     *
     * @param string|null $username
     *
     * @return JosSession
     */
    public function setUsername($username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }
}
