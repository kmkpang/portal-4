<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosMenuTypes
 *
 * @ORM\Table(name="jos_menu_types", uniqueConstraints={@ORM\UniqueConstraint(name="idx_menutype", columns={"menutype"})})
 * @ORM\Entity
 */
class JosMenuTypes
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
     * @ORM\Column(name="asset_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $assetId;

    /**
     * @var string
     *
     * @ORM\Column(name="menutype", type="string", length=24, nullable=false)
     */
    private $menutype;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=48, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     */
    private $clientId;


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
     * Set assetId.
     *
     * @param int $assetId
     *
     * @return JosMenuTypes
     */
    public function setAssetId($assetId)
    {
        $this->assetId = $assetId;

        return $this;
    }

    /**
     * Get assetId.
     *
     * @return int
     */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /**
     * Set menutype.
     *
     * @param string $menutype
     *
     * @return JosMenuTypes
     */
    public function setMenutype($menutype)
    {
        $this->menutype = $menutype;

        return $this;
    }

    /**
     * Get menutype.
     *
     * @return string
     */
    public function getMenutype()
    {
        return $this->menutype;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return JosMenuTypes
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return JosMenuTypes
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set clientId.
     *
     * @param int $clientId
     *
     * @return JosMenuTypes
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }
}
