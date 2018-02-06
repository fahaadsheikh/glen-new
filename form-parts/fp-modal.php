<div id="fp-modal" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">GRAB MY FREE 30 MINUTE CONSULT</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" class="consult-form">
          <div class="row">
            <div class="col-md-6">
              <?php get_template_part( 'form-parts/fp-modal-name' ); ?>
            </div>
            <div class="col-md-6">
              <?php get_template_part( 'form-parts/fp-modal-telephone' ); ?>
            </div>
            <div class="col-md-12">
              <?php get_template_part( 'form-parts/fp-modal-email' ); ?>
              <?php get_template_part( 'form-parts/fp-modal-submit' );  ?> 
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>