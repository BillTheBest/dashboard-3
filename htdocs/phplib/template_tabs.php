<?php require_once('Dashboard.php'); ?>

<? if (!empty($tabs)) { ?>
<div class="home"><a href="/" title="Dashboards Home"><img src="/images/pointer-datepicker.png"></a></div>
<ul class='tabs'>
    <?
    $get_params = array();
    foreach ($_GET as $key => $value) {
        if (isset($routing_param) && $key == $routing_param) {
            continue;
        }
        if (is_array($value)) {
            foreach ($value as $element) {
                $get_params[] = "{$key}[]=$element";
            }
        } else {
            $get_params[] = "$key=$value";
        }
    }
    $url_params = implode("&", $get_params);
    $i = 0;
    ?>

    <? foreach ($tabs as $name => $url) : ?>
    <?
    $full_url = $url;

    if ($url_params) {
        $separator = strpos($url, "?") ? "&" : "?";
        $full_url = "$url$separator$url_params";
    }

    $link_title = Tabs::getLinkTitle($name, $url);
    $link_target = Tabs::getLinkTarget($url);
    $link_image = Tabs::getLinkIcon($url);
    ?>
    <li class='<?= $i == 0 ? 'first ' : '' ?><?= $url == $tab_url ? "active" : ""?>'>
        <a href='<?= $full_url ?>' <?= $link_target ?> title='<?= $link_title ?>'><span><?= $link_title ?><?= $link_image ?></span></a>
    </li>
    <? $i++; ?>
    <? endforeach; ?>
</ul>
<? } ?>
