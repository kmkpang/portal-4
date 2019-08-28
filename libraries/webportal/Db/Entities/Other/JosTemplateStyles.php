<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosTemplateStyles
 *
 * @ORM\Table(name="jos_template_styles", indexes={@ORM\Index(name="idx_template", columns={"template"}), @ORM\Index(name="idx_home", columns={"home"})})
 * @ORM\Entity
 */
class JosTemplateStyles
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
     * @ORM\Column(name="template", type="string", length=50, nullable=false)
     */
    private $template = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="client_id", type="boolean", nullable=false)
     */
    private $clientId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="home", type="string", length=7, nullable=false, options={"fixed"=true})
     */
    private $home = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title = '';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params;


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
     * Set template.
     *
     * @param string $template
     *
     * @return JosTemplateStyles
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get template.
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set clientId.
     *
     * @param bool $clientId
     *
     * @return JosTemplateStyles
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

    /**
     * Set home.
     *
     * @param string $home
     *
     * @return JosTemplateStyles
     */
    public function setHome($home)
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Get home.
     *
     * @return string
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return JosTemplateStyles
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
     * Set params.
     *
     * @param string $params
     *
     * @return JosTemplateStyles
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
}
