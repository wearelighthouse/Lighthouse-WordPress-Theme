<?php
    $clientTestimonialDesc = getPostMeta('service_archive_client_testimonial_text');
    $clientTestimonialName = getPostMeta('service_archive_client_testimonial_name');
    $clientTestimonialRole = getPostMeta('service_archive_client_testimonial_role');
    $clientTestimonialCompany = getPostMeta('service_archive_client_testimonial_company');
?>

<?php if (isset($clientTestimonialDesc) && !empty($clientTestimonialDesc)) : ?>
    <section class="o-container-client-testimonial c-fancy-bg">
        <div class="o-container-content">
            <blockquote class="c-service-client-testimonial">
                <?php if ($clientTestimonialDesc) : ?>
                    <p class="c-service-client-testimonial__quote">
                        <?= $clientTestimonialDesc ?>
                    </p>
                <?php endif; ?>
                
                <?php if ($clientTestimonialName || $clientTestimonialRole || $clientTestimonialCompany) : ?>
                    <footer class="c-service-client-testimonial__footer">
                        <?php if ($clientTestimonialName) : ?>
                            <div class="c-service-client-testimonial__footer__name">
                                <?= $clientTestimonialName ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($clientTestimonialRole) : ?>
                            <div class="c-service-client-testimonial__footer__role">
                                <?= $clientTestimonialRole ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($clientTestimonialCompany) : ?>
                            <div class="c-service-client-testimonial__footer__company">
                                <?= $clientTestimonialCompany ?>
                            </div>
                        <?php endif; ?>
                    </footer>
                <?php endif; ?>
            </blockquote>
        </div>
    </section>
<?php endif; ?>