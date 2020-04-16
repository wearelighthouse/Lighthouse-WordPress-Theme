<?php

function lazyLoad($element)
{
  // Change src to data attributes
  $element = preg_replace('/(.*)(src=".*")(.*)/', '$1data-$2$3', $element);

  // Change srcset to data attributes
  $element = preg_replace('/(.*)(srcset=".*")(.*)/', '$1data-$2$3', $element);

  // Add .js-lazy class to each element that already has a class
  $element = preg_replace('/(.*)class=\"(.*?)\"(.*)/', '$1class="$2 js-lazy"$3', $element);

  // Add .lazyload class to each element (image or video, not source) that doesn't have a class
  $element = preg_replace('/<(video|img)(?!\s\bclass\b)(.*?)>/', '<$1 class="js-lazy"$2>', $element);

  return $element;
}
