<?php

namespace Encore\Admin\Grid\Filter\Field;

use Encore\Admin\Admin;

class DateTime
{
    /**
     * @var \Encore\Admin\Grid\Filter\AbstractFilter
     */
    protected $filter;

    protected $format;

    public function __construct($filter, $format = 'YYYY-MM-DD HH:mm:ss')
    {
        $this->filter = $filter;
        $this->format = $format;

        $this->prepare();
    }

    public function prepare()
    {
        $options['format'] = $this->format ? : 'YYYY-MM-DD HH:mm:ss';
        $options['locale'] = config('app.locale');

        $script = "$('#{$this->filter->getId()}').datetimepicker(".json_encode($options).');';

        Admin::script($script);
    }

    public function variables()
    {
        return [];
    }

    public function name()
    {
        return 'datetime';
    }
}
