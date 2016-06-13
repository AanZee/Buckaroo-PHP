<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Transaction;

class RequiredAction
{
    /**
     * Buckaroo only has one type at this moment, the redirect type
     */
    const TYPE_REDIRECT = 'Redirect';

    /**
     * The redirect url
     * 
     * @var string
     */
    protected $RedirectURL;

    /**
     * The required action type
     *
     * @var string
     */
    protected $Type;

    /**
     * The required action name
     *
     * @var string
     */
    protected $Name;

    /**
     * Get the redirect url
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->RedirectURL;
    }

    /**
     * Get the action type
     *
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }
}
