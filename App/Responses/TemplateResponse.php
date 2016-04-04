<?php
namespace Creios\Creiwork\Responses;

/**
 * Class DataLayer
 * @package Creios\Creiwork\Util
 */
class TemplateResponse extends DataResponse
{

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
     * @return array
     */
    public function getTemplate()
    {
        return $this->template;
    }

    
}