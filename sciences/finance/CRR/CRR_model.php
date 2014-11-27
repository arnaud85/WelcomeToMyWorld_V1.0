<!DOCTYPE html>

<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>Cox-Ross-Rubinstein</title>
		<link rel="stylesheet" type="text/css" media="screen" href="/includes/style.css"/>
		<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"> </script>
	</head>

	<body>
		
		<div id="main_wrapper">
			
			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/header.php'); ?>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/menu.php'); ?>

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/sciences/finance/finance_menu.php'); ?>

			<div id="finance">
			
				<h1>Le modèle de Cox-Ross-Rubinstein</h1>
				
				<p>Le grand moment que tout le monde attendait est maintenant venu : nous allons ici découvrir notre premier modèle
				d'évaluation de la prime d'une option!</p>
				
				<p>Le modèle que nous allons étudier ici s'appelle le <strong>modèle de Cox-Ross-Rubinstein</strong>. Il a été développé en 1979
				par ses auteurs : <em>John Carrington Cox</em>, <em>Stephen Alan "Steve" Ross</em> et <em>Mark Edward Rubinstein</em>.</p>
				
				<p>Comme pour tout modèle, que ce soit en physique, en biologie ou bien comme ici en finance, celui-ci repose sur 
				des hypothèses. Ainsi, rappelons le tout de même : un modèle ne saurait décrire exactement la réalité et reste une
				représentation plus ou moins réaliste de celle-ci. Il est donc primordiale de bien définir les hypothèses, qui peuvent
				être plus ou moins forte, que l'on émet pour construire ce modèle et de les garder à l'esprit pour toujours savoir
				sur quoi on travaille.</p>
					
				<p>Nous allons donc construire le <strong>modèle de Cox-Ross-Rubinstein</strong>, encore appelé 
				<strong>modèle binomial</strong> sur les hypothèses suivantes :
					<ul class = "theorem">
						<strong>Modèle de Cox-Ross-Rubinstein</strong><br/>
						<li><p>L'option est <strong>européenne</strong> : l'échéance est fixée</p></li>
						<li><p>Le modèle est <strong>discret</strong> et <strong>binomiale</strong> : à chaque pas de temps, la valeur
						de l'actif sous-jacent ne peut prendre que 2 valeurs qui sont (<em>bas</em> et <em>haut</em> sont constants dans le temps): 
						$$
						\left\{
							\begin{array}{r c l}
							S_{t + 1, bas} &=& bas \times S_{t}\\
							S_{t + 1, haut} &=& haut \times S_{t}\\
							\end{array}
						\right.
						$$
						</p></li>
						<li><p>Le modèle respecte le <strong>principe de non-arbitrage</strong></p></li>	
					</ul>
				</p>
					
				<p>Nous allons donc nous servir de ce modèle pour extraire une expression nous donnant la valeur de la prime de l'option.</p>
				
				<p>Dans un premier temps, nous exprimerons une première formule qui ne prendra en compte qu'une seule période. Celle-ci,
				bien que peu réaliste, est tout à fait pertinente d'un point de vue pédagogique puisqu'elle permet de saisir toute l'essence
				du modèle d'une manière simple.</p>
				
				<p>Ensuite, il suffira d'extrapoler cette formule au cas de périodes multiples pour obtenir la fameuse formule de <em>pricing</em>
				d'options europénnes par le modèle de Cox-Ross-Rubinstein.</p>
				
				<p id="links"><a href="CRR_1p_formula.php"><br/><br/>Formule à période unique</a><br/><br/></p>
						
			</div>		

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'); ?>	

		</div>
	</body>
</html>	