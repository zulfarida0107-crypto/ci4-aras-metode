<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="flex items-center gap-2">
    <?php if ($pager->hasPrevious()) : ?>
        <li>
            <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="w-10 h-10 flex items-center justify-center rounded-xl border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-sm font-bold">chevron_left</span>
            </a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
        <li>
            <a href="<?= $link['uri'] ?>" class="w-10 h-10 flex items-center justify-center rounded-xl text-sm font-semibold transition-colors <?= $link['active'] ? 'bg-primary text-white shadow-sm' : 'border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary bg-white' ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li>
            <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="w-10 h-10 flex items-center justify-center rounded-xl border border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-sm font-bold">chevron_right</span>
            </a>
        </li>
    <?php endif ?>
    </ul>
</nav>
