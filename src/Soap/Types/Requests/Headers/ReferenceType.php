<?php namespace SeBuDesign\Buckaroo\Soap\Types\Requests\Headers;

class ReferenceType
{
    /**
     * Array of transform types
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Headers\TransformType[]
     */
    public $Transforms;

    /**
     * The digest method type
     *
     * @var \SeBuDesign\Buckaroo\Soap\Types\Requests\Headers\DigestMethodType
     */
    public $DigestMethod;

    /**
     * The digest value
     *
     * @var string
     */
    public $DigestValue;

    /**
     * The URI
     *
     * @var string
     */
    public $URI;

    /**
     * The id of the reference type
     *
     * @var string
     */
    public $Id;

    /**
     * ReferenceType constructor.
     *
     * @param string $sUri The URI
     */
    public function __construct($sUri)
    {
        $this->URI = $sUri;
        $this->DigestMethod = new DigestMethodType();
        $this->DigestValue = '';
        $this->Transforms = [
            new TransformType(),
        ];
    }
}
