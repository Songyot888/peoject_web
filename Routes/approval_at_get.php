<?php

    $result = getEventById($_SESSION['eid']);
     randerView('approval_at_get', ['event_id' => $result]);