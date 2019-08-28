<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUcmBase
 *
 * @ORM\Table(name="jos_ucm_base", indexes={@ORM\Index(name="idx_ucm_item_id", columns={"ucm_item_id"}), @ORM\Index(name="idx_ucm_type_id", columns={"ucm_type_id"}), @ORM\Index(name="idx_ucm_language_id", columns={"ucm_language_id"})})
 * @ORM\Entity
 */
class JosUcmBase
{
    /**
     * @var int
     *
     * @ORM\Column(name="ucm_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ucmId;

    /**
     * @var int
     *
     * @ORM\Column(name="ucm_item_id", type="integer", nullable=false)
     */
    private $ucmItemId;

    /**
     * @var int
     *
     * @ORM\Column(name="ucm_type_id", type="integer", nullable=false)
     */
    private $ucmTypeId;

    /**
     * @var int
     *
     * @ORM\Column(name="ucm_language_id", type="integer", nullable=false)
     */
    private $ucmLanguageId;


    /**
     * Get ucmId.
     *
     * @return int
     */
    public function getUcmId()
    {
        return $this->ucmId;
    }

    /**
     * Set ucmItemId.
     *
     * @param int $ucmItemId
     *
     * @return JosUcmBase
     */
    public function setUcmItemId($ucmItemId)
    {
        $this->ucmItemId = $ucmItemId;

        return $this;
    }

    /**
     * Get ucmItemId.
     *
     * @return int
     */
    public function getUcmItemId()
    {
        return $this->ucmItemId;
    }

    /**
     * Set ucmTypeId.
     *
     * @param int $ucmTypeId
     *
     * @return JosUcmBase
     */
    public function setUcmTypeId($ucmTypeId)
    {
        $this->ucmTypeId = $ucmTypeId;

        return $this;
    }

    /**
     * Get ucmTypeId.
     *
     * @return int
     */
    public function getUcmTypeId()
    {
        return $this->ucmTypeId;
    }

    /**
     * Set ucmLanguageId.
     *
     * @param int $ucmLanguageId
     *
     * @return JosUcmBase
     */
    public function setUcmLanguageId($ucmLanguageId)
    {
        $this->ucmLanguageId = $ucmLanguageId;

        return $this;
    }

    /**
     * Get ucmLanguageId.
     *
     * @return int
     */
    public function getUcmLanguageId()
    {
        return $this->ucmLanguageId;
    }
}
