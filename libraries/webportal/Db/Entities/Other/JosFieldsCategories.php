<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosFieldsCategories
 *
 * @ORM\Table(name="jos_fields_categories")
 * @ORM\Entity
 */
class JosFieldsCategories
{
    /**
     * @var int
     *
     * @ORM\Column(name="field_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fieldId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $categoryId = '0';


    /**
     * Set fieldId.
     *
     * @param int $fieldId
     *
     * @return JosFieldsCategories
     */
    public function setFieldId($fieldId)
    {
        $this->fieldId = $fieldId;

        return $this;
    }

    /**
     * Get fieldId.
     *
     * @return int
     */
    public function getFieldId()
    {
        return $this->fieldId;
    }

    /**
     * Set categoryId.
     *
     * @param int $categoryId
     *
     * @return JosFieldsCategories
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId.
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
}
