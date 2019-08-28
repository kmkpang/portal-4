<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosUcmHistory
 *
 * @ORM\Table(name="jos_ucm_history", indexes={@ORM\Index(name="idx_ucm_item_id", columns={"ucm_type_id", "ucm_item_id"}), @ORM\Index(name="idx_save_date", columns={"save_date"})})
 * @ORM\Entity
 */
class JosUcmHistory
{
    /**
     * @var int
     *
     * @ORM\Column(name="version_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $versionId;

    /**
     * @var int
     *
     * @ORM\Column(name="ucm_item_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $ucmItemId;

    /**
     * @var int
     *
     * @ORM\Column(name="ucm_type_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $ucmTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="version_note", type="string", length=255, nullable=false, options={"comment"="Optional version name"})
     */
    private $versionNote = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="save_date", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00"})
     */
    private $saveDate = '0000-00-00 00:00:00';

    /**
     * @var int
     *
     * @ORM\Column(name="editor_user_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $editorUserId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="character_count", type="integer", nullable=false, options={"unsigned"=true,"comment"="Number of characters in this version."})
     */
    private $characterCount = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="sha1_hash", type="string", length=50, nullable=false, options={"comment"="SHA1 hash of the version_data column."})
     */
    private $sha1Hash = '';

    /**
     * @var string
     *
     * @ORM\Column(name="version_data", type="text", length=16777215, nullable=false, options={"comment"="json-encoded string of version data"})
     */
    private $versionData;

    /**
     * @var bool
     *
     * @ORM\Column(name="keep_forever", type="boolean", nullable=false, options={"comment"="0=auto delete; 1=keep"})
     */
    private $keepForever = '0';


    /**
     * Get versionId.
     *
     * @return int
     */
    public function getVersionId()
    {
        return $this->versionId;
    }

    /**
     * Set ucmItemId.
     *
     * @param int $ucmItemId
     *
     * @return JosUcmHistory
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
     * @return JosUcmHistory
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
     * Set versionNote.
     *
     * @param string $versionNote
     *
     * @return JosUcmHistory
     */
    public function setVersionNote($versionNote)
    {
        $this->versionNote = $versionNote;

        return $this;
    }

    /**
     * Get versionNote.
     *
     * @return string
     */
    public function getVersionNote()
    {
        return $this->versionNote;
    }

    /**
     * Set saveDate.
     *
     * @param \DateTime $saveDate
     *
     * @return JosUcmHistory
     */
    public function setSaveDate($saveDate)
    {
        $this->saveDate = $saveDate;

        return $this;
    }

    /**
     * Get saveDate.
     *
     * @return \DateTime
     */
    public function getSaveDate()
    {
        return $this->saveDate;
    }

    /**
     * Set editorUserId.
     *
     * @param int $editorUserId
     *
     * @return JosUcmHistory
     */
    public function setEditorUserId($editorUserId)
    {
        $this->editorUserId = $editorUserId;

        return $this;
    }

    /**
     * Get editorUserId.
     *
     * @return int
     */
    public function getEditorUserId()
    {
        return $this->editorUserId;
    }

    /**
     * Set characterCount.
     *
     * @param int $characterCount
     *
     * @return JosUcmHistory
     */
    public function setCharacterCount($characterCount)
    {
        $this->characterCount = $characterCount;

        return $this;
    }

    /**
     * Get characterCount.
     *
     * @return int
     */
    public function getCharacterCount()
    {
        return $this->characterCount;
    }

    /**
     * Set sha1Hash.
     *
     * @param string $sha1Hash
     *
     * @return JosUcmHistory
     */
    public function setSha1Hash($sha1Hash)
    {
        $this->sha1Hash = $sha1Hash;

        return $this;
    }

    /**
     * Get sha1Hash.
     *
     * @return string
     */
    public function getSha1Hash()
    {
        return $this->sha1Hash;
    }

    /**
     * Set versionData.
     *
     * @param string $versionData
     *
     * @return JosUcmHistory
     */
    public function setVersionData($versionData)
    {
        $this->versionData = $versionData;

        return $this;
    }

    /**
     * Get versionData.
     *
     * @return string
     */
    public function getVersionData()
    {
        return $this->versionData;
    }

    /**
     * Set keepForever.
     *
     * @param bool $keepForever
     *
     * @return JosUcmHistory
     */
    public function setKeepForever($keepForever)
    {
        $this->keepForever = $keepForever;

        return $this;
    }

    /**
     * Get keepForever.
     *
     * @return bool
     */
    public function getKeepForever()
    {
        return $this->keepForever;
    }
}
