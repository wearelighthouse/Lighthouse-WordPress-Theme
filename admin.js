
function moveHeroField() {
  var heroField = document.getElementsByClassName('cmb2-hero');

  if (!heroField) {
    // There's no hero / header custom metabox on this page
    return false;
  }

  var heroContainer = heroField[0].parentElement.parentElement;
  var postBodyContent = document.getElementById('post-body-content');
  var postDivRich = document.getElementById('postdivrich');

  if (!postBodyContent || !postDivRich) {
    // There aren't any normal WP content fields to move the hero field to be before
    return false;
  }

  // Move the hero custom metabox (container) aboce the WP content field
  postBodyContent.insertBefore(heroContainer, postDivRich);

  // Fix the styles - the margin is bottom but needs to be top, and you can't drag it anymore
  var margin = getComputedStyle(heroContainer).marginBottom;
  heroContainer.style.marginTop = margin;
  heroContainer.style.marginBottom = 0;
  heroContainer.getElementsByClassName('ui-sortable-handle')[0].removeClass('ui-sortable-handle');
}

window.addEventListener('DOMContentLoaded', (event) => {
    moveHeroField();
});
