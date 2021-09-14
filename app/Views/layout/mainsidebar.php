<aside class="main-sidebar <?= config('Boilerplate')->theme['sidebar']['border'] ? 'border-right' : '' ?> sidebar-<?= config('Boilerplate')->theme['sidebar']['type'] ?>-<?= config('Boilerplate')->theme['sidebar']['links']['bg'] ?> elevation-<?= config('Boilerplate')->theme['sidebar']['shadow'] ?>">
    <a href="<?= route_to('/') ?>" class="brand-link <?= !empty(config('Boilerplate')->theme['sidebar']['brand']['bg']) ? 'bg-' . config('Boilerplate')->theme['sidebar']['brand']['bg'] : '' ?>">
        <img src="<?= base_url(config('Boilerplate')->theme['sidebar']['brand']['logo']['icon']) ?>" class="brand-image img-circle elevation-<?= config('Boilerplate')->theme['sidebar']['brand']['logo']['shadow'] ?>" style="opacity: .8">
        <span class="brand-text"><?= config('Boilerplate')->theme['sidebar']['brand']['logo']['text'] ?></span>
    </a>
    <div class="sidebar">
        <?php if (config('Boilerplate')->theme['sidebar']['user']['visible']) { ?>
            <div class="user-panel py-3 d-flex">
                <div class="image">
                    <img src="/assets/images/logo-tp.png" class="img-circle elevation-<?= config('Boilerplate')->theme['sidebar']['user']['shadow'] ?>" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= route_to('user-profile') ?>" class="d-block"><?= user()->username ?></a>
                </div>
            </div>
        <?php } ?>
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent <?= config('Boilerplate')->theme['sidebar']['compact'] ? 'nav-compact' : '' ?>" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach (menu() as $parent) {
                    $url = $parent->route;
                    $new_base_url = base_url($url) . ($url == '/' ? '/' : '');
                    $rows_temp = [];
                    $rows_uri = [];
                    $from_uri = explode('/', uri_string());
                    for ($i = 0; $i < count($from_uri); $i++) {
                        $rows_temp[$i] = ($i > 0 ? $rows_temp[$i - 1] . '/' : '') . $from_uri[$i];
                        if ($rows_temp[$i] != '') {
                            $rows_uri[] = base_url($rows_temp[$i]) . ($rows_temp[$i] == '/' ? '/' : '');
                        }
                    }
                    // var_dump(array_column($parent->children, 'route'));

                ?>
                    <li class="nav-item has-treeview <?= in_array($new_base_url, $rows_uri)  || in_array(uri_string(), array_column($parent->children, 'route')) ? 'menu-open' : '' ?>">
                        <a href="<?= $new_base_url ?>" class="nav-link <?= in_array($new_base_url, $rows_uri)  || in_array(uri_string(), array_column($parent->children, 'route')) ? 'active' : '' ?>">
                            <i class="nav-icon <?= $parent->icon ?>"></i>
                            <p>
                                <?= $parent->title ?>
                                <?php if (count($parent->children)) { ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php } ?>
                            </p>
                        </a>
                        <?php if (count($parent->children)) { ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($parent->children as $child) { ?>
                                    <li class="nav-item has-treeview">
                                        <a href="<?= base_url($child->route) ?>" class="nav-link <?= in_array(base_url($child->route), $rows_uri) ? 'active' : '' ?>">
                                            <i class="nav-icon <?= $child->icon ?>"></i>
                                            <p><?= $child->title ?></p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</aside>