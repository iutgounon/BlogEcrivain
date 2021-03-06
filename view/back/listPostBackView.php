<?php ob_start(); ?>
	<div class="container-fluid text-center"> <!-- corp du site -->

		<div class="row content">

			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->
				
			</div>

			<div class="col-sm-9 text-left"> <!-- Milieu  -->
				<h1> Administration des billets </h1>
				<p> 
					Cette page vous permet de lire, modifier et supprimer les différents billets déjà postés.
				</p>
				<hr>

				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<?php 
						$count = "1";
						while($data = $posts->fetch()){ 

							if (isset($_GET['count'])) {
								
								$page = $_GET['count'];
							}else{
								
								$page = 0;
							}

							?>

							

						
					    <div class="panel-heading">
					      <h4 class="panel-title">
					      	<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $count ?>" > Billet <?= $data['id'] ?>   <?= $data['titre'];?></a>
					      </h4>
					    </div>
					    <div id="collapse<?= $count ?>" class="panel-collapse collapse">
					    	<div class="panel-body">
								<div class="news">	

									<h2> 
										<?= $data['titre'];?>
										le <strong><?= $data['date_creation_fr'];?></strong>					
									</h2>
									
									<p>
										<?= $data['contenu']; ?> 
									</p>
									<hr>
									<div id="admin">
										<a href="index.php?action=editpost&editId=<?=$data['id']?>" class="btn btn-primary btn-block">Modifier le billet</a> 
										<a href="index.php?action=deletepost&deleteId=<?=$data['id']?>&count=<?=$page ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'))" class="btn btn-danger btn-block">Supprimer le billet</a>
									</div>


								</div>
							</div>
						</div>
						

						<?php
						$count +=1;
						} 
						$posts-> closeCursor();
						?>
					</div>
				</div>

				<div class="pagination pagination-lg">	
					<?php 
					for ($i=0; $i < $totalPage ; $i++) { 
						?>
						
						<li <?php if (!isset($_GET['count']) && $i == 0 ) {
							echo ' class="active"';
							$_GET['count'] =0;
						}elseif($_GET['count'] == $i){
							echo ' class="active"';
						}

						 ?> > <a href="index.php?action=showposts&count=<?=$i?>"> <?= $i+1 ?></a></li>
					<?php	
					}
					?>


				
				</div>
			</div>


				

		</div>
	</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
