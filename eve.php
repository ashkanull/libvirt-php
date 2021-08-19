<?php

    require('libvirt.php');
    $lv = new Libvirt();
    if ($lv->connect("qemu:///system") == false)
        die('<html><body>Cannot open connection to hypervisor</body></html>');
    $hn = $lv->get_hostname();
    if ($hn == false)
        die('<html><body>Cannot get hostname</body></html>');

    $allStats = $lv->get_domain_all_stat();
    print_r($allStats);
    echo "\r\n<br>\r\n";

    $doms = $lv->get_domains();

    foreach ($doms as $name) {

        echo $name;
        echo "\r\n<br><br>\r\n";
        echo $allStats[$name]['balloon.current'];
        echo "\r\n<br>\r\n";
        echo $allStats[$name]['balloon.current'] - $allStats[$name]['balloon.unused'];
        echo "\r\n<br><br>\r\n";
        echo $allStats[$name]['net.0.tx.bytes'];
        echo "\r\n<br>\r\n";
        echo $allStats[$name]['net.0.rx.bytes'];
        echo "\r\n<br><br>\r\n";
        echo $allStats[$name]['block.0.rd.bytes'];
        echo "\r\n<br>\r\n";
        echo $allStats[$name]['block.0.wr.bytes'];
        echo "\r\n<br><br>\r\n";
        echo $allStats[$name]['cpu.time'];
	echo "\r\n\r\n";
    }

    ?>
