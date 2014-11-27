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
			
				<h1>Prix de l'action</h1>
				
				<p>Comme expliqué précédemment, une action voit son prix évoluer au cours du temps, à la baisse comme à la hausse.
				Mais comment allons-nous représenter ces fluctuations ?</p>
				
				<p>Ici, ce sera de manière extrêment simple! Ainsi, supposons que l'on achète une action A à un instant \(t\);
				on notera sa valeur : \(S_{t}\). Quel sera son prix à l'instant d'après, que l'on notera \(t + 1 \) ?</p>
				
				<p>Le prix de l'actif A à l'instant \(t + 1 \) sera en général différent de son prix à l'instant \(t\).
				Nous supposerons alors que le nouveau prix de l'action est soit inférieur à l'ancien prix, soit supérieur.
				Nous avons donc seulement deux possibilités pour ce nouveau prix :
				$$
				\left\{
					\begin{array}{r c l}
					S_{t + 1, bas} &=& bas \times S_{t}\\
					S_{t + 1, haut} &=& haut \times S_{t}\\
					\end{array}
				\right.
				$$
				</p>
				
				<p>Nous avons simplement borné le nouveau prix par la valeur maximale qu'il pourrait avoir et sa valeur minimale, par
				l'intermédiaire des facteurs <em>bas</em> et <em>haut</em>, avec respectivement :
				$$ 0 \leqslant bas \leqslant haut $$
				</p>
				
				<p>Nous pouvons maintenant réitérer l'opération, puis encore et encore jusqu'à ce que celà soit suffisant.
				Le temps va alors s'écouler par "pas", que nous appelerons <strong>périodes</strong>, et de ce fait une avancée dans le 
				temps sera simplement simulé par le passage d'une période t à une période t + 1.</p>
				
				<p>A chaque pas de temps, le prix de l'actif sous-jacent à l'option ne peut prendre que 2 valeurs distinctes :
				nous parlerons alors de <strong>modèle binomiale</strong>.</p>
					
				<p>Par opposition, il est tout à fait pssoible de construire un modèle où le temps s'écoulerait d'une manière continue 
				(sans "trous" si vous préferez!) mais il s'agit là d'un autre modèle, appelé modèle de <em>Black-Scholes</em> sur lequel
				nous reviendrons plus tard. A noter que ce dernier est un cas limite du modèle actuel, où le pas de temps tend vers 0.</p>

				<p>Enfin, une dernière remarque s'impose concernant les facteurs <em>bas</em> et <em>haut</em> : les valeurs de ceux-ci sont
				en général estimées via des méthodes statistiques sur l'historique du prix de l'actif au cours du temps et sont considérées 
				comme constantes au cours du temps. Ceci peut s'avérer plus ou moins réaliste si l'on réitère le processus un grand nombre de fois.
				Attention donc, comme nous le faisions remarquer quelques lignes plus haut, il faut garder à l'esprit que ce n'est qu'un modèle et 
				personne ne peut prétendre qu'un modèle est le reflet parfait de la réalité ...</p>
				
				<p id="links"><a href="CRR_model.php"><br/><br/>Le modèle de Cox-Ross-Rubinstein</a><br/><br/></p>
						
			</div>		

			<?php include($_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'); ?>	

		</div>
	</body>
</html>	