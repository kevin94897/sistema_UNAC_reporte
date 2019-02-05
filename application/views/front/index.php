<style type="text/css">
	.borde2{
		display: none;
	}
</style>

	<div class="catalogo" style="margin-top: -50px;padding-top: 0">
		<div class="row">
		    <div class="col-md-12" style="padding: 0">
		    	<div class="slider">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<a><img src="<?= base_url() ?>recursos/img/slide00.jpg" alt=""></a>
							</div>

							<div class="item">
								<a><img src="<?= base_url() ?>recursos/img/slide01.jpg" alt=""></a>
							</div>
							<div class="item">
								<a><img src="<?= base_url() ?>recursos/img/slide1.jpg" alt=""></a>
							</div>
							<div class="item">
								<a><img src="<?= base_url() ?>recursos/img/slide02.jpg" alt=""></a>
							</div>
						</div>

									  <!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
							<!--MODAL-->
							<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">              
							      <div class="modal-body">
							      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							        <img src="" class="imagepreview" style="width: 100%;" >
							      </div>
							    </div>
							  </div>
							</div>

		    </div>
	    </div>	
	</div>

	<div class="row">
		<div class="col-md-12">
	         <div class="col-md-6">
	         	<div class="transicion">
					<a href="<?php echo base_url();?>index.php/home/catalogo"><img style="border: 5px double #337ab7" src="<?= base_url() ?>recursos/img/bookstore.jpg" width="100%"></a>
				</div>
	         </div>

	         <div class="col-md-6">
	         	<div class="transicion">
					<a href="<?php echo base_url();?>index.php/home/catalogo"><img style="border: 5px double #337ab7" src="<?= base_url() ?>recursos/img/bookstore.jpg" width="100%"></a>
				</div>
	         </div>

		</div>
	</div>

		</div>
	</div>

        </div>
    </section>

    <script type="text/javascript">
		$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
    </script>
    <script>
    $(function() {
		$('.item').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
	});
	</script>