<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosContentTypes
 *
 * @ORM\Table(name="jos_content_types", indexes={@ORM\Index(name="idx_alias", columns={"type_alias"})})
 * @ORM\Entity
 */
class JosContentTypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="type_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeId;

    /**
     * @var string
     *
     * @ORM\Column(name="type_title", type="string", length=255, nullable=false)
     */
    private $typeTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="type_alias", type="string", length=400, nullable=false)
     */
    private $typeAlias;

    /**
     * @var string
     *
     * @ORM\Column(name="table", type="string", length=255, nullable=false)
     */
    private $table;

    /**
     * @var string
     *
     * @ORM\Column(name="rules", type="text", length=65535, nullable=false)
     */
    private $rules;

    /**
     * @var string
     *
     * @ORM\Column(name="field_mappings", type="text", length=65535, nullable=false)
     */
    private $fieldMappings;

    /**
     * @var string
     *
     * @ORM\Column(name="router", type="string", length=255, nullable=false)
     */
    private $router;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content_history_options", type="string", length=5120, nullable=true, options={"comment"="JSON string for com_contenthistory options"})
     */
    private $contentHistoryOptions;


    /**
     * Get typeId.
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set typeTitle.
     *
     * @param string $typeTitle
     *
     * @return JosContentTypes
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
     * @return JosContentTypes
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
     * Set table.
     *
     * @param string $table
     *
     * @return JosContentTypes
     */
    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Get table.
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set rules.
     *
     * @param string $rules
     *
     * @return JosContentTypes
     */
    public function setRules($rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Get rules.
     *
     * @return string
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Set fieldMappings.
     *
     * @param string $fieldMappings
     *
     * @return JosContentTypes
     */
    public function setFieldMappings($fieldMappings)
    {
        $this->fieldMappings = $fieldMappings;

        return $this;
    }

    /**
     * Get fieldMappings.
     *
     * @return string
     */
    public function getFieldMappings()
    {
        return $this->fieldMappings;
    }

    /**
     * Set router.
     *
     * @param string $router
     *
     * @return JosContentTypes
     */
    public function setRouter($router)
    {
        $this->router = $router;

        return $this;
    }

    /**
     * Get router.
     *
     * @return string
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * Set contentHistoryOptions.
     *
     * @param string|null $contentHistoryOptions
     *
     * @return JosContentTypes
     */
    public function setContentHistoryOptions($contentHistoryOptions = null)
    {
        $this->contentHistoryOptions = $contentHistoryOptions;

        return $this;
    }

    /**
     * Get contentHistoryOptions.
     *
     * @return string|null
     */
    public function getContentHistoryOptions()
    {
        return $this->contentHistoryOptions;
    }
}
