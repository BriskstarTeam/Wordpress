<div class="wpil-collapsible-wrapper">
    <div class="wpil-collapsible wpil-collapsible-static wpil-links-count"><?=count($links)?></div>
    <div class="wpil-content">
        <ul class="report_links">
            <?php foreach ($links as $link) : ?>
                <li>
                    <?=$link->post->getTitle()?> <?=!empty($link->anchor)?'<strong>[' . stripslashes($link->anchor) . ']</strong>':''?>
                    <br>
                    <a href="<?=$link->post->getLinks()->edit?>" target="_blank">[edit]</a>
                    <a href="<?=$link->post->getLinks()->view?>" target="_blank">[view]</a><br><br>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>