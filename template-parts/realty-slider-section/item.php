<?php
extract( $vars );
$active = $active ?? null;
?>

<div class="carousel-item <?= $active ? 'active' : '' ?>">
    <div class="card border-0 shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="img-wrapper ratio ratio-4x3">
			<?php if ( $thumbnail ): ?>
                <img src="<?= $thumbnail ?>" class="card-img-top" alt="<?= $title ?>">
			<?php endif ?>
        </div>

        <div class="card-body">
            <a class="multi-truncate-2" href="<?= $link ?>">
                <h5 class="card-title"><?= $title ?></h5>
            </a>
        </div>
        <ul class="list-group list-group-flush">
			<?php if ( $city ) : ?>
                <li class="list-group-item"><span
                            class="fw-bold me-2"><?= __( 'City', THEME_TEXTDOMAIN ) ?></span><span><?= $city ?></span>
                </li>
			<?php endif ?>
            <li class="list-group-item overflow-hidden text-truncate"><span
                        class="fw-bold me-2"><?= __( 'Address', THEME_TEXTDOMAIN ) ?></span><span><?= $address ?></span>
            </li>
            <li class="list-group-item"><span
                        class="fw-bold me-2"><?= __( 'Price', THEME_TEXTDOMAIN ) ?></span><span><?= $price ?></span>
            </li>
            <li class="list-group-item"><span
                        class="fw-bold me-2"><?= __( 'Square', THEME_TEXTDOMAIN ) ?></span><span><?= $square ?></span>
            </li>
        </ul>
        <div class="p-2 d-flex justify-content-center">
            <a href="<?= $link ?>"
               class="btn btn-primary"><?= __( 'Read More', THEME_TEXTDOMAIN ) ?>
            </a>
        </div>
    </div>
</div>