<?php

namespace itestreport\ReportReader;

use itest\Display\Report;

/**
 * defines needed methods for plugins they are used
 * for working with reports
 * @author tziegler
 */
interface ReportPlugin extends \golibplugin\Plugin\Plugin {

    /**
     * initial run
     * @param type $reportIds
     */
    public function start ( $reportIds );

    /**
     * parsing the result
     * @param \itest\Display\Report\Result $result
     */
    public function parseResult ( Report\Result $result );

    /**
     * get out the result of the report
     *
     * @param type $environment depending where this is executed. like command-line
     * @return mixed
     */
    public function getFeedback ( $environment );
}
