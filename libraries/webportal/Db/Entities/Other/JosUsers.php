<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUsers
 *
 * @ORM\Table(name="jos_users", indexes={@ORM\Index(name="idx_name", columns={"name"}), @ORM\Index(name="idx_block", columns={"block"}), @ORM\Index(name="username", columns={"username"}), @ORM\Index(name="email", columns={"email"})})
 * @ORM\Entity
 */
class JosUsers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=400, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=150, nullable=false)
     */
    private $username = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="block", type="boolean", nullable=false)
     */
    private $block = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="sendEmail", type="boolean", nullable=true)
     */
    private $sendemail = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerDate", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $registerdate = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastvisitDate", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $lastvisitdate = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="activation", type="string", length=100, nullable=false)
     */
    private $activation = '';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastResetTime", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00","comment"="Date of last password reset"})
     */
    private $lastresettime = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="resetCount", type="integer", nullable=false, options={"comment"="Count of password resets since lastResetTime"})
     */
    private $resetcount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="otpKey", type="string", length=1000, nullable=false, options={"comment"="Two factor authentication encrypted keys"})
     */
    private $otpkey = '';

    /**
     * @var string
     *
     * @ORM\Column(name="otep", type="string", length=1000, nullable=false, options={"comment"="One time emergency passwords"})
     */
    private $otep = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="requireReset", type="boolean", nullable=false, options={"comment"="Require user to reset password on next login"})
     */
    private $requirereset = '0';


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
     * Set name.
     *
     * @param string $name
     *
     * @return JosUsers
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return JosUsers
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return JosUsers
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
     * Set password.
     *
     * @param string $password
     *
     * @return JosUsers
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set block.
     *
     * @param bool $block
     *
     * @return JosUsers
     */
    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block.
     *
     * @return bool
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set sendemail.
     *
     * @param bool|null $sendemail
     *
     * @return JosUsers
     */
    public function setSendemail($sendemail = null)
    {
        $this->sendemail = $sendemail;

        return $this;
    }

    /**
     * Get sendemail.
     *
     * @return bool|null
     */
    public function getSendemail()
    {
        return $this->sendemail;
    }

    /**
     * Set registerdate.
     *
     * @param \DateTime $registerdate
     *
     * @return JosUsers
     */
    public function setRegisterdate($registerdate)
    {
        $this->registerdate = $registerdate;

        return $this;
    }

    /**
     * Get registerdate.
     *
     * @return \DateTime
     */
    public function getRegisterdate()
    {
        return $this->registerdate;
    }

    /**
     * Set lastvisitdate.
     *
     * @param \DateTime $lastvisitdate
     *
     * @return JosUsers
     */
    public function setLastvisitdate($lastvisitdate)
    {
        $this->lastvisitdate = $lastvisitdate;

        return $this;
    }

    /**
     * Get lastvisitdate.
     *
     * @return \DateTime
     */
    public function getLastvisitdate()
    {
        return $this->lastvisitdate;
    }

    /**
     * Set activation.
     *
     * @param string $activation
     *
     * @return JosUsers
     */
    public function setActivation($activation)
    {
        $this->activation = $activation;

        return $this;
    }

    /**
     * Get activation.
     *
     * @return string
     */
    public function getActivation()
    {
        return $this->activation;
    }

    /**
     * Set params.
     *
     * @param string $params
     *
     * @return JosUsers
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params.
     *
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set lastresettime.
     *
     * @param \DateTime $lastresettime
     *
     * @return JosUsers
     */
    public function setLastresettime($lastresettime)
    {
        $this->lastresettime = $lastresettime;

        return $this;
    }

    /**
     * Get lastresettime.
     *
     * @return \DateTime
     */
    public function getLastresettime()
    {
        return $this->lastresettime;
    }

    /**
     * Set resetcount.
     *
     * @param int $resetcount
     *
     * @return JosUsers
     */
    public function setResetcount($resetcount)
    {
        $this->resetcount = $resetcount;

        return $this;
    }

    /**
     * Get resetcount.
     *
     * @return int
     */
    public function getResetcount()
    {
        return $this->resetcount;
    }

    /**
     * Set otpkey.
     *
     * @param string $otpkey
     *
     * @return JosUsers
     */
    public function setOtpkey($otpkey)
    {
        $this->otpkey = $otpkey;

        return $this;
    }

    /**
     * Get otpkey.
     *
     * @return string
     */
    public function getOtpkey()
    {
        return $this->otpkey;
    }

    /**
     * Set otep.
     *
     * @param string $otep
     *
     * @return JosUsers
     */
    public function setOtep($otep)
    {
        $this->otep = $otep;

        return $this;
    }

    /**
     * Get otep.
     *
     * @return string
     */
    public function getOtep()
    {
        return $this->otep;
    }

    /**
     * Set requirereset.
     *
     * @param bool $requirereset
     *
     * @return JosUsers
     */
    public function setRequirereset($requirereset)
    {
        $this->requirereset = $requirereset;

        return $this;
    }

    /**
     * Get requirereset.
     *
     * @return bool
     */
    public function getRequirereset()
    {
        return $this->requirereset;
    }
}
