<?php

namespace itestreport\ReportReader;

use itest\Config as iConfig;
use itest\Display\Report;
use golibplugin\Plugin;

/**
 * Description of Fetch
 *
 * @author tziegler
 */
class Fetch extends Plugin\Provider {

    /**
     * the report collection
     * @var Report\Collection
     */
    private $reportCollection = NULL;

    public function __construct ( $reportFileName = NULL ) {
        $this->init();
    }

    private function init () {
        // initialize config reader.
        $loader = new iConfig\Loader();
        $this->reportCollection = new Report\Collection();
    }

    public function fetchReport () {
        $this->loadReport();
        $this->iterateReport();
    }

    private function iterateReport () {
        $ids = $this->reportCollection->getReportIds();
        $this->callPlugins( 'start', $ids );
        foreach ($ids as $id) {
            $rep = $this->reportCollection->getReportById( $id );
            if ($rep instanceof Report\Result) {
                $returns = $this->callPlugins( 'parseResult', $rep );
            }
        }
    }

    private function loadReport () {
        $this->reportCollection->loadReport();
    }

}
