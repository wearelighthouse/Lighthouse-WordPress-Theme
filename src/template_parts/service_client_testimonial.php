<?php
    $clientTestimonialTitle = getPostMeta('service_archive_client_testimonial_title');
    $clientTestimonialDesc = getPostMeta('service_archive_client_testimonial_text');
?>

<section class="o-container-client-testimonial c-fancy-bg">
    <div class="o-container-content">
        <blockquote class="c-service-client-testimonial">
            <?php if ($clientTestimonialTitle && $clientTestimonialDesc) : ?>
                <h3 class="c-service-client-testimonial__title c-service-template__title">
                    <?= $clientTestimonialTitle ?>
                </h3>
                <p class="c-service-client-testimonial__p">
                     <?= $clientTestimonialDesc ?>
                </p>
            <?php endif; ?>

            <footer class="c-service-client-testimonial__footer">
                <div class="c-service-client-testimonial__footer__name">Nick Meyers</div>
                <div class="c-service-client-testimonial__footer__job">Director of Technology</div>
                <div class="c-service-client-testimonial__footer__title">Digital Theatre+</div>
            </footer>
        </blockquote>
    </div>
</section>