<?php
declare(strict_types=1);

if (!isset($_GET['keyword'])) {
    $result = getSearch();
    randerView('search_get', array('result' => $result));
} elseif ($_GET['keyword'] == '') {
    $result = getSearch();
    randerView('search_get', array('result' => $result));
} else {
    $result = getSearchByKeyword($_GET['keyword']);
    randerView('search_get', array('result' => $result));
}