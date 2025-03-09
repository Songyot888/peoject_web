<?php
 $events = getAllEvents();

randerView('checkin_get', [
    'events' => $events

]);
?>
