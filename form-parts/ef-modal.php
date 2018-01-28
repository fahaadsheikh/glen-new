<?php $theme_options = get_option( 'dym_theme_options' );  ?>

<div id="myModal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thank you for using <?php echo get_bloginfo( 'name' ); ?>.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo get_bloginfo( 'name' ); ?> representative is busy getting your Property Report ready and will be in touch within 48 hours with your free report. </p>
        <p>All enquiries please email : <a href="mailto:<?php echo $theme_options['dym_admin_email'];?>"><?php echo $theme_options['dym_admin_email'];?></a></p>
      </div>
    </div>
  </div>
</div>