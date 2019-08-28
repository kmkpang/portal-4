<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosPostinstallMessages
 *
 * @ORM\Table(name="jos_postinstall_messages")
 * @ORM\Entity
 */
class JosPostinstallMessages
{
    /**
     * @var int
     *
     * @ORM\Column(name="postinstall_message_id", type="bigint", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $postinstallMessageId;

    /**
     * @var int
     *
     * @ORM\Column(name="extension_id", type="bigint", nullable=false, options={"default"="700","comment"="FK to #__extensions"})
     */
    private $extensionId = '700';

    /**
     * @var string
     *
     * @ORM\Column(name="title_key", type="string", length=255, nullable=false, options={"comment"="Lang key for the title"})
     */
    private $titleKey = '';

    /**
     * @var string
     *
     * @ORM\Column(name="description_key", type="string", length=255, nullable=false, options={"comment"="Lang key for description"})
     */
    private $descriptionKey = '';

    /**
     * @var string
     *
     * @ORM\Column(name="action_key", type="string", length=255, nullable=false)
     */
    private $actionKey = '';

    /**
     * @var string
     *
     * @ORM\Column(name="language_extension", type="string", length=255, nullable=false, options={"default"="com_postinstall","comment"="Extension holding lang keys"})
     */
    private $languageExtension = 'com_postinstall';

    /**
     * @var bool
     *
     * @ORM\Column(name="language_client_id", type="boolean", nullable=false, options={"default"="1"})
     */
    private $languageClientId = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false, options={"default"="link","comment"="Message type - message, link, action"})
     */
    private $type = 'link';

    /**
     * @var string|null
     *
     * @ORM\Column(name="action_file", type="string", length=255, nullable=true, options={"comment"="RAD URI to the PHP file containing action method"})
     */
    private $actionFile = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true, options={"comment"="Action method name or URL"})
     */
    private $action = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="condition_file", type="string", length=255, nullable=true, options={"comment"="RAD URI to file holding display condition method"})
     */
    private $conditionFile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="condition_method", type="string", length=255, nullable=true, options={"comment"="Display condition method, must return boolean"})
     */
    private $conditionMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="version_introduced", type="string", length=50, nullable=false, options={"default"="3.2.0","comment"="Version when this message was introduced"})
     */
    private $versionIntroduced = '3.2.0';

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false, options={"default"="1"})
     */
    private $enabled = '1';


    /**
     * Get postinstallMessageId.
     *
     * @return int
     */
    public function getPostinstallMessageId()
    {
        return $this->postinstallMessageId;
    }

    /**
     * Set extensionId.
     *
     * @param int $extensionId
     *
     * @return JosPostinstallMessages
     */
    public function setExtensionId($extensionId)
    {
        $this->extensionId = $extensionId;

        return $this;
    }

    /**
     * Get extensionId.
     *
     * @return int
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }

    /**
     * Set titleKey.
     *
     * @param string $titleKey
     *
     * @return JosPostinstallMessages
     */
    public function setTitleKey($titleKey)
    {
        $this->titleKey = $titleKey;

        return $this;
    }

    /**
     * Get titleKey.
     *
     * @return string
     */
    public function getTitleKey()
    {
        return $this->titleKey;
    }

    /**
     * Set descriptionKey.
     *
     * @param string $descriptionKey
     *
     * @return JosPostinstallMessages
     */
    public function setDescriptionKey($descriptionKey)
    {
        $this->descriptionKey = $descriptionKey;

        return $this;
    }

    /**
     * Get descriptionKey.
     *
     * @return string
     */
    public function getDescriptionKey()
    {
        return $this->descriptionKey;
    }

    /**
     * Set actionKey.
     *
     * @param string $actionKey
     *
     * @return JosPostinstallMessages
     */
    public function setActionKey($actionKey)
    {
        $this->actionKey = $actionKey;

        return $this;
    }

    /**
     * Get actionKey.
     *
     * @return string
     */
    public function getActionKey()
    {
        return $this->actionKey;
    }

    /**
     * Set languageExtension.
     *
     * @param string $languageExtension
     *
     * @return JosPostinstallMessages
     */
    public function setLanguageExtension($languageExtension)
    {
        $this->languageExtension = $languageExtension;

        return $this;
    }

    /**
     * Get languageExtension.
     *
     * @return string
     */
    public function getLanguageExtension()
    {
        return $this->languageExtension;
    }

    /**
     * Set languageClientId.
     *
     * @param bool $languageClientId
     *
     * @return JosPostinstallMessages
     */
    public function setLanguageClientId($languageClientId)
    {
        $this->languageClientId = $languageClientId;

        return $this;
    }

    /**
     * Get languageClientId.
     *
     * @return bool
     */
    public function getLanguageClientId()
    {
        return $this->languageClientId;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return JosPostinstallMessages
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set actionFile.
     *
     * @param string|null $actionFile
     *
     * @return JosPostinstallMessages
     */
    public function setActionFile($actionFile = null)
    {
        $this->actionFile = $actionFile;

        return $this;
    }

    /**
     * Get actionFile.
     *
     * @return string|null
     */
    public function getActionFile()
    {
        return $this->actionFile;
    }

    /**
     * Set action.
     *
     * @param string|null $action
     *
     * @return JosPostinstallMessages
     */
    public function setAction($action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     *
     * @return string|null
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set conditionFile.
     *
     * @param string|null $conditionFile
     *
     * @return JosPostinstallMessages
     */
    public function setConditionFile($conditionFile = null)
    {
        $this->conditionFile = $conditionFile;

        return $this;
    }

    /**
     * Get conditionFile.
     *
     * @return string|null
     */
    public function getConditionFile()
    {
        return $this->conditionFile;
    }

    /**
     * Set conditionMethod.
     *
     * @param string|null $conditionMethod
     *
     * @return JosPostinstallMessages
     */
    public function setConditionMethod($conditionMethod = null)
    {
        $this->conditionMethod = $conditionMethod;

        return $this;
    }

    /**
     * Get conditionMethod.
     *
     * @return string|null
     */
    public function getConditionMethod()
    {
        return $this->conditionMethod;
    }

    /**
     * Set versionIntroduced.
     *
     * @param string $versionIntroduced
     *
     * @return JosPostinstallMessages
     */
    public function setVersionIntroduced($versionIntroduced)
    {
        $this->versionIntroduced = $versionIntroduced;

        return $this;
    }

    /**
     * Get versionIntroduced.
     *
     * @return string
     */
    public function getVersionIntroduced()
    {
        return $this->versionIntroduced;
    }

    /**
     * Set enabled.
     *
     * @param bool $enabled
     *
     * @return JosPostinstallMessages
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled.
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }
}
