<div class="content-header pt-2 pb-1">
    <div class="container-fluid">
        <div class="row mb-2 align-items-end" <?= (isset($breadcump_show) && isset($title_show)) ?
                                                    (($breadcump_show && $title_show) ?  '' : 'style="display:none"') : '' ?>>
            <div class="col-sm-6">
                <h1 class="m-0" <?= isset($title_show) ? ($title_show ?  '' : 'style="display:none"') : '' ?>>
                    <?= $title ?? '' ?>
                    <?php if (isset($subtitle)) { ?>
                        <small class="font-weight-light ml-1 text-md"><?= $subtitle ?></small>
                    <?php } ?>
                </h1>
            </div>

            <?php if (isset($breadcrumb)) { ?>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right text-sm" <?= isset($breadcump_show) ? ($breadcump_show ?  '' : 'style="display:none"') : '' ?>>
                        <?php
                        if (is_array($breadcrumb)) {
                            $html = '';
                            foreach ($breadcrumb as $b) {
                                $disabled = (isset($b['disabled']) ? $b['disabled'] : false) ? 'span' : 'a';
                                $route = base_url(isset($b['route']) ? $b['route'] : '/');
                                $title = isset($b['title']) ? $b['title'] : '';
                                $html .= '<li class="breadcrumb-item">';
                                $html .= "<{$disabled} href=\"{$route}\">";
                                $html .= $title;
                                $html .= "</{$disabled}>";
                                $html .= "</li>";
                            }
                            echo $html;
                        }
                        ?>
                    </ol>
                </div>
            <?php } ?>

        </div>
    </div>
</div>