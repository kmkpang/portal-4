<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosActionLogConfig
 *
 * @ORM\Table(name="jos_action_log_config")
 * @ORM\Entity
 */
class JosActionLogConfig
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
     * @ORM\Column(name="type_title", type="string", length=255, nullable=false)
     */
    private $typeTitle = '';

    /**
     * @var string
     *
     * @ORM\Column(name="type_alias", type="string", length=255, nullable=false)
     */
    private $typeAlias = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="id_holder", type="string", length=255, nullable=true)
     */
    private $idHolder;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title_holder", type="string", length=255, nullable=true)
     */
    private $titleHolder;

    /**
     * @var string|null
     *
     * @ORM\Column(name="table_name", type="string", length=255, nullable=true)
     */
    private $tableName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text_prefix", type="string", length=255, nullable=true)
     */
    private $textPrefix;


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
     * Set typeTitle.
     *
     * @param string $typeTitle
     *
     * @return JosActionLogConfig
     */
    public function setTypeTitle($typeTitle)
    {
        $this->typeTitle = $typeTitle;

        return $this;
    }

    /**
     * Get typeTitle.
     *
     * @return string
     */
    public function getTypeTitle()
    {
        return $this->typeTitle;
    }

    /**
     * Set typeAlias.
     *
     * @param string $typeAlias
     *
     * @return JosActionLogConfig
     */
    public function setTypeAlias($typeAlias)
    {
        $this->typeAlias = $typeAlias;

        return $this;
    }

    /**
     * Get typeAlias.
     *
     * @return string
     */
    public function getTypeAlias()
    {
        return $this->typeAlias;
    }

    /**
     * Set idHolder.
     *
     * @param string|null $idHolder
     *
     * @return JosActionLogConfig
     */
    public function setIdHolder($idHolder = null)
    {
        $this->idHolder = $idHolder;

        return $this;
    }

    /**
     * Get idHolder.
     *
     * @return string|null
     */
    public function getIdHolder()
    {
        return $this->idHolder;
    }

    /**
     * Set titleHolder.
     *
     * @param string|null $titleHolder
     *
     * @return JosActionLogConfig
     */
    public function setTitleHolder($titleHolder = null)
    {
        $this->titleHolder = $titleHolder;

        return $this;
    }

    /**
     * Get titleHolder.
     *
     * @return string|null
     */
    public function getTitleHolder()
    {
        return $this->titleHolder;
    }

    /**
     * Set tableName.
     *
     * @param string|null $tableName
     *
     * @return JosActionLogConfig
     */
    public function setTableName($tableName = null)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get tableName.
     *
     * @return string|null
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * Set textPrefix.
     *
     * @param string|null $textPrefix
     *
     * @return JosActionLogConfig
     */
    public function setTextPrefix($textPrefix = null)
    {
        $this->textPrefix = $textPrefix;

        return $this;
    }

    /**
     * Get textPrefix.
     *
     * @return string|null
     */
    public function getTextPrefix()
    {
        return $this->textPrefix;
    }
}
