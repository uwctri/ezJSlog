<?php

namespace UWMadison\ezJSlog;
use ExternalModules\AbstractExternalModule;
use ExternalModules\ExternalModules;

use REDCap;

class ezJSlog extends AbstractExternalModule {
    
    private $module_global = 'ez';
    
    public function redcap_every_page_top($project_id) {
        if ( !defined("USERID") ) //Don't load if the user isn't loged in
            return;
        
        $this->makeGlobal();
        $this->includeJs('ez.js');
        
        // Custom Config page
        if (strpos(PAGE, 'manager/project.php') !== false && $project_id != NULL) {
            $this->includeJs('config.js');
        }
    }
    
    private function makeGlobal() {
        echo "<script>var ".$this->module_global." = ".json_encode(['post'=>$this->getURL('log.php')]).";</script>";
    }
    
    private function includeJs($path) {
        echo '<script src="' . $this->getUrl($path) . '"></script>';
    }
    
    public function ezLog( $action, $changes, $record, $eventid, $pid ) {
        global $Proj; // We only support project level right now
        if ( empty($pid) || ($pid != $Proj->project_id) )
            return;
        
        $sql = NULL;
        $action =  empty($action)  ? "No action logged" : $action;
        $changes = empty($changes) ? NULL : $changes;
        $record =  empty($record)  ? NULL : $record;
        $eventid = empty($eventid) ? NULL : $eventid;
        
        REDCap::logEvent( $action , $changes, $sql, $record, $event, $pid);
    }
    
}

?>

