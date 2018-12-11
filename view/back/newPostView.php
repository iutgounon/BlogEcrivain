<?php ob_start(); ?>
	<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

	<div class="container-fluid text-center"> <!-- corp du site -->

		<div class="row content">

			<div class="col-sm-2 sidenav"> <!-- Colonne gauche -->
				<p> <h2>Article</h2> blablablablablablabla</p>
				<p> <h2>Article</h2> blablablablablablablabla</p>
			</div>

			<div class="col-sm-10 text-left"> <!-- Milieu  -->


				<div class="main">	

					<h1> 
						Le Back-End					
					</h1>
					
					<p>
						Bienvenue <?= nl2br(htmlspecialchars($_SESSION['login'])); ?>
						Vous êtes ici dans votre éditeur de texte.
					</p>
					<hr>

					<h2>
						Insérez votre titre dans le premier éditeur
					</h2>
					<form method="post" action="index.php?action=addPost">
						<textarea id="title_tinymce" name="title_tinymce">Insérez votre titre</textarea>
						<h2>
							Insérez votre texte dans le second éditeur
						</h2>
						<textarea id="content_tinymce" name="content_tinymce">C'est ici que commence votre histoire ... </textarea>
						<button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-ok-sign"></span> Ecrire un billet</button>

					</form>



				</div>



		</div>
	</div>
</div>
<script>
	tinymce.init({
		selector:'textarea',
		color_picker_callback: function(callback, value) {
   			callback('#FF00FF');
  		},
  		width: 800,
  		body_class: 'elm1=title_tinymce, elm2=content_tinymce',
  		plugins : 'autosave autoresize contextmenu ',
  		autosave_ask_before_unload: false,
  		toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | restoredraft',

  		autosave_interval:"30s"
	});
	// tinymce.init({
	// 	selector:'#title_tinymce',
	// 	width: 800,
	// 	height 150
	// });
</script>
<?php $content = ob_get_clean(); ?>
<?php require_once('view/template.php'); ?>