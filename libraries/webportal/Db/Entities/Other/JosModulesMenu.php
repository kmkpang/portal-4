<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosModulesMenu
 *
 * @ORM\Table(name="jos_modules_menu")
 * @ORM\Entity
 */
class JosModulesMenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="moduleid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $moduleid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="menuid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $menuid = '0';


    /**
     * Set moduleid.
     *
     * @param int $moduleid
     *
     * @return JosModulesMenu
     */
    public function setModuleid($moduleid)
    {
        $this->moduleid = $moduleid;

        return $this;
    }

    /**
     * Get moduleid.
     *
     * @return int
     */
    public function getModuleid()
    {
        return $this->moduleid;
    }

    /**
     * Set menuid.
     *
     * @param int $menuid
     *
     * @return JosModulesMenu
     */
    public function setMenuid($menuid)
    {
        $this->menuid = $menuid;

        return $this;
    }

    /**
     * Get menuid.
     *
     * @return int
     */
    public function getMenuid()
    {
        return $this->menuid;
    }
}
