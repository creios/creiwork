<?php
namespace Creios\Creiwork\Responses;

/**
 * Class TemplateResponse
 * @package Creios\Creiwork\Responses
 */
class TemplateResponse extends DataResponse
{

    /**
     * @var string
     */
    protected $template;

    /**
     * TemplateResponse constructor.
     * @param array $template
     * @param array $data
     */
    public function __construct($template, array $data)
    {
        $this->template = $template;
        parent::__construct($data);
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

}