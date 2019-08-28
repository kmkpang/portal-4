<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosBannerClients
 *
 * @ORM\Table(name="jos_banner_clients", indexes={@ORM\Index(name="idx_own_prefix", columns={"own_prefix"}), @ORM\Index(name="idx_metakey_prefix", columns={"metakey_prefix"})})
 * @ORM\Entity
 */
class JosBannerClients
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255, nullable=false)
     */
    private $contact = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="extrainfo", type="text", length=65535, nullable=false)
     */
    private $extrainfo;

    /**
     * @var bool
     *
     * @ORM\Column(name="state", type="boolean", nullable=false)
     */
    private $state = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="checked_out", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $checkedOut = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checked_out_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $checkedOutTime = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="metakey", type="text", length=65535, nullable=false)
     */
    private $metakey;

    /**
     * @var bool
     *
     * @ORM\Column(name="own_prefix", type="boolean", nullable=false)
     */
    private $ownPrefix = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="metakey_prefix", type="string", length=400, nullable=false)
     */
    private $metakeyPrefix = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="purchase_type", type="boolean", nullable=false, options={"default"="-1"})
     */
    private $purchaseType = '-1';

    /**
     * @var bool
     *
     * @ORM\Column(name="track_clicks", type="boolean", nullable=false, options={"default"="-1"})
     */
    private $trackClicks = '-1';

    /**
     * @var bool
     *
     * @ORM\Column(name="track_impressions", type="boolean", nullable=false, options={"default"="-1"})
     */
    private $trackImpressions = '-1';


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
     * @return JosBannerClients
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
     * Set contact.
     *
     * @param string $contact
     *
     * @return JosBannerClients
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact.
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return JosBannerClients
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
     * Set extrainfo.
     *
     * @param string $extrainfo
     *
     * @return JosBannerClients
     */
    public function setExtrainfo($extrainfo)
    {
        $this->extrainfo = $extrainfo;

        return $this;
    }

    /**
     * Get extrainfo.
     *
     * @return string
     */
    public function getExtrainfo()
    {
        return $this->extrainfo;
    }

    /**
     * Set state.
     *
     * @param bool $state
     *
     * @return JosBannerClients
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
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosBannerClients
     */
    public function setCheckedOut($checkedOut)
    {
        $this->checkedOut = $checkedOut;

        return $this;
    }

    /**
     * Get checkedOut.
     *
     * @return int
     */
    public function getCheckedOut()
    {
        return $this->checkedOut;
    }

    /**
     * Set checkedOutTime.
     *
     * @param \DateTime $checkedOutTime
     *
     * @return JosBannerClients
     */
    public function setCheckedOutTime($checkedOutTime)
    {
        $this->checkedOutTime = $checkedOutTime;

        return $this;
    }

    /**
     * Get checkedOutTime.
     *
     * @return \DateTime
     */
    public function getCheckedOutTime()
    {
        return $this->checkedOutTime;
    }

    /**
     * Set metakey.
     *
     * @param string $metakey
     *
     * @return JosBannerClients
     */
    public function setMetakey($metakey)
    {
        $this->metakey = $metakey;

        return $this;
    }

    /**
     * Get metakey.
     *
     * @return string
     */
    public function getMetakey()
    {
        return $this->metakey;
    }

    /**
     * Set ownPrefix.
     *
     * @param bool $ownPrefix
     *
     * @return JosBannerClients
     */
    public function setOwnPrefix($ownPrefix)
    {
        $this->ownPrefix = $ownPrefix;

        return $this;
    }

    /**
     * Get ownPrefix.
     *
     * @return bool
     */
    public function getOwnPrefix()
    {
        return $this->ownPrefix;
    }

    /**
     * Set metakeyPrefix.
     *
     * @param string $metakeyPrefix
     *
     * @return JosBannerClients
     */
    public function setMetakeyPrefix($metakeyPrefix)
    {
        $this->metakeyPrefix = $metakeyPrefix;

        return $this;
    }

    /**
     * Get metakeyPrefix.
     *
     * @return string
     */
    public function getMetakeyPrefix()
    {
        return $this->metakeyPrefix;
    }

    /**
     * Set purchaseType.
     *
     * @param bool $purchaseType
     *
     * @return JosBannerClients
     */
    public function setPurchaseType($purchaseType)
    {
        $this->purchaseType = $purchaseType;

        return $this;
    }

    /**
     * Get purchaseType.
     *
     * @return bool
     */
    public function getPurchaseType()
    {
        return $this->purchaseType;
    }

    /**
     * Set trackClicks.
     *
     * @param bool $trackClicks
     *
     * @return JosBannerClients
     */
    public function setTrackClicks($trackClicks)
    {
        $this->trackClicks = $trackClicks;

        return $this;
    }

    /**
     * Get trackClicks.
     *
     * @return bool
     */
    public function getTrackClicks()
    {
        return $this->trackClicks;
    }

    /**
     * Set trackImpressions.
     *
     * @param bool $trackImpressions
     *
     * @return JosBannerClients
     */
    public function setTrackImpressions($trackImpressions)
    {
        $this->trackImpressions = $trackImpressions;

        return $this;
    }

    /**
     * Get trackImpressions.
     *
     * @return bool
     */
    public function getTrackImpressions()
    {
        return $this->trackImpressions;
    }
}
