<?php namespace SeBuDesign\Buckaroo\Soap\Types\Responses\Common\ConsumerMessage;

class ConsumerMessage
{
    /**
     * Does the consumer has to read the message
     *
     * @var boolean
     */
    protected $MustRead;

    /**
     * The culture the message is in
     *
     * @var string
     */
    protected $CultureName;

    /**
     * The title of the message
     *
     * @var string
     */
    protected $Title;

    /**
     * The message in plain text
     *
     * @var string
     */
    protected $PlainText;

    /**
     * The message in html form
     *
     * @var string
     */
    protected $HtmlText;

    /**
     * Does the consumer has to read this message
     *
     * @return bool
     */
    public function mustReadMessage()
    {
        return $this->MustRead;
    }

    /**
     * Get the message culture
     *
     * @return string
     */
    public function getCulture()
    {
        return $this->CultureName;
    }

    /**
     * Get the title of the message
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Get the plain text message
     *
     * @return string
     */
    public function getPlainText()
    {
        return $this->PlainText;
    }

    /**
     * Get the html text message
     *
     * @return string
     */
    public function getHtmlText()
    {
        return $this->HtmlText;
    }
}
