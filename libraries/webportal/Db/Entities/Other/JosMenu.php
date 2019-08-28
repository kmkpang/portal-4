<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosMenu
 *
 * @ORM\Table(name="jos_menu", uniqueConstraints={@ORM\UniqueConstraint(name="idx_client_id_parent_id_alias_language", columns={"client_id", "parent_id", "alias", "language"})}, indexes={@ORM\Index(name="idx_componentid", columns={"component_id", "menutype", "published", "access"}), @ORM\Index(name="idx_menutype", columns={"menutype"}), @ORM\Index(name="idx_left_right", columns={"lft", "rgt"}), @ORM\Index(name="idx_alias", columns={"alias"}), @ORM\Index(name="idx_path", columns={"path"}), @ORM\Index(name="idx_language", columns={"language"})})
 * @ORM\Entity
 */
class JosMenu
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
     * @ORM\Column(name="menutype", type="string", length=24, nullable=false, options={"comment"="The type of menu this item belongs to. FK to #__menu_types.menutype"})
     */
    private $menutype;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false, options={"comment"="The display title of the menu item."})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=400, nullable=false, options={"comment"="The SEF alias of the menu item."})
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255, nullable=false)
     */
    private $note = '';

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=1024, nullable=false, options={"comment"="The computed path of the menu item based on the alias field."})
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=1024, nullable=false, options={"comment"="The actually link the menu item refers to."})
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=16, nullable=false, options={"comment"="The type of link: Component, URL, Alias, Separator"})
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean", nullable=false, options={"comment"="The published state of the menu link."})
     */
    private $published = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=false, options={"default"="1","unsigned"=true,"comment"="The parent menu item in the menu tree."})
     */
    private $parentId = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer", nullable=false, options={"unsigned"=true,"comment"="The relative level in the tree."})
     */
    private $level = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="component_id", type="integer", nullable=false, options={"unsigned"=true,"comment"="FK to #__extensions.id"})
     */
    private $componentId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="checked_out", type="integer", nullable=false, options={"unsigned"=true,"comment"="FK to #__users.id"})
     */
    private $checkedOut = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="checked_out_time", type="datetime", nullable=false, options={"default"="0000-00-00 00:00:00","comment"="The time the menu item was checked out."})
     */
    private $checkedOutTime = '0000-00-00 00:00:00';

    /**
     * @var bool
     *
     * @ORM\Column(name="browserNav", type="boolean", nullable=false, options={"comment"="The click behaviour of the link."})
     */
    private $browsernav = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="access", type="integer", nullable=false, options={"unsigned"=true,"comment"="The access level required to view the menu item."})
     */
    private $access = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=false, options={"comment"="The image of the menu item."})
     */
    private $img;

    /**
     * @var int
     *
     * @ORM\Column(name="template_style_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $templateStyleId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false, options={"comment"="JSON encoded data for the menu item."})
     */
    private $params;

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="integer", nullable=false, options={"comment"="Nested set lft."})
     */
    private $lft = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="integer", nullable=false, options={"comment"="Nested set rgt."})
     */
    private $rgt = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="home", type="boolean", nullable=false, options={"comment"="Indicates if this menu item is the home or default page."})
     */
    private $home = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=7, nullable=false, options={"fixed"=true})
     */
    private $language = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="client_id", type="boolean", nullable=false)
     */
    private $clientId = '0';


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
     * Set menutype.
     *
     * @param string $menutype
     *
     * @return JosMenu
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
     * @return JosMenu
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
     * Set alias.
     *
     * @param string $alias
     *
     * @return JosMenu
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias.
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set note.
     *
     * @param string $note
     *
     * @return JosMenu
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set path.
     *
     * @param string $path
     *
     * @return JosMenu
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set link.
     *
     * @param string $link
     *
     * @return JosMenu
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return JosMenu
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
     * Set published.
     *
     * @param bool $published
     *
     * @return JosMenu
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published.
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set parentId.
     *
     * @param int $parentId
     *
     * @return JosMenu
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId.
     *
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set level.
     *
     * @param int $level
     *
     * @return JosMenu
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level.
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set componentId.
     *
     * @param int $componentId
     *
     * @return JosMenu
     */
    public function setComponentId($componentId)
    {
        $this->componentId = $componentId;

        return $this;
    }

    /**
     * Get componentId.
     *
     * @return int
     */
    public function getComponentId()
    {
        return $this->componentId;
    }

    /**
     * Set checkedOut.
     *
     * @param int $checkedOut
     *
     * @return JosMenu
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
     * @return JosMenu
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
     * Set browsernav.
     *
     * @param bool $browsernav
     *
     * @return JosMenu
     */
    public function setBrowsernav($browsernav)
    {
        $this->browsernav = $browsernav;

        return $this;
    }

    /**
     * Get browsernav.
     *
     * @return bool
     */
    public function getBrowsernav()
    {
        return $this->browsernav;
    }

    /**
     * Set access.
     *
     * @param int $access
     *
     * @return JosMenu
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access.
     *
     * @return int
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set img.
     *
     * @param string $img
     *
     * @return JosMenu
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img.
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set templateStyleId.
     *
     * @param int $templateStyleId
     *
     * @return JosMenu
     */
    public function setTemplateStyleId($templateStyleId)
    {
        $this->templateStyleId = $templateStyleId;

        return $this;
    }

    /**
     * Get templateStyleId.
     *
     * @return int
     */
    public function getTemplateStyleId()
    {
        return $this->templateStyleId;
    }

    /**
     * Set params.
     *
     * @param string $params
     *
     * @return JosMenu
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
     * Set lft.
     *
     * @param int $lft
     *
     * @return JosMenu
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft.
     *
     * @return int
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt.
     *
     * @param int $rgt
     *
     * @return JosMenu
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt.
     *
     * @return int
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set home.
     *
     * @param bool $home
     *
     * @return JosMenu
     */
    public function setHome($home)
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Get home.
     *
     * @return bool
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return JosMenu
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set clientId.
     *
     * @param bool $clientId
     *
     * @return JosMenu
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return bool
     */
    public function getClientId()
    {
        return $this->clientId;
    }
}
