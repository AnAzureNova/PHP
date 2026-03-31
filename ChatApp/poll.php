<?php
    $since = intval($_GET['since'] ?? 0);
    $lines = file('CACHE/chat.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?? [];
    $msgs  = [];

    foreach ($lines as $line) {
        $m = json_decode($line, true);
        if ($m && $m['ts'] > $since) $msgs[] = $m;
    }
    echo json_encode($msgs);
?>