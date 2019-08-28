<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * JosPortalSettings
 *
 * @ORM\Table(name="jos_portal_settings")
 * @ORM\Entity
 */
class JosPortalSettings implements JsonSerializable
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
     * @var string|null
     *
     * @ORM\Column(name="site_name", type="string", length=255, nullable=true)
     */
    private $siteName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country_code", type="string", length=2, nullable=true, options={"comment"="Two letter country code, IS , TH , PH etc."})
     */
    private $countryCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="style_name", type="string", length=255, nullable=true, options={"comment"="Gantry 5 style name"})
     */
    private $styleName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="languages", type="string", length=1024, nullable=true, options={"comment"="json array of enabled languages"})
     */
    private $languages;

    /**
     * @var string|null
     *
     * @ORM\Column(name="currencies", type="string", length=1024, nullable=true, options={"comment"="json array of 3 letter currency codes , like ['USD','BHT'] . The sequence is important, as the first curreny is used as default"})
     */
    private $currencies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_format_short", type="string", length=255, nullable=true)
     */
    private $dateFormatShort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_format_long", type="string", length=255, nullable=true)
     */
    private $dateFormatLong;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cloudinary_cloud_name", type="string", length=255, nullable=true)
     */
    private $cloudinaryCloudName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cloudinary_api_key", type="string", length=255, nullable=true)
     */
    private $cloudinaryApiKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cloudinary_api_secret", type="string", length=255, nullable=true)
     */
    private $cloudinaryApiSecret;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gmap_key", type="string", length=255, nullable=true)
     */
    private $gmapKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gmap_places_key", type="string", length=255, nullable=true)
     */
    private $gmapPlacesKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gmap_search_key", type="string", length=20, nullable=true)
     */
    private $gmapSearchKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gmap_points_of_interest_types", type="text", length=65535, nullable=true, options={"comment"="json array of interesting locations to show on gmap"})
     */
    private $gmapPointsOfInterestTypes;

    /**
     * @var float|null
     *
     * @ORM\Column(name="gmap_default_lattude", type="float", precision=10, scale=0, nullable=true)
     */
    private $gmapDefaultLattude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="gmap_default_longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $gmapDefaultLongitude;

    /**
     * @var int|null
     *
     * @ORM\Column(name="gmap_default_zoom", type="integer", nullable=true)
     */
    private $gmapDefaultZoom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ganalaytic_keys", type="text", length=65535, nullable=true, options={"comment"="json array of google analytic keys"})
     */
    private $ganalayticKeys;

    /**
     * @var string|null
     *
     * @ORM\Column(name="log_config", type="text", length=65535, nullable=true)
     */
    private $logConfig;

    /**
     * @var int|null
     *
     * @ORM\Column(name="log_level", type="integer", nullable=true, options={"comment"="debug 5 , info 4 , warn 3 , error 2, fatal 1 , Off 0"})
     */
    private $logLevel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="log_file_location", type="string", length=1024, nullable=true)
     */
    private $logFileLocation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mandrill_api_key", type="string", length=255, nullable=true)
     */
    private $mandrillApiKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mandrill_from_email", type="string", length=255, nullable=true)
     */
    private $mandrillFromEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mandrill_from_name", type="string", length=255, nullable=true)
     */
    private $mandrillFromName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mandrill_subaccount", type="string", length=255, nullable=true)
     */
    private $mandrillSubaccount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mandrill_tags", type="text", length=65535, nullable=true, options={"comment"="json array of mandrill default tags to attach to mails for this site"})
     */
    private $mandrillTags;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mandrill_google_analytics_domains", type="string", length=255, nullable=true)
     */
    private $mandrillGoogleAnalyticsDomains;

    /**
     * @var string|null
     *
     * @ORM\Column(name="style_variables", type="text", length=65535, nullable=true, options={"comment"="json array of variables to be merged into theme.check here: https://github.com/ant-design/ant-design/blob/master/components/style/themes/default.less"})
     */
    private $styleVariables;


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
     * Set siteName.
     *
     * @param string|null $siteName
     *
     * @return JosPortalSettings
     */
    public function setSiteName($siteName = null)
    {
        $this->siteName = $siteName;

        return $this;
    }

    /**
     * Get siteName.
     *
     * @return string|null
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * Set countryCode.
     *
     * @param string|null $countryCode
     *
     * @return JosPortalSettings
     */
    public function setCountryCode($countryCode = null)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode.
     *
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set styleName.
     *
     * @param string|null $styleName
     *
     * @return JosPortalSettings
     */
    public function setStyleName($styleName = null)
    {
        $this->styleName = $styleName;

        return $this;
    }

    /**
     * Get styleName.
     *
     * @return string|null
     */
    public function getStyleName()
    {
        return $this->styleName;
    }

    /**
     * Set languages.
     *
     * @param string|null $languages
     *
     * @return JosPortalSettings
     */
    public function setLanguages($languages = null)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get languages.
     *
     * @return string|null
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set currencies.
     *
     * @param string|null $currencies
     *
     * @return JosPortalSettings
     */
    public function setCurrencies($currencies = null)
    {
        $this->currencies = $currencies;

        return $this;
    }

    /**
     * Get currencies.
     *
     * @return string|null
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * Set dateFormatShort.
     *
     * @param string|null $dateFormatShort
     *
     * @return JosPortalSettings
     */
    public function setDateFormatShort($dateFormatShort = null)
    {
        $this->dateFormatShort = $dateFormatShort;

        return $this;
    }

    /**
     * Get dateFormatShort.
     *
     * @return string|null
     */
    public function getDateFormatShort()
    {
        return $this->dateFormatShort;
    }

    /**
     * Set dateFormatLong.
     *
     * @param string|null $dateFormatLong
     *
     * @return JosPortalSettings
     */
    public function setDateFormatLong($dateFormatLong = null)
    {
        $this->dateFormatLong = $dateFormatLong;

        return $this;
    }

    /**
     * Get dateFormatLong.
     *
     * @return string|null
     */
    public function getDateFormatLong()
    {
        return $this->dateFormatLong;
    }

    /**
     * Set cloudinaryCloudName.
     *
     * @param string|null $cloudinaryCloudName
     *
     * @return JosPortalSettings
     */
    public function setCloudinaryCloudName($cloudinaryCloudName = null)
    {
        $this->cloudinaryCloudName = $cloudinaryCloudName;

        return $this;
    }

    /**
     * Get cloudinaryCloudName.
     *
     * @return string|null
     */
    public function getCloudinaryCloudName()
    {
        return $this->cloudinaryCloudName;
    }

    /**
     * Set cloudinaryApiKey.
     *
     * @param string|null $cloudinaryApiKey
     *
     * @return JosPortalSettings
     */
    public function setCloudinaryApiKey($cloudinaryApiKey = null)
    {
        $this->cloudinaryApiKey = $cloudinaryApiKey;

        return $this;
    }

    /**
     * Get cloudinaryApiKey.
     *
     * @return string|null
     */
    public function getCloudinaryApiKey()
    {
        return $this->cloudinaryApiKey;
    }

    /**
     * Set cloudinaryApiSecret.
     *
     * @param string|null $cloudinaryApiSecret
     *
     * @return JosPortalSettings
     */
    public function setCloudinaryApiSecret($cloudinaryApiSecret = null)
    {
        $this->cloudinaryApiSecret = $cloudinaryApiSecret;

        return $this;
    }

    /**
     * Get cloudinaryApiSecret.
     *
     * @return string|null
     */
    public function getCloudinaryApiSecret()
    {
        return $this->cloudinaryApiSecret;
    }

    /**
     * Set gmapKey.
     *
     * @param string|null $gmapKey
     *
     * @return JosPortalSettings
     */
    public function setGmapKey($gmapKey = null)
    {
        $this->gmapKey = $gmapKey;

        return $this;
    }

    /**
     * Get gmapKey.
     *
     * @return string|null
     */
    public function getGmapKey()
    {
        return $this->gmapKey;
    }

    /**
     * Set gmapPlacesKey.
     *
     * @param string|null $gmapPlacesKey
     *
     * @return JosPortalSettings
     */
    public function setGmapPlacesKey($gmapPlacesKey = null)
    {
        $this->gmapPlacesKey = $gmapPlacesKey;

        return $this;
    }

    /**
     * Get gmapPlacesKey.
     *
     * @return string|null
     */
    public function getGmapPlacesKey()
    {
        return $this->gmapPlacesKey;
    }

    /**
     * Set gmapSearchKey.
     *
     * @param string|null $gmapSearchKey
     *
     * @return JosPortalSettings
     */
    public function setGmapSearchKey($gmapSearchKey = null)
    {
        $this->gmapSearchKey = $gmapSearchKey;

        return $this;
    }

    /**
     * Get gmapSearchKey.
     *
     * @return string|null
     */
    public function getGmapSearchKey()
    {
        return $this->gmapSearchKey;
    }

    /**
     * Set gmapPointsOfInterestTypes.
     *
     * @param string|null $gmapPointsOfInterestTypes
     *
     * @return JosPortalSettings
     */
    public function setGmapPointsOfInterestTypes($gmapPointsOfInterestTypes = null)
    {
        $this->gmapPointsOfInterestTypes = $gmapPointsOfInterestTypes;

        return $this;
    }

    /**
     * Get gmapPointsOfInterestTypes.
     *
     * @return string|null
     */
    public function getGmapPointsOfInterestTypes()
    {
        return $this->gmapPointsOfInterestTypes;
    }

    /**
     * Set gmapDefaultLattude.
     *
     * @param float|null $gmapDefaultLattude
     *
     * @return JosPortalSettings
     */
    public function setGmapDefaultLattude($gmapDefaultLattude = null)
    {
        $this->gmapDefaultLattude = $gmapDefaultLattude;

        return $this;
    }

    /**
     * Get gmapDefaultLattude.
     *
     * @return float|null
     */
    public function getGmapDefaultLattude()
    {
        return $this->gmapDefaultLattude;
    }

    /**
     * Set gmapDefaultLongitude.
     *
     * @param float|null $gmapDefaultLongitude
     *
     * @return JosPortalSettings
     */
    public function setGmapDefaultLongitude($gmapDefaultLongitude = null)
    {
        $this->gmapDefaultLongitude = $gmapDefaultLongitude;

        return $this;
    }

    /**
     * Get gmapDefaultLongitude.
     *
     * @return float|null
     */
    public function getGmapDefaultLongitude()
    {
        return $this->gmapDefaultLongitude;
    }

    /**
     * Set gmapDefaultZoom.
     *
     * @param int|null $gmapDefaultZoom
     *
     * @return JosPortalSettings
     */
    public function setGmapDefaultZoom($gmapDefaultZoom = null)
    {
        $this->gmapDefaultZoom = $gmapDefaultZoom;

        return $this;
    }

    /**
     * Get gmapDefaultZoom.
     *
     * @return int|null
     */
    public function getGmapDefaultZoom()
    {
        return $this->gmapDefaultZoom;
    }

    /**
     * Set ganalayticKeys.
     *
     * @param string|null $ganalayticKeys
     *
     * @return JosPortalSettings
     */
    public function setGanalayticKeys($ganalayticKeys = null)
    {
        $this->ganalayticKeys = $ganalayticKeys;

        return $this;
    }

    /**
     * Get ganalayticKeys.
     *
     * @return string|null
     */
    public function getGanalayticKeys()
    {
        return $this->ganalayticKeys;
    }

    /**
     * Set logConfig.
     *
     * @param string|null $logConfig
     *
     * @return JosPortalSettings
     */
    public function setLogConfig($logConfig = null)
    {
        $this->logConfig = $logConfig;

        return $this;
    }

    /**
     * Get logConfig.
     *
     * @return string|null
     */
    public function getLogConfig()
    {
        return $this->logConfig;
    }

    /**
     * Set logLevel.
     *
     * @param int|null $logLevel
     *
     * @return JosPortalSettings
     */
    public function setLogLevel($logLevel = null)
    {
        $this->logLevel = $logLevel;

        return $this;
    }

    /**
     * Get logLevel.
     *
     * @return int|null
     */
    public function getLogLevel()
    {
        return $this->logLevel;
    }

    /**
     * Set logFileLocation.
     *
     * @param string|null $logFileLocation
     *
     * @return JosPortalSettings
     */
    public function setLogFileLocation($logFileLocation = null)
    {
        $this->logFileLocation = $logFileLocation;

        return $this;
    }

    /**
     * Get logFileLocation.
     *
     * @return string|null
     */
    public function getLogFileLocation()
    {
        return $this->logFileLocation;
    }

    /**
     * Set mandrillApiKey.
     *
     * @param string|null $mandrillApiKey
     *
     * @return JosPortalSettings
     */
    public function setMandrillApiKey($mandrillApiKey = null)
    {
        $this->mandrillApiKey = $mandrillApiKey;

        return $this;
    }

    /**
     * Get mandrillApiKey.
     *
     * @return string|null
     */
    public function getMandrillApiKey()
    {
        return $this->mandrillApiKey;
    }

    /**
     * Set mandrillFromEmail.
     *
     * @param string|null $mandrillFromEmail
     *
     * @return JosPortalSettings
     */
    public function setMandrillFromEmail($mandrillFromEmail = null)
    {
        $this->mandrillFromEmail = $mandrillFromEmail;

        return $this;
    }

    /**
     * Get mandrillFromEmail.
     *
     * @return string|null
     */
    public function getMandrillFromEmail()
    {
        return $this->mandrillFromEmail;
    }

    /**
     * Set mandrillFromName.
     *
     * @param string|null $mandrillFromName
     *
     * @return JosPortalSettings
     */
    public function setMandrillFromName($mandrillFromName = null)
    {
        $this->mandrillFromName = $mandrillFromName;

        return $this;
    }

    /**
     * Get mandrillFromName.
     *
     * @return string|null
     */
    public function getMandrillFromName()
    {
        return $this->mandrillFromName;
    }

    /**
     * Set mandrillSubaccount.
     *
     * @param string|null $mandrillSubaccount
     *
     * @return JosPortalSettings
     */
    public function setMandrillSubaccount($mandrillSubaccount = null)
    {
        $this->mandrillSubaccount = $mandrillSubaccount;

        return $this;
    }

    /**
     * Get mandrillSubaccount.
     *
     * @return string|null
     */
    public function getMandrillSubaccount()
    {
        return $this->mandrillSubaccount;
    }

    /**
     * Set mandrillTags.
     *
     * @param string|null $mandrillTags
     *
     * @return JosPortalSettings
     */
    public function setMandrillTags($mandrillTags = null)
    {
        $this->mandrillTags = $mandrillTags;

        return $this;
    }

    /**
     * Get mandrillTags.
     *
     * @return string|null
     */
    public function getMandrillTags()
    {
        return $this->mandrillTags;
    }

    /**
     * Set mandrillGoogleAnalyticsDomains.
     *
     * @param string|null $mandrillGoogleAnalyticsDomains
     *
     * @return JosPortalSettings
     */
    public function setMandrillGoogleAnalyticsDomains($mandrillGoogleAnalyticsDomains = null)
    {
        $this->mandrillGoogleAnalyticsDomains = $mandrillGoogleAnalyticsDomains;

        return $this;
    }

    /**
     * Get mandrillGoogleAnalyticsDomains.
     *
     * @return string|null
     */
    public function getMandrillGoogleAnalyticsDomains()
    {
        return $this->mandrillGoogleAnalyticsDomains;
    }

    /**
     * Set styleVariables.
     *
     * @param string|null $styleVariables
     *
     * @return JosPortalSettings
     */
    public function setStyleVariables($styleVariables = null)
    {
        $this->styleVariables = $styleVariables;

        return $this;
    }

    /**
     * Get styleVariables.
     *
     * @return string|null
     */
    public function getStyleVariables()
    {
        return $this->styleVariables;
    }
    /**
     * @var bool
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false)
     */
    private $isDeleted = '0';


    /**
     * Set isDeleted.
     *
     * @param bool $isDeleted
     *
     * @return JosPortalSettings
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted.
     *
     * @return bool
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Return data which should be serialized by json_encode().
     *
     * @return  mixed
     *
     * @since   1.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
