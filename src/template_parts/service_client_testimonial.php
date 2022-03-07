<?php
    $clientTestimonialDesc = getPostMeta('service_archive_client_testimonial_quote');
    $clientTestimonialName = getPostMeta('service_archive_client_testimonial_name');
    $clientTestimonialTitle = getPostMeta('service_archive_client_testimonial_title');
?>

<?php if (isset($clientTestimonialDesc) && !empty($clientTestimonialDesc)) : ?>
    <section class="o-container-client-testimonial c-fancy-bg">
        <div class="o-container-content">
            <blockquote class="c-blockquote c-blockquote--client">
                <?php if ($clientTestimonialDesc) : ?>
                    <p>
                        <?= $clientTestimonialDesc ?>
                    </p>
                <?php endif; ?>
                
                <?php if ($clientTestimonialName || $clientTestimonialTitle) : ?>
                    <footer>
                        <div class="c-blockquote__person">
                            <div class="c-blockquote__text">
                                <?php if ($clientTestimonialName) : ?>
                                    <div class=" c-blockquote__name">
                                        <?= $clientTestimonialName ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($clientTestimonialTitle) : ?>
                                    <div class="c-blockquote__title">
                                        <?= $clientTestimonialTitle ?>
                                    </div>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </footer>
                <?php endif; ?>
            </blockquote>
        </div>
    </section>
<?php endif; ?>