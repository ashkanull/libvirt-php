<?php
class Libvirt {
    private $conn;
    private $last_error;
    private $allow_cached = true;
    private $dominfos = array();

    function Libvirt($debug = false) {
        if ($debug)
            $this->set_logfile($debug);
    }

    function get_domain_all_stat() {
        return libvirt_connect_get_all_domain_stats($this->conn,0);
    }
}
?>

